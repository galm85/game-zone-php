<?php $this->view('includes/header')?>
    
   <div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h1 class="gradient-text header-1" ><?=$header?></h1>
        </div>
    </div>

    <div class="row justify-content-between">
        <?php foreach($subs as $sub):?>
            <div class="col-md-3 sub-category-card">
                <a href="<?=ROOT?>/shop/<?=strtolower(str_replace(' ','-',$sub->main_category))?>/<?=strtolower($sub->title)?>">
                <img src="<?=ASSETS?>/images/<?=$sub->image?>" width="100%" alt="category image">
                <h3 ><?=$sub->title?></h3>
                </a>
            </div>
        <?php endforeach;?>
    </div>



   </div>




<?php $this->view('includes/footer')?>