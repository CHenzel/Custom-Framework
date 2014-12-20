<?php
namespace app\controller;

use Symfony\Component\HttpFoundation\Request;
use app\controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction(Request $request)
    {
        $flashBag = $this->getFlashBag();
        $name = $request->attributes->get('name');
        if(!$name)
        {
            $flashBag->add('warning', "Name not found");
        }
        return $this->render('home.php', array('name'=>$name));
    }
}