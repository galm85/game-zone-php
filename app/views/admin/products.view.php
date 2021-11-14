<?php $this->view('includes/header')?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Products</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-outline-primary" href="<?=ROOT?>/admin/add_product"> Add </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                  <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>price</th>
                            <th>Available</th>
                            <th>OnSale</th>
                            <th>Sale Price</th>
                            <th>Created By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($products)):?>
                            <?php foreach($products as $product):?>
                                <tr>
                                    <td><img src="<?=ASSETS?>/images/<?=$product->image?>" alt="product image" width="50px"></td>
                                    <td><?=$product->title?></td>
                                    <td>$<?=$product->price?></td>
                                    <td><?=$product->available ? 'yes' : 'no' ?></td>
                                    <td><?=$product->sale ? 'yes' : 'no' ?></td>
                                    <td><?=$product->sale_price ? $product->sale_price : '--' ?></td>
                                    <td><?=$product->created_by?></td>
                                    <td><?=Helpers::get_date($product->created_at)?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>




<?php $this->view('includes/footer')?>