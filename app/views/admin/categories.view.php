<?php $this->view('includes/header')?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Categories</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-outline-primary" href="<?=ROOT?>/admin/add_category"> Add </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                  <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Platform</th>
                            <th>Category</th>
                            <th>Created By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($subs)):?>
                            <?php foreach($subs as $sub):?>
                                <tr>
                                    <td><img src="<?=ASSETS?>/images/<?=$sub->image?>" alt="category image" width="50px"></td>
                                    <td><?=$sub->main_category?></td>
                                    <td><?=$sub->title?></td>
                                    <td><?=$sub->created_by?></td>
                                    <td><?=Helpers::get_date($sub->created_at)?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>




<?php $this->view('includes/footer')?>