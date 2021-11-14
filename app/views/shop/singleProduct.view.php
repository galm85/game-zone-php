<?php $this->view('includes/header')?>
    
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"></h1>
        </div>
    </div>

        <div class="row">
            <div class="col-md-6">
                <img src="<?=ASSETS?>/images/<?=$product->image?>" width="100%" alt="product image">
            </div>
            <div class="col-md-6">
                <h1><?=$product->title?></h1>
                <small><?=$product->main_category?></small>

                <?php if($product->sale):?>
                    <h5><b>Price:</b> $<?=$product->price?> </h5>
                    <h5><b>Price:</b> $<?=$product->sale_price?> </h5>
                    <p>On Sale</p>
                <?php else:?>
                    <h5><b>Price:</b> $<?=$product->price?> </h5>
                <?php endif;?>


                <p><?=$product->article?></p>

                <button class="btn btn-primary">Add To Cart</button>
                <button class="btn btn-outline-danger"><a href="<?=ROOT?>/shop/<?=$product->main_category?>/<?=$product->sub_category?>">Return</a></button>
            
            </div>
        
        </div>

    



   </div>




<?php $this->view('includes/footer')?>