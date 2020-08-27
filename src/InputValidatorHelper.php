<?php

namespace Validator;

/**
 * Helper to validate input from a form
 */
class InputValidatorHelper {

   /**
    * Returns an array that correspond to the return type of this class
    *
    * @param boolean $validity
    * @param string|null $message
    * @param array|null $additionalParams
    * @return array
    */
   private static function returnType(bool $validity, ?string $message = null, ?array $additionalParams = []): array {
      $type = [
         "validity" => $validity,
         "message" => $message
      ];
      foreach ($additionalParams as $key => $value) $type["additional"][$key] = $value;
      return $type;
   }

   /**
    * Return an array containing the name of the parameters
    *
    * @param string $functionName
    * @return array
    */
   private static function getFunctionArgsName(string $functionName): array {
      $f = new ReflectionFunction($funcName);
      $result = [];
      foreach ($f->getParameters() as $param) $result[] = $param->name;
      return $result;
   }

   /**
    * Verify if the email is valid, otherwise, it returns an exception
    *
    * @param string $email
    * @param integer|null $length
    * @return boolean
    */
   public static function isEmailValid(string $email, ?int $length = 255): array {
      if(strlen($email) < $length) {
         if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return self::returnType($validity = true, $message = null);
         } else {
            return self::returnType($validity = false, $message = "Invalid email", $additionalParams = ["error" => "Email must be like : examble@mail.com"]);
         }
      } else {
         return self::returnType($validity = false, $message = "Invalid email", $additionalParams = ["length" => $length, "error" => "Email must be less than $length"]);
      }
   }


   /**
    * Verify if a string is in an array
    *
    * @param string $text
    * @param array $array
    * @return array
    */
   public static function isStringInArray(string $text, array $array): array {
      if(in_array($text, $array)) {
         return self::returnType($validity = true, $message = null);
      } else {
         return self::returnType($validity = false, $message = "$text is not in the array", $additionalParams = ["text" => $text, "array" => $array]);
      }
   }

   /**
    * Verify if a string correspond to a regex
    *
    * @param string $text
    * @param string $regex
    * @return array
    */
   public static function isRegexValid(string $text, string $regex): array {
      if(preg_match($regex, $text)){
         return self::returnType($validity = true, $message = null);
      } else {
         return self::returnType($validity = false, $message = "$text does not correspond to the regex($regex)", $additionalParams = ["text" => $text, "regex" => $regex]);
      }
   }

   /**
    * Verify if the param is a valid int
    *
    * @param mixed $element
    * @return array
    */
   public static function isValidInt($element): array {
      if(is_numeric($element)){
         return self::returnType($validity = true, $message = null);
      } else {
         return self::returnType($validity = false, $message = "$element is not a valid integer", $additionalParams = ["param" => $element]);
      }
   }

   /**
    * Verify if the length of a string is valid
    *
    * @param string $text
    * @param integer $length
    * @return array
    */
   public static function isStringLengthValid(string $text, ?int $min = null, ?int $max = null): array {
      return self::returnType($validity = true, $message = null, $additionalParams = ["params" => get_defined_vars()]);
   }


}