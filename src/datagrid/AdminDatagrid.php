<?php
namespace app\datagrid;

use app\datagrid\BaseDatagrid;
use model\AdminQuery;
/**
 * Description of BaseDatagrid
 *
 * @author gensky
 */
class AdminDatagrid extends BaseDatagrid
{
    public function configureFilter()
    {
        return array(
            'username' => array(
                'type' => 'text',
                'required' => false,
                'multiple' => false,
                'data'   => "",
            ),
        );
    }
    public function configureQuery() 
    {
        return AdminQuery::create();
    }

    public function getDefaultSortColumn() 
    {
        return 'id';
    }

    public function getName() 
    {
         return 'admin';
    }
    
    public function getMaxPerPage() 
    {
        return 5;
    }
    
}
