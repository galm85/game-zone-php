<style>
.nav-item a{
  min-width:100px;
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
            <li class="nav-item">
              <a class="nav-link" href="<?=ROOT?>/about">About  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=ROOT?>/about">Contact  </a>
            </li>
            <?php foreach($categories as $category):?>
              <li class="nav-item">
                <a class="nav-link" href="<?=ROOT?>/shop/<?=$category->category_url?>"> <i class="<?=$category->category_image?>"></i> <?=$category->category_title?>  </a> 
              </li>
            <?php endforeach;?>    
        </ul>

          <ul class="navbar-nav ms-auto">
            <?php if(isset($_SESSION['USER'])): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= Auth::initial_name()?></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="profile">profile</a></li>
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