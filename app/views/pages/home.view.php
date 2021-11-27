
<?php $this->view('includes/header')?>
    <style>
        .slide-image{
            height: 40vh;
            object-fit: cover;
        }

    </style>
   
   <!-- Slider -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img  src="<?=ASSETS?>/images/ps5ad.jpeg" class="d-block w-100 slide-image"  alt="...">
                </div>
                <div class="carousel-item">
                <img src="<?=ASSETS?>/images/xboxad.png" class="d-block w-100 slide-image" alt="...">
                </div>
                <div class="carousel-item">
                <img src="<?=ASSETS?>/images/ps4ad.png" class="d-block w-100 slide-image" alt="...">
                </div>
                <div class="carousel-item">
                <img src="<?=ASSETS?>/images/gamesad.jpg" class="d-block w-100 slide-image" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    </div>
    <!-- End Slider -->
    

    <div class="container">

        <!-- New Products -->
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <h1 class="text-center mb-5 header-1"><span class="gradient-text">New</span> Games</h1>
                </div>
                <?php foreach($newproducts as $new):?>
                    <div class="col-md-2">
                    <a href="<?=ROOT?>/shop/<?=strtolower($new->main_category) ?>/<?=strtolower($new->sub_category)?>/<?=strtolower($new->id) ?>">
                        <img src="<?=ASSETS?>/images/<?=$new->image?>" style="width:100%;height: 100%;object-fit: cover;" alt="game image">
                    </a>
                    </div>
                <?php endforeach;?>
            </div>

        <!--End New Products -->

        <!-- Sale Products -->
            <div class="row mt-5 justify-content-between">
                <div class="col-12">
                    <h1 class="text-center mb-5 header-1"><span class="gradient-text">Sale</span> Games</h1>
                </div>
                <?php foreach($saleproducts as $sale):?>
                    <div class="col-md-2">
                    <a href="<?=ROOT?>/shop/<?=strtolower($sale->main_category) ?>/<?=strtolower($sale->sub_category)?>/<?=strtolower($sale->id) ?>">
                        <img src="<?=ASSETS?>/images/<?=$sale->image?>" style="width:100%;height: 100%;object-fit: cover;" alt="game image">
                    </a>
                    </div>
                <?php endforeach;?>
            </div>

        <!--End Sale Products -->
    </div>

    <hr class="mt-5">

    <!-- contact us -->
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class=" gradient-text">GameZone</h1>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat molestiae delectus iste atque eaque aliquam natus obcaecati velit, quod adipisci odit perferendis quaerat ipsum ducimus facere quo. Eveniet, maxime dolore.</p>

                <p><b><i class="fas fa-map-marker-alt"></i></b> 44 Disengoff St. Tel Aviv</p>
                <p><b><i class="fas fa-phone-alt"></i></b> +972-3-985784587</p>
                <p><b><i class="fas fa-envelope"></i></b> sales@gamezone.com</p>
                <div>
                    <a href="<?=ASSETS?>/images/map.png">
                        <img src="<?=ASSETS?>/images/map.png" width="100%" alt="">
                    </a>
                </div>
            </div>    
        
        <div class="col-md-4 ">
                <form action="<?=ROOT?>/contact" method="POST" id="con">

                    <div class="mt-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" required value=<?=Helpers::get_old_value('name') ?> >
                        <?php if(isset($errors['name'])):?>
                            <p class="text-danger"> <?=$errors['name']?> </p>
                        <?php endif;?>
                    </div>

                    <div class="mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required value=<?=Helpers::get_old_value('email') ?>>
                        <?php if(isset($errors['email'])):?>
                            <p class="text-danger"> <?=$errors['email']?> </p>
                        <?php endif;?>
                    </div>

                    <div class="mt-3">
                        <label for="phone">Phone:</label>
                        <input type="phone" name="phone" class="form-control" minlength="9" maxlength="13" required value=<?=Helpers::get_old_value('phone') ?>>
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
                        <button  name="submit" class="btn btn-outline-primary">Send</button>
                    </div>

                </form>
            </div>

            
        </div>
    </div>
    <!-- end contact us -->


<?php $this->view('includes/footer')?>