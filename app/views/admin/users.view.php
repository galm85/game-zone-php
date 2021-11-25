<?php $this->view('includes/header')?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center gradient-text"> Users</h1>
            </div>
        </div>

        <div class="row m-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?=ROOT?>/admin/products">Products </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?=ROOT?>/admin/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="<?=ROOT?>/admin/messages">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="<?=ROOT?>/admin/orders">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="<?=ROOT?>/admin/users">Users</a>
                </li>
            </ul>
        </div>

        <div class="row justify-content-between mb-5">
            <div class="col-md-6">
                <a class="btn btn-outline-primary" href="<?=ROOT?>/admin/add_product"> Add New Admin </a>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                    <h3>Users Table</h3>
                  <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Rule</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($users)):?>
                            <?php foreach($users as $user):?>
                                <tr>
                                    <td><img src="<?=ASSETS?>/images/<?=$user->image?>" alt="product image" width="50px"></td>
                                    <td><?=$user->first_name?></td>
                                    <td><?=$user->last_name?></td>
                                    <td><?=$user->email?></td>
                                    <td><?=$user->rule?></td>
                                    
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                  </table>
            </div>
        </div>

        <hr>
        <hr class="mb-5">

        <div class="row">
            <div class="col-md-12">
                    <h3>Admins Table</h3>
                  <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Rule</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($admins)):?>
                            <?php foreach($admins as $admin):?>
                                <tr>
                                    <td><img src="<?=ASSETS?>/images/<?=$admin->image?>" alt="product image" width="50px"></td>
                                    <td><?=$admin->first_name?></td>
                                    <td><?=$admin->last_name?></td>
                                    <td><?=$admin->email?></td>
                                    <td><?=$admin->rule?></td>
                                    
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>




<?php $this->view('includes/footer')?>