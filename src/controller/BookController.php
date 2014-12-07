<?php
namespace app\controller;

use Symfony\Component\HttpFoundation\Request;
use app\controller\BaseController;
use app\controller\FormValidator\LivreFormValidator;
use model\Livre;
use app\datagrid\BookDatagrid;
use Symfony\Component\Routing\Generator\UrlGenerator;

class BookController extends BaseController
{
    public function indexAction(Request $request)
    {
        return $this->render('index.php', 
                    array('name'=>"coucou"));
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
                $livre = new Livre();
                $livre->setNom($form['nom']);
                $livre->setPrix($form['prix']);
                $livre->setGenre($form['genre']);
                $livre->setDateParution($form['date_parution']);
                $livre->save();
                
                $flashBag->add('success', 'livre crée avec succès');
                
                return $this->redirect($this->generateUrl('book_list',array())); // Si il y a des paramêtres dans la route les mettre dans le tableau
            }
            else
            {
                $flashBag->add('warning', "Les champs suivant ne sont pas valides ".  implode(', ', $errors));
            }
        }
        
        return $this->render('livre/new.php', 
                array());
    }
    
    public function listAction(Request $request)
    {
        $session = $this->getSession();
        
        $bookDatagrid = new BookDatagrid(new UrlGenerator($this->routes, $this->requestContext),$request);
        $bookDatagrid->execute();
        
        return $this->render('livre/list.php', 
                array('bookDatagrid' => $bookDatagrid,
                ));
    }
}