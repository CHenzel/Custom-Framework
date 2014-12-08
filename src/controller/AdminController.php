<?php
namespace app\controller;

use Symfony\Component\HttpFoundation\Request;
use app\controller\BaseController;
use model\Admin;
use model\AdminQuery;
use app\controller\FormValidator\AdminConnexionFormValidator;

class AdminController extends BaseController
{
    public function indexAction(Request $request)
    {
        return $this->render('admin/index.php', 
                    array('name'=>"coucou"));
    }
    
    public function profilAction(Request $request)
    {
        return $this->render('admin/profile.php', 
                    array());        
    }
 
    public function connexionAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
        if($this->getUser() == null)
        {
            if($request->isMethod('POST'))
            {
                $form = $request->request->all();
                $validator = new AdminConnexionFormValidator($form);
                $errors = $validator->isValid();
                
                if(is_bool($errors))
                {
                    $verifAdmin = AdminQuery::create()->findOneByUsername($form['login']);
                    if($verifAdmin)
                    {
                        $passwordbase = $verifAdmin->getPassword();
                        if(sha1($form['password']) == $passwordbase)
                        {
                            $session->set('user',$verifAdmin);

                            $flashBag->add('success', 'Vous êtes connecté avec succès');

                            return $this->redirect($this->generateUrl('admin_home',array())); // Si il y a des paramêtr
                        }
                        else 
                        {  
                            $flashBag->add('warning', 'Mauvais mot de passe');   
                        }
                     }
                     else
                     {
                         $flashBag->add('warning', "Identifiant incorrect");
                     }
                }
                else
                {
                    $flashBag->add('warning', "Les champs suivant ne sont pas valides ".  implode(', ', $errors));
                }
            }
            return $this->render('admin/login.php', 
                    array());

        }
        else
        {
           $flashBag->add('warning', "Vous êtes dèja identifé");
           return $this->redirect($this->generateUrl('admin_home',array()));
        }
    }
    
    public function deconnexionAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
        
        if(($this->getUser() != null) && ($this->getUser() instanceof Admin))
        {
            $session->set("user",null);
        }
        else
        {
            $flashBag->add('warning', "Vous n'êtes pas connecté"); 
        }
        return $this->redirect($this->generateUrl('admin_login',array()));
    }
    
}