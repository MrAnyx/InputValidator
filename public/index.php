<?php

use Validator\InputValidatorHelper;

require __DIR__ . '/../vendor/autoload.php';


// $result = InputValidatorHelper::isEmailValid("toto@icohup", 20);
// $result = InputValidatorHelper::isStringInArray("test", ["test", "aujourdhui", "salut", "hier"]);
// $result = InputValidatorHelper::isRegexValid("bonjoure", "(^bonjour$|^aujourdhui$)");
$result = InputValidatorHelper::isValidInt("452");
// ! $result = InputValidatorHelper::isStringLengthValid("bonjour", 0, 50);

dd($result);

