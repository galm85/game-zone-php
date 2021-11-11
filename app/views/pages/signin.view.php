
<?php $this->view('includes/header')?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Sign In</h1>
            </div>
        </div>

       <?php if(isset($errors)):?>
        <div>
            <p><?=$errors?></p>
        </div>
       <?php endif;?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <div class="form-group mt-5">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="name" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Email">
                    </div>
                    <div class="text-center mt-5">
                        <button class="btn btn-outline-primary">Sign In</button>
                    </div>

                </form>
            
            </div>
        </div>

        
    </div>




<?php $this->view('includes/footer')?>