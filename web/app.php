<?php
require_once '../vendor/autoload.php';
// setup Propel
require_once '../config/generated-conf/config.php';

use routing\Routing;

$mode = 'dev';

if($mode=='prod')
{
    ini_set("display_errors",0);
    error_reporting(0);
}
else
{
    ini_set("display_errors",1);
    error_reporting(E_ALL & ~E_NOTICE);
}
/*$request = Request::createFromGlobals();

if(!$request->hasSession())
{
    $session = new Session();
    $request->setSession($session);
    $request->getSession()->start();
    $request->getSession()->set('mode', $mode);
}*/

$routing = new Routing($mode);
$routing->configure();
$response = $routing->match();
//$response->send();