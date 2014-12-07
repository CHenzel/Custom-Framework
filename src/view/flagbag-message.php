<?php
    $types = array('warning', 'info', 'danger', 'success');
    if($session)
    {
        foreach ($types as $type) 
        {
            foreach ($session->getFlashBag()->get($type, array()) as $message) 
            {
    ?>
            <div class='alert alert-<?php echo $type  ?>'>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only"></span></button>
                <?php echo $message ?>
            </div>
    <?php
            }
        }
    }
?>

