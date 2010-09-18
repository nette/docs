<?php

/**
 * Scaffolding Renderer.
 *
 * Copyright (c) 2004, 2009 David Grudl (http://davidgrudl.com)
 *
 * This source file is subject to the New BSD License.
 * For more information please see http://addons.nettephp.com/scaffoldingrenderer
 *
 * @package    Nette Addons
 */

use Nette\Web\Html,
	Nette\Forms\ConventionalRenderer,
	Nette\Forms\IFormControl,
	Nette\Forms\Checkbox,
	Nette\Forms\Button;



/**
 * Builds a PHP template.
 *
 * @author     David Grudl
 * @copyright  Copyright (c) 2008, 2009 David Grudl
 * @package    Nette Extras
 */
class ScaffoldingRenderer extends ConventionalRenderer
{
	/** @var bool */
	public $latte = TRUE;



	/**
	 * Renders form begin.
	 * @return string
	 */
	public function renderBegin()
	{
		return $this->latte ? "\n{\$form->render('begin')}\n" : "\n<?php \$form->render('begin') ?>\n";
	}



	/**
	 * Renders form end.
	 * @return string
	 */
	public function renderEnd()
	{
		return $this->latte ? "\n{\$form->render('end')}\n" : "\n<?php \$form->render('end') ?>\n";
	}



	/**
	 * Renders validation errors (per form or per control).
	 * @param  IFormControl
	 * @return void
	 */
	public function renderErrors(IFormControl $control = NULL)
	{
		return $this->latte ? "\n{\$form->render('errors')}\n" : "\n<?php \$form->render('errors') ?>\n";
	}



	/**
	 * Renders single visual row of multiple controls.
	 * @param  array of IFormControl
	 * @return string
	 */
	public function renderPairMulti(array $controls)
	{
		$s = array();
		foreach ($controls as $control) {
			if (!($control instanceof IFormControl)) {
				throw new /*\*/InvalidArgumentException("Argument must be array of IFormControl instances.");
			}
			$control->setOption('rendered', TRUE);
			$name = $control->lookupPath('Nette\Forms\Form');
			$s[] = $this->latte ? "{\$form['$name']->control}" : "<?php echo \$form['$name']->control ?>";
		}
		$pair = $this->getWrapper('pair container');
		$pair->add($this->getWrapper('label container')->setHtml('&nbsp;'));
		$pair->add($this->getWrapper('control container')->setHtml(implode(" ", $s)));
		return $pair->render(0);
	}



	/**
	 * Renders 'label' part of visual row of controls.
	 * @param  IFormControl
	 * @return string
	 */
	public function renderLabel(IFormControl $control)
	{
		$head = $this->getWrapper('label container');

		if ($control instanceof Checkbox || $control instanceof Button) {
			return $head->setHtml('&nbsp;');

		} else {
			$name = $control->lookupPath('Nette\Forms\Form');
			return $head->setHtml(($this->latte ? "{\$form['$name']->label}" : "<?php echo \$form['$name']->label ?>") . $this->getValue('label suffix'));
		}
	}



	/**
	 * Renders 'control' part of visual row of controls.
	 * @param  IFormControl
	 * @return string
	 */
	public function renderControl(IFormControl $control)
	{
		$body = $this->getWrapper('control container');
		if ($this->counter % 2) $body->class($this->getValue('control .odd'), TRUE);

		$description = $control->getOption('description');
		if ($description instanceof Html) {
			$description = ' ' . $control->getOption('description');

		} elseif (is_string($description)) {
			$description = ' ' . $this->getWrapper('control description')->setText($description);

		} else {
			$description = '';
		}

		if ($this->getValue('control errors')) {
			$description .= $this->renderErrors($control);
		}

		$control->setOption('rendered', TRUE);
		$name = $control->lookupPath('Nette\Forms\Form');
		if ($control instanceof Checkbox || $control instanceof Button) {
			return $body->setHtml(($this->latte ? "{\$form['$name']->control}{\$form['$name']->label}" : "<?php echo \$form['$name']->control, \$form['$name']->label ?>"). $description);

		} else {
			return $body->setHtml(($this->latte ? "{\$form['$name']->control}" : "<?php echo \$form['$name']->control ?>"). $description);
		}
	}

}
