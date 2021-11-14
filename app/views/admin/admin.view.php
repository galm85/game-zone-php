<?php $this->view('includes/header')?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Admin Panel</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                    <a href="<?=ROOT?>/admin/products"><h3>Products</h3></a>
                    <a href="<?=ROOT?>/admin/categories"><h3>Categories</h3></a>
            </div>
        </div>
    </div>




<?php $this->view('includes/footer')?>