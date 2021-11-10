<style>
.nav-item a{
  min-width:100px;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
    </div>
  </div>
</nav>