<?php $this->view('includes/header')?>
    
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"><?=$header?></h1>
        </div>
    </div>

    <div class="row">
        <?php foreach($subs as $sub):?>
            <div class="col-md-3 sub-category-card">
                <a href="<?=ROOT?>/shop/<?=strtolower($sub->main_category)?>/<?=strtolower($sub->title)?>">
                <img src="<?=ASSETS?>/images/<?=$sub->image?>" width="100%" alt="category image">
                </a>
                <h3 class="text-center"><?=$sub->title?></h3>
            </div>
        <?php endforeach;?>
    </div>



   </div>




<?php $this->view('includes/footer')?>