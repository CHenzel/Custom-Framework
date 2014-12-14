<?php
namespace app\controller;

use Symfony\Component\HttpFoundation\Request;
use app\controller\BaseController;
use app\controller\FormValidator\LivreFormValidator;
use model\Livre;
use app\datagrid\BookDatagrid;
use Symfony\Component\Routing\Generator\UrlGenerator;
use model\LivreQuery;
use model\AuteurQuery;

class BookController extends BaseController
{   
    public function listAction(Request $request)
    {
        $session = $this->getSession();
        
        $bookDatagrid = new BookDatagrid(new UrlGenerator($this->routes, $this->requestContext),$request);
        $bookDatagrid->execute();
        
        return $this->render('admin/book/list.php', 
                array('bookDatagrid' => $bookDatagrid,
                ));
    }
    
    public function newAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
         
        if($request->isMethod('POST'))
        {
            $form = $request->request->all();
            $validator = new LivreFormValidator($form);
            $errors = $validator->isValid();
            if(is_bool($errors))
            {
                $book = new Livre();
                $book->setNom($form['nom']);
                $book->setPrix($form['prix']);
                $book->setGenre($form['genre']);
                $book->setDateParution($form['date_parution']);
                $book->setAuteurId($form['auteur_id']);
                $book->save();
                
                $flashBag->add('success', 'livre '.$book->getNom().' crée avec succès');
                
                return $this->redirect($this->generateUrl('admin_book_list',array())); // Si il y a des paramêtres dans la route les mettre dans le tableau
            }
            else
            {
                $flashBag->add('warning', "Les champs suivant ne sont pas valides ".  implode(', ', $errors));
            }
        }
        
        $authors = AuteurQuery::create()->find();
        
        return $this->render('admin/book/new.php', 
                array('authors' => $authors));
    }
    
    public function editAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
        $book = LivreQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$book)
        {
           return $this->exceptionNotFound("le livre n'existe pas !");
        }
        
        if($request->isMethod('POST'))
        {
            $form = $request->request->all();
            $validator = new LivreFormValidator($form);
            $errors = $validator->isValid();
            if(is_bool($errors))
            {
                $book->setNom($form['nom']);
                $book->setPrix($form['prix']);
                $book->setGenre($form['genre']);
                $book->setDateParution($form['date_parution']);
                $book->setAuteurId($form['auteur_id']);
                $book->save();
                
                $flashBag->add('success', 'Le livre '.$book->getNom().' a été mise à jour avec succès');
                
                return $this->redirect($this->generateUrl('admin_book_list',array())); // Si il y a des paramêtres dans la route les mettre dans le tableau
            }
            else
            {
                $flashBag->add('warning', "Les champs suivant ne sont pas valides ".  implode(', ', $errors));
            }
        }
        
         $authors = AuteurQuery::create()->find();
        
        return $this->render('admin/book/edit.php', 
                array('book'=>$book,'authors' => $authors));
    }
    
    public function showAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
        $book = LivreQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$book)
        {
            return $this->exceptionNotFound("le livre n'existe pas !");
        }
        
         return $this->render('admin/book/show.php', 
                array('book'=>$book));
    }
    
    public function deleteAction(Request $request)
    {
        $session = $this->getSession();
        $flashBag = $this->getFlashBag();
        $book = LivreQuery::create()->findOneById($request->attributes->get('id'));
        
        if(!$book)
        {
            return $this->exceptionNotFound("le livre n'existe pas !");
        }
        
        $bookNom = $book->getNom();
        
        $book->delete();
        
        $flashBag->add('success', 'Le livre '.$bookNom.' a été supprimé avec succès');
        
        return $this->redirect($this->generateUrl('admin_book_list',array()));
         
    }
}