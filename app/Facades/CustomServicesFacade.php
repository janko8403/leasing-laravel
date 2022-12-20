<?php
 
namespace App\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class CustomServicesFacade extends Facade
{
   
  protected static function getFacadeAccessor()
  {
    //Note - Returning the name of Service Container Binding
    return 'CustomServicesAlias';
  }
}
