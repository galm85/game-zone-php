<?php $this->view('includes/header')?>
    
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"><?=$header?></h1>
        </div>
    </div>

    <div class="row">
        <?php foreach($products as $product):?>
            <div class="col-md-3 sub-category-card">
                <a href="<?=ROOT?>/shop/<?=strtolower($product->main_category) ?>/<?=strtolower($product->sub_category)?>/<?=strtolower($product->id) ?>">
                <img src="<?=ASSETS?>/images/<?=$product->image?>" width="100%" alt="category image">
                </a>
                <h3 class="text-center"><?=$product->title?></h3>
            </div>
        <?php endforeach;?>
    </div>



   </div>




<?php $this->view('includes/footer')?>