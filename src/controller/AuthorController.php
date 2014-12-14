<?php
namespace app\controller;

use Symfony\Component\HttpFoundation\Request;
use app\controller\BaseController;
use app\controller\FormValidator\authorFormValidator;
use model\Auteur;
use app\datagrid\AuthorDatagrid;
use Symfony\Component\Routing\Generator\UrlGenerator;
use model\AuteurQuery;

class AuthorController extends BaseController
{   
    public function listAction(Request $request)
    {
        $session = $this->getSession();
        
        $authorDatagrid = new AuthorDatagrid(new UrlGenerator($this->routes, $this->requestContext),$request);
        $authorDatagrid->execute();
        
        return $this->render('admin/author/list.php', 
                array('authorDatagrid' => $authorDatagrid,
                ));
    }
    
    public function newAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
         
        if($request->isMethod('POST'))
        {
            $form = $request->request->all();
            $validator = new authorFormValidator($form);
            $errors = $validator->isValid();
            if(is_bool($errors))
            {
                $author = new Auteur();
                $author->setNom($form['nom']);
                $author->setPrenom($form['prenom']);
                $author->setDateNaissance($form['date_naissance']);
                $author->save();
                
                $flashBag->add('success', 'Auteur '.$author->getNom().' crée avec succès');
                
                return $this->redirect($this->generateUrl('admin_author_list',array()));
            }
            else
            {
                $flashBag->add('warning', "Les champs suivant ne sont pas valides ".  implode(', ', $errors));
            }
        }
        
        return $this->render('admin/author/new.php', 
                array());
    }
    
    public function editAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
        $author = AuteurQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$author)
        {
           return $this->exceptionNotFound("l'auteur n'existe pas !");
        }
        
        if($request->isMethod('POST'))
        {
            $form = $request->request->all();
            $validator = new authorFormValidator($form);
            $errors = $validator->isValid();
            if(is_bool($errors))
            {
                $author->setNom($form['nom']);
                $author->setPrenom($form['prenom']);
                $author->setDateNaissance($form['date_naissance']);
                $author->save();
                
                $flashBag->add('success', 'L\'auteur '.$author->getNom().' a été mise à jour avec succès');
                
                return $this->redirect($this->generateUrl('admin_author_list',array()));
            }
            else
            {
                $flashBag->add('warning', "Les champs suivant ne sont pas valides ".  implode(', ', $errors));
            }
        }
        
        return $this->render('admin/author/edit.php', 
                array('author'=>$author));
    }
    
    public function showAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
        $author = AuteurQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$author)
        {
            return $this->exceptionNotFound("l'auteur n'existe pas !");
        }
        
         return $this->render('admin/author/show.php', 
                array('author'=>$author));
    }
    
    public function deleteAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
        $author = AuteurQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$author)
        {
            return $this->exceptionNotFound("l'auteur n'existe pas !");
        }
        
        $authorNom = $author->getNom();
        
        $author->delete();
        
        $flashBag->add('success', 'L\'auteur '.$authorNom.' a été supprimé avec succès');
        
        return $this->redirect($this->generateUrl('admin_author_list',array()));
         
    }
}