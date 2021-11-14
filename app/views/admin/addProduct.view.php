
<?php $this->view('includes/header')?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Add Product</h1>
            </div>
        </div>

       

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action='' enctype="multipart/form-data">

                    <!-- main category -->
                    <div class="form-group mt-3">
                        <label for="main_category">Platform:</label>
                        <select name="main_category" id="main_category" class="form-control" onchange="this.form.submit()">
                            <option value=''>Select Platform</option>
                            <?php foreach($platforms as $platform):?>
                                <option <?=Helpers::get_old_select('main_category',$platform->id)?> value=<?=$platform->id?> ><?=$platform->category_title?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(isset($errors['main_category'])):?>
                            <span class="text-danger">* <?=$errors['main_category'] ?></span>
                        <?php endif;?>
                    </div>

                    <!-- sub category -->
                    <div class="form-group mt-3">
                        <label for="sub_category">Category:</label>
                        <select name="sub_category" id="sub_category" class="form-control">
                            <option value='' >Select category</option>
                            <?php if(isset($subs)):?>
                                <?php foreach($subs as $sub):?>
                                    <option <?=Helpers::get_old_select('sub_category',$sub->id)?> value=<?=$sub->id?> >  <?=$sub->title?> </option>
                                <?php endforeach;?>  
                            <?php endif;?>
                        </select>
                        <?php if(isset($errors['sub_category'])):?>
                            <span class="text-danger">* <?=$errors['sub_category'] ?></span>
                        <?php endif;?>
                    </div>

                    <!-- title -->
                    <div class="form-group mt-3">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value=<?=Helpers::get_old_value('title')?> >
                        <?php if(isset($errors['title'])):?>
                            <span class="text-danger"><?=$errors['title'] ?></span>
                        <?php endif;?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Price" value=<?=Helpers::get_old_value('price')?> >
                        <?php if(isset($errors['price'])):?>
                            <span class="text-danger"><?=$errors['price'] ?></span>
                        <?php endif;?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="available">Available:</label>
                        <input type="checkbox" name="available" id="available"  <?=Helpers::get_old_check('available')?> >
                    </div>

                    <div class="form-group mt-3">
                        <label for="sale">On Sale:</label>
                        <input type="checkbox" name="sale" id="sale"  <?=Helpers::get_old_check('sale')?> >
                    </div>

                    <div class="form-group mt-3">
                        <label for="sale_price">Sale Price:</label>
                        <input type="text" name="sale_price" id="sale_price" class="form-control" placeholder="Sale Price" value=<?=Helpers::get_old_value('sale_price')?> >
                        <?php if(isset($errors['sale_price'])):?>
                            <span class="text-danger"><?=$errors['sale_price'] ?></span>
                        <?php endif;?>
                    </div>

                    

                   

                    <div class="form-group mt-3">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" >
                    </div>
                    <div class="text-center mt-5">
                        <button class="btn btn-outline-primary" name='submit_form' >Sign In</button>
                    </div>

                </form>
            
            </div>
        </div>

        
    </div>




<?php $this->view('includes/footer')?>