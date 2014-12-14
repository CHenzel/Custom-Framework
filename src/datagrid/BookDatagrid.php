<?php
namespace app\datagrid;

use app\datagrid\BaseDatagrid;
use model\LivreQuery;
/**
 * Description of BaseDatagrid
 *
 * @author gensky
 */
class BookDatagrid extends BaseDatagrid
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
            'genre' => array(
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
        return LivreQuery::create();
    }

    public function getDefaultSortColumn() 
    {
        return 'id';
    }

    public function getName() 
    {
         return 'book';
    }
    
    public function getMaxPerPage() 
    {
        return 5;
    }
    
}
