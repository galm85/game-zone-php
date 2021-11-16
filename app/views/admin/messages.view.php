<?php $this->view('includes/header')?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Messages</h1>
            </div>
        </div>

        <?php if(count($messages) > 0):?>
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Read</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($messages as $message):?>
                        <tr class=<?= $message->seen == 1 ? '' : 'message-not-read' ?> >
                            <td> <?=$message->name?> </td>
                            <td> <?=$message->email?> </td>
                            <td> <?=$message->phone?> </td>
                            <td> <?= Helpers::get_date($message->created_at) ?> </td>
                            <td><a href="<?=ROOT?>/admin/read_message/<?=$message->id?>">Read</a></td>
                            <td><a href="<?=ROOT?>/admin/delete_message/<?=$message->id?>">DELETE</a></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>    
            </table>
        <?php else:?>
            <h3 class="text-center mt-5">No Messages</h3>
        <?php endif;?>

    </div>



<?php $this->view('includes/footer')?>