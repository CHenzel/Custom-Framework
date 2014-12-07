<div class="pagination-info">
<?php
    $pager = $datagrid->getPager();
    if(count($pager->getResults()) < $datagrid->getResults()->getNbResults())
    {
        echo count($pager->getResults()).' '.$label.' sur '.$datagrid->getResults()->getNbResults().' résultats';
    }
    else
    {
        echo count($pager->getResults()).' '.$label;
    }
?>
</div>
