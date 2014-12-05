<?php
namespace app\controller;

use app\controller\BaseController;
use app\controller\FormValidator\AdminConnexionFormValidator;
use model\Admin;
use model\Base\AdminQuery;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends BaseController
{
 
    public function indexAction(Request $request)
    {
        return $this->render('admin/index.php', 
                    array('name'=>"coucou"));
    }
}