<?php $this->view('includes/header')?>
    
    
    <div class="container">
        
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 border-end">
                <h5><b>Name: </b> <?=$message->name?> </h5>
                <h5><b>Email: </b> <?=$message->email?> </h5>
                <h5><b>Phone: </b> <?=$message->phone?> </h5>
                <h5><b>Date: </b> <?= Helpers::get_date($message->created_at)?> </h5>
            </div>

            <div class="col-md-8">
                <p><?=$message->message?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-5">    
                <a href="<?=ROOT?>/admin/messages" class="btn btn-outline-primary">Back</a>
            </div>
        </div>

    </div>




<?php $this->view('includes/footer')?>