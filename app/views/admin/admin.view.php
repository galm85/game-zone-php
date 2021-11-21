<?php $this->view('includes/header')?>
   
    <style>
        .admin-nav{
            display: flex;
            justify-content: space-around;
            width: 100%;
            
        }
        .admin-link{
            text-decoration: none;
            color: black;
            font-family: var(--main-font);
        }

    </style>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Admin Panel</h1>
            </div>
        </div>

        <div class="row">
            <div class="admin-nav">
                    <a class="admin-link" href="<?=ROOT?>/admin/products"><h3>Products  <?="(" .count($products). ")"?> </h3></a> 
                    <a class="admin-link" href="<?=ROOT?>/admin/categories"><h3>Categories  <?="(" .count($subs). ")"?></h3></a>
                    <a class="admin-link" href="<?=ROOT?>/admin/messages"><h3>Messages  <?="(" .$messages. ")"?></h3></a>
                    <a class="admin-link" href="<?=ROOT?>/admin/orders"><h3>Orders</h3></a>
            </div>
        </div>
    </div>




<?php $this->view('includes/footer')?>