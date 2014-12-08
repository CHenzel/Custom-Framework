<?php
namespace app\controller\FormValidator;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author charleshenzel
 */
class AdminConnexionFormValidator extends BaseFormValidator
{
    public function setFormValidator()
    {
        $this->formValidator = array(
           'login' => array('required'=>true,'type' => 'email'),
           'password' => array('required'=>true,'type' => 'string'), 
        );
    }
}
