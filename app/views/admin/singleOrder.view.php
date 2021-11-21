<?php $this->view('includes/header')?>
    
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between">
                <h1> Order #<?=$order->id?> - <?= str_replace('_',' ', $order->status)?></h1>
                <a href="<?=ROOT?>/admin/orders"><button class="btn btn-danger">Return</button></a>
                <div>
                   <form action="<?=ROOT?>/order/change_status" method="POST" style="display:flex;justify-content: space-between;align-items: center;">
                        <input type="text" name='id' value="<?=$order->id?>" style="display:none">
                        <select name="status" id="status" class="form-control" style="width: 200px;margin-right:20px">
                            <option value="<?=$order->status?>"><?=str_replace('_',' ', $order->status)?></option>
                            <option value="in_procces"> In Procces</option>
                            <option value="ready"> Ready</option>
                            <option value="sent"> Sent</option>
                            <option value="canceled"> Canceled</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-primary">Change</button>
                   </form>
                
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <h2>User Data</h2>
                <p>Name: <?=$user->first_name?> <?=$user->last_name?></p>
                <p>Email: <?=$user->email?></p>
                <p>User ID: <?=$user->id?></p>
            </div>
            <div class="col-md-4">
                <h2>Payment</h2>
                <p>Cradit Card: <?=$order->credit_card_type?></p>
                <p>Cradit Card Number: <?=$order->credit_card_number?></p>
                <p>Cradit Card 3 Digit: <?=$order->credit_card_digit?></p>
                <p>Cradit Card Valid Date: <?=$order->credit_card_valid?></p>
            </div>
        </div>
    <hr>
        <div class="row">
            <div class="col-md-12">
                <h2>Order Data</h2>
                <div class="d-flex">
                    <?php foreach($items as $item):?>
                        <div style='margin:20px 50px'>
                            <img src="<?=ASSETS?>/images/<?=$item->image?>" width="100px" alt="product image">
                            <p><?=$item->title?></p>
                            <p><?=$item->main_category?> <?=$item->sub_category?></p>
                            <p>QTY: <?=$item->qty?></p>
                        </div>
                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
    
   <?php
    echo '<pre>';
    print_r(self::$data);
   ?>

<?php $this->view('includes/footer')?>