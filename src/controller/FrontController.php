<?php
namespace app\controller;

use Symfony\Component\HttpFoundation\Request;
use app\controller\BaseController;

class FrontController extends BaseController
{
    public function indexAction(Request $request)
    {
        return $this->render('index.php', 
                    array('name'=>"coucou"));
    }
}