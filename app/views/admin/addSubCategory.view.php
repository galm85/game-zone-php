
<?php $this->view('includes/header')?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Add Category</h1>
            </div>
        </div>

       

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action='' enctype="multipart/form-data">

                    <!-- main category -->
                    <div class="form-group mt-3">
                        <label for="main_category">Platform:</label>
                        <select name="main_category" id="main_category" class="form-control">
                            <option value=''>Select Platform</option>
                            <?php foreach($platforms as $platform):?>
                                <option <?=Helpers::get_old_select('main_category',$platform->category_url)?> value=<?=$platform->category_url?> ><?=$platform->category_title?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(isset($errors['main_category'])):?>
                            <span class="text-danger">* <?=$errors['main_category'] ?></span>
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

                    

                    <!-- IMAGE -->
                        
                    <div class="form-group mt-3">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" >
                    </div>


                    <!-- Submit -->
                    <div class="text-center mt-5">
                        <button class="btn btn-outline-primary"  >Save</button>
                    </div>

                </form>
            
            </div>
        </div>

        
    </div>




<?php $this->view('includes/footer')?>