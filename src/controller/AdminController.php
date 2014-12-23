<?php
namespace app\controller;

use app\controller\BaseController;
use app\controller\FormValidator\AdminConnexionFormValidator;
use app\datagrid\AdminDatagrid;
use model\Admin;
use model\AdminQuery;
use model\AuteurQuery;
use model\LivreQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use app\controller\FormValidator\adminFormValidator;

class AdminController extends BaseController
{
    public function indexAction(Request $request)
    {
        $nbBooks = LivreQuery::create()->count();
        $nbAuthors = AuteurQuery::create()->count();
        return $this->render('admin/index.php',array(
            'nbBooks' => $nbBooks,
            'nbAuthors' => $nbAuthors
            )
        );
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
    
    public function listAction(Request $request)
    {
        $adminDatagrid = new AdminDatagrid(new UrlGenerator($this->routes, $this->requestContext),$request);
        $adminDatagrid->setQuery(AdminQuery::create()->filterById($this->getUser()->getId(), Criteria::NOT_EQUAL));
        $adminDatagrid->execute();
        
        return $this->render('admin/admin/list.php', 
                array('adminDatagrid' => $adminDatagrid,
                ));
    }
    
    public function newAction(Request $request)
    {
        $flashBag = $this->getFlashBag();
         
        if($request->isMethod('POST'))
        {
            $form = $request->request->all();
            $validator = new adminFormValidator($form);
            $errors = $validator->isValid();
            if(is_bool($errors))
            {
                $admin = new Admin();
                $admin->setUsername($form['username']);
                $admin->setPassword(sha1($form['password']));
                $admin->setNom($form['nom']);
                $admin->setPrenom($form['prenom']);
                $admin->setVille($form['ville']);
                $admin->setStatut($form['statut']);
                $admin->setRole($form['role']);
                $admin->save();
                
                $flashBag->add('success', 'Admin '.$admin->getUsername().' crée avec succès');
                
                return $this->redirect($this->generateUrl('admin_admin_list',array()));
            }
            else
            {
                $flashBag->add('warning', "Les champs suivant ne sont pas valides ".  implode(', ', $errors));
            }
        }
        
        return $this->render('admin/admin/new.php', 
                array());
    }
    
    public function editAction(Request $request)
    {
        $flashBag = $this->getFlashBag();
        $admin = AdminQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$admin)
        {
           return $this->exceptionNotFound("l'admin n'existe pas !");
        }
        
        if($request->isMethod('POST'))
        {
            $form = $request->request->all();
            $validator = new adminFormValidator($form);
            $errors = $validator->isValid();
            if(is_bool($errors))
            {
                $admin->setUsername($form['username']);
                $admin->setPassword(sha1($form['password']));
                $admin->setNom($form['nom']);
                $admin->setPrenom($form['prenom']);
                $admin->setVille($form['ville']);
                $admin->setStatut($form['statut']);
                $admin->setRole($form['role']);
                $admin->save();
                
                $flashBag->add('success', 'L\'admin '.$admin->getUsername().' a été mise à jour avec succès');
                
                return $this->redirect($this->generateUrl('admin_admin_list',array()));
            }
            else
            {
                $flashBag->add('warning', "Les champs suivant ne sont pas valides ".  implode(', ', $errors));
            }
        }
        
        return $this->render('admin/admin/edit.php', 
                array('admin'=>$admin));
    }
    
    public function showAction(Request $request)
    {
        $admin = AdminQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$admin)
        {
            return $this->exceptionNotFound("l'admin n'existe pas !");
        }
        
         return $this->render('admin/admin/show.php', 
                array('admin'=>$admin));
    }
    
    public function deleteAction(Request $request)
    {
        $flashBag = $this->getFlashBag();
        $admin = AdminQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$admin)
        {
            return $this->exceptionNotFound("l'admin n'existe pas !");
        }
        
        $adminNom = $admin->getNom();
        
        $admin->delete();
        
        $flashBag->add('success', 'L\'admin '.$adminNom.' a été supprimé avec succès');
        
        return $this->redirect($this->generateUrl('admin_admin_list',array()));
         
    }
    
}