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

}
