<?php
/**
 * Nette Framework
 *
 * Copyright (c) 2008, 2009 Patrik Votoček (http://patrik.votocek.cz)
 *
 * This source file is subject to the GNU LGPL.
 * 
 * For more information please see http://nettephp.com
 * 
 * @copyright	Copyright (c) 2008, 2009 Patrik Votoček
 * @license		Lesser General Public License (LGPL)
 * @link		  http://nettephp.com
 * @category	Nette
 * @package		Nette\Mail
 */

/*namespace Nette\Mail;*/

/**
 * SMTP send mail mailer
 *
 * @author		Patrik Votoček
 * @copyright	Copyright (c) 2001, 2003 Brent R. Matzelle
 * @copyright	Copyright (c) 2004, 2007 Andy Prevost. All Rights Reserved.
 * @copyright	Copyright (c) 2008, 2009 Patrik Votoček
 * @package		Nette\Mail
 */
class SmtpSendmailMailer extends SendmailMailer
{
	/** @var string */
	protected $host;
	/** @var int */
	protected $port;
	/** @var string */
	protected $username;
	/** @var string */
	protected $password;
	/** @var int */
	protected $conn = NULL;
	/** @var int */
	protected $state;
	/** @var int */
	protected $timeout = 20;
	/** @var bool */
	protected $linux;
	/** @var string */
	protected $secured = NULL;
	
	const STATE_DISCONNECTED = 0;
	const STATE_CONNECTED = 1;
	
	/**
	 * Construct
	 * 
	 * @return SmtpSendmailMailer
	 */
	public function __construct()
	{
		$this->state = self::STATE_DISCONNECTED;
		$this->linux = strncasecmp(PHP_OS, 'win', 3);
		
		$this->host = ini_get('SMTP');
		$this->port = ini_get('smtp_port');
		
		$conf = Environment::getConfig('mailer');
		if (isset($conf['host']))
			$this->host = $conf['host'];
		if (isset($conf['port']))
			$this->port = $conf['port'];
		if (isset($conf['username']))
			$this->username = $conf['username'];
		if (isset($conf['password']))
			$this->password = $conf['password'];
		if (isset($conf['timeout']))
			$this->timeout = $conf['timeout'];
		if (isset($conf['secured']))
			$this->secured = $conf['secured'];
	}
	
	/**
	 * Sends e-mail.
	 * 
	 * @param	Mail
	 * @return	void
	 */
	public function send(Mail $mail)
	{
		if ($this->state != self::STATE_CONNECTED)
			$this->connect();
		$data = $mail->generateMessage();
			
		list($from) = array_keys($mail->headers['From']);
		$this->setFrom($from);
		
		$mails = array();
		if (isset($mail->headers['To']) && count($mail->headers['To']) > 0)
			$mails = array_merge($mails, array_keys($mail->headers['To']));
		if (isset($mail->headers['Cc']) && count($mail->headers['Cc']) > 0)
			$mails = array_merge($mails, array_keys($mail->headers['Cc']));
		if (isset($mail->headers['Bcc']) && count($mail->headers['Bcc']) > 0)
			$mails = array_merge($mails, array_keys($mail->headers['Bcc']));
		
		foreach ($mails as $mail)
		{
			$this->addTo($mail);
		}
		
		$this->sendData($data);
			
		$this->close();
	}
	
	/**
	 * Connect to server
	 * 
	 * @return	void
	 */
	protected function connect()
	{
		if ($this->state == self::STATE_DISCONNECTED)
		{
			$this->conn = fsockopen((($this->secured == "ssl") ? "ssl://":NULL).$this->host, $this->port, $errno, $errstr, $this->timeout);
			if (empty($this->conn))
                return;
            if ($this->linux)
            	socket_set_timeout($this->conn, $this->timeout, 0);
		}
		
		$announce = $this->getLines();
		
		$this->sendHello();
		
		if ($this->secured == "tls")
			$this->setTLS();
		
		if (!empty($this->username) && !empty($this->password))
			$this->authenticate();
			
		$this->state = self::STATE_CONNECTED;
	}
	
	/**
	 * Get data from server
	 * 
	 * @return	string
	 */
	protected function getLines()
	{
		$data = "";
		while (($str = fgets($this->conn,515)) != NULL)
	    {
	    	$data .= $str;
			if (substr($str,3,1) == " ")
				break;
	    }
	    
	    return $data;
	}
	
	/**
	 * Put data to server
	 * 
	 * @param	string	$line
	 * @return	void
	 */
	protected function putLine($line)
	{
		fputs($this->conn, $line."\r\n");
	}
	
	/**
	 * Initiate a TLS communication with the server.
	 *
	 * SMTP CODE 220 Ready to start TLS
	 * SMTP CODE 501 Syntax error (no parameters allowed)
	 * SMTP CODE 454 TLS not available due to temporary reason
	 * 
	 * @return	void
	 */
	protected function setTLS()
	{
		if(empty($this->conn))
			$this->connect();

		$this->putLine("STARTTLS");

		if (!$this->isLastCode(220) || !stream_socket_enable_crypto($this->conn, TRUE, STREAM_CRYPTO_METHOD_TLS_CLIENT))
			throw new InvalidStateException("Mail conection not accepted TLS");
	}
	
	/**
	 * Authenticate
	 * 
	 * Performs SMTP authentication.  Must be run after running the
	 * Hello() method.  Returns true if successfully authenticated.
	 * 
	 * @return	void
	 */
	protected function authenticate()
	{
		$this->putLine("AUTH LOGIN");
		
		if (!$this->isLastCode(334))
			throw new InvalidStateException("Mail connection not accepted authentication");
		
		$this->putLine(base64_encode($this->username));
		
		if (!$this->isLastCode(334))
			throw new InvalidStateException("Mail connection not accepted authentication username");
			
		$this->putLine(base64_encode($this->password));
		
		if (!$this->isLastCode(235))
			throw new InvalidStateException("Mail connection not accepted authentication password");
	}
	
	/**
	 * Send EHLO/HELO
	 * 
	 * @return	bool
	 */
	protected function sendHello()
	{
		$hostname = $_SERVER['SERVER_NAME'];
		
		$this->putLine("EHLO ".$hostname);
		
		if (!$this->isLastCode(250))
		{
			$this->putLine("HELO ".$hostname);
			if (!$this->isLastCode(250))
				throw new InvalidStateException("Mail connection not accepted EHLO/HELO");
		}
	}
	
	/**
	 * Get last code
	 * 
	 * @return	int
	 */
	protected function getLastCode()
	{
		$reply = $this->getLines();
		return substr($reply, 0, 3);
	}
	
	/**
	 * Is last code
	 * 
	 * @param	int		$code
	 * @return	bool
	 */
	protected function isLastCode($code)
	{
		if ($this->getLastCode() != $code)
			return FALSE;
			
		return TRUE;
	}
	
	/**
	 * Close connection
	 * 
	 * @return	void
	 */
	protected function close()
	{
		$this->putLine("quit");
		
		if (!$this->getLastCode(221))
			throw new InvalidStateException("Mail connection not accepted quit");
			
		fclose($this->conn);
		$this->conn = 0;
	}
	
	/**
	 * put your comment there...
	 * 
	 * @param	string	$mail
	 * @return	void
	 */
	protected function setFrom($mail)
	{
		$this->putLine("MAIL FROM:<".$mail.">");
		
		if (!$this->isLastCode(250))
			throw new InvalidStateException("Mail MAIL FROM not accepted from server");
	}
	
	/**
	 * Add to
	 * 
	 * @param	string	$mail
	 * @return	void
	 */
	protected function addTo($mail)
	{
		$this->putLine("RCPT TO:<".$mail.">");
		
		if (!$this->isLastCode(250))
			throw new InvalidStateException("Mail RCPT not accepted from server");
	}
	
	/**
	 * Send data
	 * 
	 * @param	string	$data
	 */
	protected function sendData($data)
	{
		$lines = explode("\n", $data);
		
		$this->putLine("DATA");
		if (!$this->isLastCode(354))
			throw new InvalidStateException("Mail DATA not accepted from server");
			
		if (count($lines) > 0)
		{
			foreach ($lines as $line)
			{
				$this->putLine($line);
			}
		}
		
		$this->putLine("\r\n.");
		
		if (!$this->isLastCode(250))
			throw new InvalidStateException("Unable to send email.");
	}
}