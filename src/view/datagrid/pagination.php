<?php
// Param $datagrid/$route/$pager
$pager = $datagrid->getPager();

if($pager->haveToPaginate())
{
    $links = 5;
    $pages = $pager->getLinks($links);
    $extraParameters = defined($extraParameters) && $extraParameters ? $extraParameters : array();
   ?>
   <ul class="pagination">
<?php if($pages[0] != $pager->getFirstPage()) { ?>
       <li>
            <a href="<?php echo $datagrid->getPaginationPath($route, $pager->getFirstPage(),$extraParameters) ?>" 
               title="page <?php echo $pager->getFirstPage() ?>" 
               class="<?php if($pager->getFirstPage() == $pager->getPage()){ echo 'active'; } ?>" ><?php echo $pager->getFirstPage() ?></a>
        </li>
<?php   if($pages[0] > ($pager->getFirstPage()+1)) { ?>        
            <li><a href="#">...</a></li>
<?php   } ?>
<?php }
 foreach ($pages as $page) {
?>
    <li class="<?php if($pager->getPage() == $page ) { echo 'active'; } ?>">
        <a href="<?php echo $datagrid->getPaginationPath($route, $page,$extraParameters) ?>" 
           title="page <?php echo $page ?>" 
           class="<?php if($page == $pager->getPage()){ echo 'active'; } ?>" ><?php echo $page ?></a>
    </li>            
<?php            
 }
 
 if(array_key_exists($links-1, $pages) && (array_key_exists($links-1, $pages) < ($pagers->getLastPage()-1)))
 {
    echo '<li><a href="#">...</a></li>';
 }
 if(array_key_exists($links-1, $pages) && (array_key_exists($links-1, $pages) != ($pagers->getLastPage())))
 {
?>
<a href="<?php echo $datagrid->getPaginationPath($route, $pager->getLastPage(),$extraParameters) ?>" 
           title="page <?php echo $pager->getLastPage() ?>" 
           class="<?php if($pager.getLastPage() == $pager->getPage()){ echo 'active'; } ?>" ><?php echo $pager->getLastPage() ?></a>
<?php
 }
}


