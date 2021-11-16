<?php $this->view('includes/header')?>
    
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"><?=$header?></h1>
        </div>
    </div>

    <div class="row justify-content-around">
        <?php foreach($products as $product):?>
            <div class="product-card">
                <div class="product-image">
                    <a href="<?=ROOT?>/shop/<?=strtolower($product->main_category) ?>/<?=strtolower($product->sub_category)?>/<?=strtolower($product->id) ?>">
                        <img src="<?=ASSETS?>/images/<?=$product->image?>" width="100%" alt="category image">
                    </a>
                </div>
                <div class="product-data">
                    <h5 class="text-center"><?=$product->title?></h5>
                    <p>$ <?=$product->price?> </p>
                </div>
            </div>
        <?php endforeach;?>
    </div>



   </div>




<?php $this->view('includes/footer')?>