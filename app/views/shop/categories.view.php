<?php $this->view('includes/header')?>
    
   <div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h1 class="gradient-text header-1" ><?=$header?></h1>
        </div>
    </div>

    <div class="row justify-content-between">
        <?php foreach($subs as $sub):?>
            <div class="col-md-3 sub-category-card">
                <a href="<?=ROOT?>/shop/<?=strtolower(str_replace(' ','-',$sub->main_category))?>/<?=strtolower($sub->title)?>">
                <img src="<?=ASSETS?>/images/<?=$sub->image?>" width="100%" alt="category image">
                <h3 ><?=$sub->title?></h3>
                </a>
            </div>
        <?php endforeach;?>
    </div>

    <hr class="my-5">


    <?php if(isset($products)):?>
        <div class="row justify-content-around">
            <h3 class="gradient-text">All <?=$header?> Products</h3>
            <?php foreach($products as $product):?>
                <div class="product-card">
                    <a style="text-decoration: none;" href="<?=ROOT?>/shop/<?=strtolower($product->main_category) ?>/<?=strtolower($product->sub_category)?>/<?=strtolower($product->id) ?>">
                        <div class="product-image">
                                <img src="<?=ASSETS?>/images/<?=$product->image?>" width="100%" alt="category image">
                        </div>
                        <div class="product-data">
                            <h5 class="text-center"><?=$product->title?></h5>
                            <?php if($product->sale == 0): ?>
                                <p style="font-size: 1.1rem;font-weight: 700;">$ <?=$product->price?> </p>
                            <?php else: ?>
                                <p style='text-decoration: line-through;height: 10px;font-weight: 700;'>$ <?=$product->price?> </p>
                                <p class="text-danger" style="font-weight: 700;">$ <?=$product->sale_price?> </p>
                            <?php endif; ?>        
                        </div>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    <?php endif;?>

</div>




<?php $this->view('includes/footer')?>