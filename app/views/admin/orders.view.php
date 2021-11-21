<?php $this->view('includes/header')?>
    <style>
        .in_procces{
           font-weight: bold;
           background-color: rgba(0, 0, 0, 0.1);
        }
    </style>

    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Orders</h1>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-8">
                <a href="<?=ROOT?>/admin" class="btn btn-outline-danger">Return</a>
            </div>
            <div class="col-4">
                <form method="POST" style="display: flex;">
                    <select name="filter" id="filter" class="form-control">
                        <option value=''>All</option>
                        <option value='in_procces'>In Procces</option>
                        <option value='ready'>Ready</option>
                        <option value='sent'>Sent</option>
                        <option value='anceld'>Canceld</option>
                    </select>
                    <button class="btn btn-outline-primary ms-2" type="submit" name="submit">Filter</button>
                </form>
            </div>

        </div>

        <div class="row my-3">
            <div class="col-8">
                <form method="POST" style="display:flex">
                    <input type="text" class="form-control" name="order_id" placeholder="Insert Order ID">
                    <button class="btn btn-primary ms-2" name="single_order">Search</button>
                
                </form>
            </div>
        </div>


        <div class="row ">
            <div class="col-12">
                <?php if(count($orders) > 0):?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>User ID</th>
                                    <th>Status</th>
                                    <th>Order Sum</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($orders as $order):?>
                                    <tr class=<?=$order->status == 'in_procces' ? 'in_procces' : '' ?>>
                                        <td><?=$order->id?></td>
                                        <td><?=$order->user_id?></td>
                                        <td><?=$order->status?></td>
                                        <td>$<?=$order->total_sum?></td>
                                        <td><?=Helpers::get_date($order->created_at)?></td>
                                        <td><a class="btn btn-primary" href="<?=ROOT?>/admin/single_order/<?=$order->id?>">Order</a></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                <?php else:?>
                    <h3>No Orders</h3>
                <?php endif;?>
            </div>
        </div>





    </div>



<?php $this->view('includes/footer')?>