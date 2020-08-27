<?php

use Validator\InputValidatorHelper;

require __DIR__ . '/../vendor/autoload.php';

$validEmail = "bonjour@gmail.com";
$invalidEmail = "bonjour@gmail";

$result = InputValidatorHelper::isEmailValid("toto@icohup", 20);


dd($result);