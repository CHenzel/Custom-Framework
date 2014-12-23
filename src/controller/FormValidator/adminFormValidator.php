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
class adminFormValidator extends BaseFormValidator
{
    public function setFormValidator()
    {
        $this->formValidator = array(
           'username' => array('required'=>true,'type' => 'string'),
           'password' => array('required'=>true,'type' => 'string'),
           'nom' => array('required'=>false,'type' => 'string'),
           'prenom' => array('required'=>false,'type' => 'string'), 
           'ville' => array('required'=>false,'type' => 'string'),
           'role' => array('required'=>true,'type' => 'number'),
           'statut' => array('required'=>true,'type' => 'number'),
        );
    }
}
