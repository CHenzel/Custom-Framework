<?php
// Param $column/$label/$datagrid/$route
if($datagrid->getSortColumn() == $column )
{
    if($datagrid->getSortOrder() == 'desc' )
    {
        $order = 'asc';
        $icon = 'fa-chevron-down';
    }
    else
    {
        $order = 'desc';
        $icon = 'fa-chevron-up';
    }
}
else
{
    $defaultSort = $datagrid->getDefaultSort();
    $order = $defaultSort['order'];
}
?>
    <a href="<?php echo $datagrid->getSortPath($route,$column,$order); ?>">
        <?php echo $label ?>
    </a>
<?php
    if($datagrid->getSortColumn() == $column)
    {
?>
        <i class="fa <?php echo $icon ?>"></i>
<?php
    }
?>

