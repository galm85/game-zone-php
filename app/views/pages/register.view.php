
<?php $this->view('includes/header')?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Register</h1>
            </div>
        </div>

       

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group mt-3">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="first_name" value=<?=Helpers::get_old_value('first_name')?> >
                        <?php if(isset($errors['first_name'])):?>
                            <span class="text-danger">* <?=$errors['first_name'] ?></span>
                        <?php endif;?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="last_name" value=<?=Helpers::get_old_value('last_name')?> >
                        <?php if(isset($errors['last_name'])):?>
                            <span class="text-danger">* <?=$errors['last_name'] ?></span>
                        <?php endif;?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="name" class="form-control" placeholder="Email" value=<?=Helpers::get_old_value('email')?> >
                        <?php if(isset($errors['email'])):?>
                            <span class="text-danger">* <?=$errors['email'] ?></span>
                        <?php endif;?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <?php if(isset($errors['password'])):?>
                            <span class="text-danger">* <?=$errors['password'] ?></span>
                        <?php endif;?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password2">Validate Password:</label>
                        <input type="password2" name="password2" id="password2" class="form-control" placeholder="Validate Password">
                        <?php if(isset($errors['password2'])):?>
                            <span class="text-danger">* <?=$errors['password2'] ?></span>
                        <?php endif;?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="image">
                    </div>
                    <div class="text-center mt-5">
                        <button class="btn btn-outline-primary">Sign In</button>
                    </div>

                </form>
            
            </div>
        </div>

        
    </div>




<?php $this->view('includes/footer')?>