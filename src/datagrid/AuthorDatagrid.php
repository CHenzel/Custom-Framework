<?php
namespace app\datagrid;

use app\datagrid\BaseDatagrid;
use model\AuteurQuery;
/**
 * Description of BaseDatagrid
 *
 * @author gensky
 */
class AuthorDatagrid extends BaseDatagrid
{
    public function configureFilter()
    {
        return array(
            'nom' => array(
                //'type' => 'model',
                //'type' => 'date',
                //'type' => 'number',
                'type' => 'text',
                'required' => false,
                'multiple' => false,
                'data'   => "",
            ),
            'prenom' => array(
                //'type' => 'model',
                //'type' => 'date',
                //'type' => 'number',
                'type' => 'text',
                'required' => false,
                'multiple' => false,
                'data'   => "",
            ),
        );
    }
    public function configureQuery() 
    {
        return AuteurQuery::create();
    }

    public function getDefaultSortColumn() 
    {
        return 'id';
    }

    public function getName() 
    {
         return 'author';
    }
    
    public function getMaxPerPage() 
    {
        return 5;
    }
    
}
