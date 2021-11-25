<?php $this->view('includes/header')?>

    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center gradient-text"><?=isset($_POST['filter']) ?strtoupper($_POST['filter']) : '' ?> Products</h1>
            </div>
        </div>

        <div class="row m-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=ROOT?>/admin/products">Products </a>
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
                    <a class="nav-link"  href="<?=ROOT?>/admin/users">Users</a>
                </li>
            </ul>
        </div>

        <div class="row justify-content-between mb-5">
            <div class="col-md-6">
                <a class="btn btn-outline-primary" href="<?=ROOT?>/admin/add_product"> Add </a>
            </div>
            <div class="col-md-3 ">
                <form method="POST" class="d-flex">
                    <select name="filter" class="form-control">    
                        <option value="">All Categories</option>
                        <?php foreach($categories as $category):?>
                            <option value=<?=$category->category_url?> > <?=$category->category_title?> </option>
                        <?php endforeach;?>
                    </select>
                    <button class="btn btn-primary ms-2" type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                  <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Platform</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>price</th>
                            <th>Available</th>
                            <th>OnSale</th>
                            <th>Sale Price</th>
                            <th>Created By</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($products)):?>
                            <?php foreach($products as $product):?>
                                <tr>
                                    <td><img src="<?=ASSETS?>/images/<?=$product->image?>" alt="product image" width="50px"></td>
                                    <td><?=$product->main_category?></td>
                                    <td><?=$product->sub_category?></td>
                                    <td><?=$product->title?></td>
                                    <td>$<?=$product->price?></td>
                                    <td><?=$product->available ? 'yes' : 'no' ?></td>
                                    <td><?=$product->sale ? 'yes' : 'no' ?></td>
                                    <td><?=$product->sale_price ? '$'.$product->sale_price : '--' ?></td>
                                    <td><?=$product->created_by?></td>
                                    <td><?=Helpers::get_date($product->created_at)?></td>
                                    <td>
                                    <a href=<?=ROOT."/admin/edit_product/$product->id" ?> > Edit</a>
                                    <a href=<?=ROOT."/admin/delete_product/$product->id" ?> > DELETE</a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>




<?php $this->view('includes/footer')?>