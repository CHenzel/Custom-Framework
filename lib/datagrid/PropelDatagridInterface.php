<?php

namespace lib\datagrid;

/**
 * @author Maxime CORSON <maxime.corson@spyrit.net>
 */
interface PropelDatagridInterface
{
    public function configureQuery();
    
    public function getDefaultSortColumn();
    
    public function configureFilter();
    
    public function getSessionName();
    
    public function getName();
}
