<?php
namespace routing;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Session\Session;

class Routing 
{
    protected $routes;
    
    public function __construct()
    {
        $this->routes = new RouteCollection();
    }
    
    public function configure()
    {
        $this->parseYmlFile();
        /*$this->addRoute('toto', new Route('/test/{id}', 
                array('controller' => 'Test', 
                      'action' => 'test')),
                array(),
                array(),
                '',
                array(),
                array(array('POST'))
                );*/
    }
    
    protected function parseYmlFile()
    {
        $finder = new Finder();
        $finder->files()->in(__DIR__.'/../config/routing');

        $locator = new FileLocator(array(__DIR__.'/../config/routing'));
        $loader = new YamlFileLoader($locator);
        
        foreach ($finder as $file) 
        {
            $subCollection = $loader->load($file->getRelativePathname());
            $this->routes->addCollection($subCollection);
        }
    }
    
    protected function addRoute($name, $route)
    {
        $this->routes->add($name, $route);
    }
    
    /**
     * @return Response
     * @throws \Exception
     */
    public function match()
    {
        $request = Request::createFromGlobals();
        $requestContext = new RequestContext();
        $requestContext->fromRequest($request);
        
        $matcher = new UrlMatcher($this->routes, $requestContext);
        
        $parameters = $matcher->match($request->getPathInfo());
        //var_dump(extract($matcher->match($request->getPathInfo()), EXTR_SKIP)); die('oki');
        $parametersController = explode("::",$parameters['_controller']);
        $controllerName = $parametersController[0];
        $actionName = $parametersController[1];
        
        $namespace = "app\\controller\\".$controllerName;
        
        $controller = new $namespace($requestContext, $this->routes,$request);
        $action = $actionName.'Action';
        
        $request->attributes->add($parameters);
        
        if(!$request->hasSession())
        {
            $session = new Session();
            $request->setSession($session);
            $request->getSession()->start();
        }
        
        $response = $controller->$action($request);
        if(!($response instanceof Response))
        {
            throw new \Exception('Le controller doit renvoyer une réponse (Symfony\Component\HttpFoundation\Response)', 500);
        }
        return $response;
    }
}
