<?php $this->view('includes/header')?>
    
   <div class="container">
    

        <div class="single-product-card ">
                    
                <div class="single-product-card-image">
                    <img src="<?=ASSETS?>/images/<?=$product->image?>" width="100%" alt="product image">
                    <?php if($product->sale):?>
                    <div class="on-sale">
                        <p>SALE</p>
                    </div>
                    <?php endif;?>
                </div>

                <div class="single-product-card-data">
                    <h1><?=$product->title?> | <?=$product->main_category?></h1>
                   
                    <hr>
                    <?php if($product->sale):?>
                        <h6><b>Price:</b> $<?=$product->price?> </h6>
                        <h5><b>Price:</b> $<?=$product->sale_price?> </h5>
                        <p>On Sale</p>
                    <?php else:?>
                        <h5><b>Price:</b> $<?=$product->price?> </h5>
                    <?php endif;?>

                    <p><?=$product->article?></p>

                    <a class="btn btn-primary" href="<?=ROOT?>/cart/add_to_cart/<?=$product->id?>">  Add To Cart</a>
                    <a class="btn btn-outline-danger" href="<?=ROOT?>/shop/<?=$product->main_category?>/<?=$product->sub_category?>">Return</a>
                </div>
        
        </div>

    



   </div>




<?php $this->view('includes/footer')?>