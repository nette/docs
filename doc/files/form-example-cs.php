<?php

require 'Nette/loader.php';

use Nette\Forms\Form;

$form = new Form;

$form->addText('name', 'Jméno:')
	->setRequired('Zadejte prosím jméno');

$form->addText('age', 'Věk:')
	->setType('number')
	->addRule(Form::INTEGER, 'Věk musí být číslo')
	->addRule(Form::RANGE, 'Věk musí být v rozmezí od %d do %d let', array(18, 120));

$form->addPassword('password', 'Heslo:')
	->setRequired('Zvolte si heslo')
	->addRule(Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaky', 3);

$form->addPassword('passwordVerify', 'Heslo pro kontrolu:')
	->setRequired('Zadejte prosím heslo ještě jednou pro kontrolu')
	->addRule(Form::EQUAL, 'Zadané hesla se neshodují', $form['password']);

$form->addSubmit('send', 'Registrovat');

$form->setDefaults(array(
	'name' => 'John',
	'age' => 33,
));



if ($form->isSubmitted() && $form->isValid()) {
	echo 'Formulář byl správně vyplněn a odeslán';

	$values = $form->getValues();
	dump($values);
}

echo $form;

?>
<style>
.required label { color: maroon }
</style>

<script src="netteForms.js"></script>
