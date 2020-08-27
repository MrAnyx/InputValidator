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
   public static function returnType(bool $validity, ?string $message = null, ?array $additionalParams = []): array {
      $type = [
         "validity" => $validity,
         "message" => $message
      ];
      foreach ($additionalParams as $key => $value) {
         $type["additional"][$key] = $value;
      }
      return $type;
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

}