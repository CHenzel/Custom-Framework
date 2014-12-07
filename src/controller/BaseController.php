<?php
namespace app\controller;

use app\controller\inc\RouterHelper;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Templating\Helper\AssetsHelper;
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

class BaseController 
{
    protected $routes;
    protected $requestContext;
    protected $request;
    protected $session;
    protected $mode;
    
    public function __construct($requestContext, $routes,$request,$mode) 
    {
        $this->requestContext = $requestContext;
        $this->routes = $routes;
        //$this->request = Request::createFromGlobals();
        $this->request = $request;
        $this->mode = $mode;
        $this->setSession();
    }
    
    public function redirect($url, $status = 302)
    {
        return new RedirectResponse($url, $status);
    }
    
    protected function generateUrl($route, array $options = array())
    {
        $generator = new UrlGenerator($this->routes, $this->requestContext);
        return $generator->generate($route, $options);
    }
    
    /**
     * @param type $template Le template à afficher
     * @param array Les options à transmettre à la vue pour les utiliser
     * @return Response
     */
    protected function render($template, array $options = array())
    {
        $loader = new FilesystemLoader(__DIR__.'/../view/%name%');
        $templating = new PhpEngine(new TemplateNameParser(), $loader);
        $templating->set(new SlotsHelper);
        $templating->set(new AssetsHelper('/'));
        $templating->set(new RouterHelper(new UrlGenerator($this->routes, $this->requestContext)));
        $templating->addGlobal('request', $this->request); //Marche bien
        $templating->addGlobal('session', $this->request->getSession());
        $templating->addGlobal('user', $this->request->getSession() ? $this->request->getSession()->get('user') : null );
        
        $response = Response::create($templating->render($template, $options));
        return $response;
    }
    
    protected function getFlashBag()
    {
        if($session = $this->getSession())
        {
            return $session->getFlashBag();
        }
    }
    
    protected function setSession()
    {
        if($this->request->hasSession())
        {
            $this->session = $this->request->getSession();
        }else
        {
           $session = new Session();
           $this->request->setSession($session);
           $this->session = $this->request->getSession();
        }
    }
    
    protected function getSession()
    {
        return $this->session;
    }
    
    protected function getUser()
    {
        $user = $this->session->get('user');
        if($user)
        {
            return $user;
        }else
        {
            return null;
        }
    }
    
    protected function exceptionNotFound($message)
    {
        if($this->mode == 'dev')
        {
            try{
                throw new \Exception($message);
            } catch(\Exception $e){
                echo '<br />'.$e;
            }
        }
        else
        {
             return $this->render('erreur_500.php');
        }
    }
    
    
}