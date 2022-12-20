<?php
 
namespace App\Services;
 
class CustomServices{
     
  /*=============================================
  * Get Verification Code for User Registration
  *
  * @param optional (random number minimum and maximum range)
  * @return int (between $min/$max)
  #=============================================*/
  public function getVerificationCode($min, $max) {
    return [$min, $max];
  }
 
}
