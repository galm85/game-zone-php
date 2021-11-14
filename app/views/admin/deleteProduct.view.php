<?php $this->view('includes/header')?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Delete Product</h1>
            </div>
        </div>

        <div class="row">
            <form method="POST">
                <div class="col-md-12">
                    <h4 class="text-center">Delete <?=$product->title ?> from <?=$product->main_category?>  <?=$product->sub_category?> ? </h4>
                </div>
                <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
                <a class="" href="<?=ROOT?>/admin/products"> <button type="button" class="btn btn-outline-success"> Cancel</button></a>
            </form>
        </div>


    </div>




<?php $this->view('includes/footer')?>