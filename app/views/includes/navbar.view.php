

<style>
.nav-item a{
  min-width:100px;
}

.cart-badge{
  position: relative;
}
.cart-items{
  position: absolute;
  top:-10px;
  left:13%;
  background-color: red;
  width: 20px;
  height: 20px;
  text-align: center;
  border-radius: 50%;
  font-size: 0.9rem;
  color: white;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark  my-nav">
  <div class="container">
    <a class="navbar-brand" href="<?=ROOT?>">GameZone</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
           
            <?php foreach($categories as $category):?>
              <li class="nav-item">
                <a class="nav-link" href="<?=ROOT?>/shop/<?=$category->category_url?>"> <i class="<?=$category->category_image?>"></i> <?=$category->category_title?>  </a> 
              </li>
            <?php endforeach;?>    
        </ul>

          <ul class="navbar-nav ms-auto">
            <?php if(isset($_SESSION['USER'])): ?>
            
            <li class="nav-item">
              <a class="nav-link" href="<?=ROOT?>/cart">
                  <div class="cart-badge">
                      <i class="fas fa-shopping-cart " style="font-size:1.2rem"></i>
                      <?php if(Helpers::get_cart_badge()):?>
                        <p class="cart-items"> <?=Helpers::get_cart_badge()?>  </p>
                      <?php endif;?>
                  </div>
              </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= Auth::initial_name()?></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?=ROOT?>/users/profile">profile</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <?php if($_SESSION['USER']->rule == 'admin'):?>
                  <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?=ROOT?>/admin">Admin Panel</a></li>
                  <?php endif;?>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="<?=ROOT?>/logout">Logout</a></li>
                </ul>
            </li> 
          </ul>       
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=ROOT?>/signin"> Sign In </a> 
              </li>
        <?php endif; ?>
    </div>
  </div>
</nav>