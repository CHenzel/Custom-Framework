<?php
namespace routing;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;

/**
 * Description of Security
 *
 * @author gensky
 */
class Security 
{
    protected $providers;
    protected $user;
    protected $request;
    protected $routes;
    protected $requestContext;

    public function __construct()
    {
        
    }
    
    public function configure($request,$requestContext,$routes)
    {
        $this->request = $request;
        $this->requestContext = $requestContext;
        $this->routes = $routes;
        $this->user = $request->getSession()->get('user');
        $this->parseYmlFile();
    }
    protected function parseYmlFile()
    {
        $parser = new Parser();
        
        try {
            $values = $parser->parse(file_get_contents(__DIR__.'/../config/security.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
        
        foreach ($values as $key => $value) {
            if($key == 'firewalls')
            {
                $this->providers[]=$value;
            }
        }
    }
    
    public function accessCheck($uri)
    {
        foreach ($this->providers as $provider) 
        {
            foreach ($provider as $key => $value) 
            {
                $pattern = $value['pattern'];
                if(preg_match($pattern, $uri, $m))
                {
                    $object = $value['provider'];
                    $urlLogin = $value['login_path'];
                    
                    if((($this->user !== null) && !($this->user instanceof $object)) || $this->user==null)
                    {
//                        $generator = new UrlGenerator($this->routes, $this->requestContext);
//                        return new RedirectResponse($generator->generate($urlLogin,array()), 302);
                        return $urlLogin;
                    }

                }
            }
        }
    }
}
