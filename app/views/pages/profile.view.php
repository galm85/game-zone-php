
<?php $this->view('includes/header')?>
    
    <div class="container">
        

        <div class="row">
            <div class="col-12">
                <h1 class="text-center gradient-text"> <?=$user->first_name?>  <?=$user->last_name?></h1>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-3  border">
                
                 <img src="<?=ASSETS?>/images/<?=$user->image?>" width="100%"  alt="">   
                 <table class="table mt-3">
                     <tr>
                         <td>First Name</td>
                         <th><?=$user->first_name?></th>
                     </tr>
                     <tr>
                         <td>Last Name</td>
                         <th><?=$user->last_name?></th>
                     </tr>
                     <tr>
                         <td>Email</td>
                         <th><?=$user->email?></th>
                     </tr>
                     <tr>
                         <td>User ID</td>
                         <th>0000<?=$user->id?></th>
                     </tr>
                 </table>   
            </div>
           
            <div class="col-8">
                <h3 class=" my-4">Order History</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Sum</th>
                            <th>Status</th>
                            <th>Order ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order):?>
                            <tr>
                                <td><?=Helpers::get_date($order->date)?></td>
                                <td class="d-flex" style="overflow: scroll;">
                                    <?php foreach($order->cart as $item):?>
                                        <div class="me-5">
                                            <img src="<?=ASSETS?>/images/<?=$item->image?>" width="30px" alt="product image"> X <?=$item->qty?> 
                                            
                                        </div>
                                    <?php endforeach;?>
                                </td>
                                <td>$<?=$order->total?></td>
                                <td><b><?=$order->status?></b></td>
                                <td>0000<?=$order->id?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>




<?php $this->view('includes/footer')?>