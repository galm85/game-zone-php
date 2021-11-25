
<?php $this->view('includes/header')?>
    <style>
        .checkout{
            border:1px solid black;
            padding: 20px;
            border-radius: 20px;
            background-color: rgba(0, 20, 20, 0.1);
        }
    </style>

    <div class="container">
        
        <div class="row">
            <div class="col-12">
                <h1>My Cart</h1>
            </div>
        </div>

        
        <?php if($items):?>
        <div class="row justify-content-between">
            <div class="col-md-8 border-end ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>QTY</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach($items as $item):?>
                                    <tr>
                                        <td><img src="<?=ASSETS?>/images/<?=$item->image?>" width="50px" alt=""></td>
                                        <th><?=$item->title?></th>
                                        <th><?=$item->main_category?> <?=$item->sub_category?></th>
                                        <th>$<?=$item->price?></th>
                                        <th><?=$item->qty?></th>
                                        <th>$<?=$item->price * $item->qty?></th>
                                    </tr>
                                <?php endforeach;?>
                        </tbody>
                    </table> 
            </div> 

            <div class="col-md-3">
                <div class="checkout">
                    <h5>Total Items: <?=Helpers::get_cart_badge()?></h5>
                    <h5>Total Price: $<?=$sum?></h5>
                    <hr>
                    <a class="btn btn-warning"  href="<?=ROOT?>/order/checkout">Proceed</a>
                </div>
                <div class="text-center">
                    <a class="btn btn-danger mt-5" href="<?=ROOT?>/cart/clear">Clear Cart</a>

                </div>
            </div>

        </div>

        <?php else:?>
            <div class="row">
                <div class="col-12">
                    <h3>No Items in your cart yet...</h3>
                </div>
            </div>
        <?php endif;?>
           

    </div>
    


<?php $this->view('includes/footer')?>