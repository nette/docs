<?php

require 'Nette/loader.php';

use Nette\Forms\Form;

$form = new Form;

$form->addText('name', 'Name:')
    ->setRequired('Please fill your name.');

$form->addText('age', 'Age:')
	->setType('number')
    ->addRule(Form::INTEGER, 'Your age must be an integer.')
	->addRule(Form::RANGE, 'You must be older %d years and be under %d.', array(18, 120));

$form->addPassword('password', 'Password:')
    ->setRequired('Pick a password')
    ->addRule(Form::MIN_LENGTH, 'Your password has to be at least %d long', 3);

$form->addPassword('passwordVerify', 'Password again:')
    ->setRequired('Fill your password again to check for typo')
    ->addRule(Form::EQUAL, 'Password missmatch', $form['password']);

$form->addSubmit('send', 'Register');

$form->setDefaults(array(
    'name' => 'John Doe',
    'age' => 33,
));



if ($form->isSubmitted() && $form->isValid()) {
    echo 'Form was submitted and passed validation';

    $values = $form->getValues();
    dump($values);
}

echo $form;

?>
<style>
.required label { color: maroon }
</style>

<script src="netteForms.js"></script>
