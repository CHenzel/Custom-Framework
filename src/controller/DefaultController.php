<?php
namespace app\controller;

use Symfony\Component\HttpFoundation\Request;
use app\controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction(Request $request)
    {
        return $this->render('index.php',
                    array('name'=>$request->get('name')));
    }
}