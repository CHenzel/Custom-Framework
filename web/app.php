<?php

require_once '../vendor/autoload.php';
// setup Propel
require_once '../config/generated-conf/config.php';

use app\routing\Routing;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

$mode = 'dev';
$request = Request::createFromGlobals();

if(!$request->hasSession())
{
    $session = new Session();
    $request->setSession($session);
    $request->getSession()->start();
    $request->getSession()->set('mode', $mode);
}

$routing = new Routing();
$routing->configure();
$response = $routing->match();
$response->send();

