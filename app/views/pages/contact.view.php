
<?php $this->view('includes/header')?>
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="text-center gradient-text">Contact Us</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-5 ">
                <form method="POST">

                    <div class="mt-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value=<?=Helpers::get_old_value('name') ?> >
                        <?php if(isset($errors['name'])):?>
                            <p class="text-danger"> <?=$errors['name']?> </p>
                        <?php endif;?>
                    </div>

                    <div class="mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" value=<?=Helpers::get_old_value('email') ?>>
                        <?php if(isset($errors['email'])):?>
                            <p class="text-danger"> <?=$errors['email']?> </p>
                        <?php endif;?>
                    </div>

                    <div class="mt-3">
                        <label for="phone">Phone:</label>
                        <input type="phone" name="phone" class="form-control" value=<?=Helpers::get_old_value('phone') ?>>
                        <?php if(isset($errors['phone'])):?>
                            <p class="text-danger"> <?=$errors['phone']?> </p>
                        <?php endif;?>
                    </div>

                    <div class="mt-3">
                        <label for="message">What would you like to ask us?</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"> <?=Helpers::get_old_value('message') ?></textarea>
                        <?php if(isset($errors['message'])):?>
                            <p class="text-danger"> <?=$errors['message']?> </p>
                        <?php endif;?>
                    </div>

                    <div class="mt-5 d-flex justify-content-around">
                        <a class="btn btn-danger" href="<?=ROOT?>/">Cancel</a>
                        <button type="submit" name="submit" class="btn btn-outline-primary">Send</button>
                    </div>

                </form>
            </div>
        </div>
    </div>




<?php $this->view('includes/footer')?>