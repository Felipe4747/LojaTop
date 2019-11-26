<div class="row">
    <?php
        $i = 0;
    ?>
    <?php
    foreach ($list as $product_item) 
    {?>
    <div class="col-sm-4">
        <?php $this->loadView('product_item', $product_item);  ?>
    </div>
    <?php
    
    if ($i >= 2)
    {
        $i = 0;
        echo '</div><div class="row">';
    }
    else
    {
        $i++;
    }
    
    }?>
</div>
