<?php
namespace app\controller\FormValidator;

use Symfony\Component\HttpFoundation\ParameterBag;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseFormValidator
 *
 * @author charleshenzel
 */
class BaseFormValidator 
{
    protected $form;
    protected $formValidator;
    
    public function __construct($fields) 
    {
        foreach ($fields as $key => $field)
        {  
            $this->form[$key]=$field;
        }
        $this->setFormValidator();
    } 
    
    public function isValid()
    {
        $fieldError = array();
        foreach ($this->formValidator as $key => $value) 
        {
            //var_dump($key);
            if(array_key_exists($key, $this->form))
            {
               if(($value['required'] == true) && ($this->form[$key] == null))
               {
                   $fieldError[] = $key;
               }
               else
               {
                   switch ($value['type']) //ajouter controle instance d'objets
                   {
                       case 'string':
                           
                           break;
                       case 'number':
                           if(!is_numeric($this->form[$key])) $fieldError[] = $key;
                           break;
                       case 'date': //Ameliorer
                           $test_arr  = explode('/', $this->form[$key]);
                            if (!checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
                                $fieldError[] = $key;
                            }
                       case 'email':
                           if(!filter_var($this->form[$key], FILTER_VALIDATE_EMAIL)) $fieldError[] = $key;
                       default:
                           break;
                   }
               }
            }
        }
        
        if(count($fieldError) > 0)
        {
            return $fieldError;
        }
        
        return true;
        
    }
}
