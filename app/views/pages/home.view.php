
<?php $this->view('includes/header')?>
    
    <h1>Home Page</h1>

    <?php  if(isset($cart)){
        print_r($cart);
    }
        ?>


<?php $this->view('includes/footer')?>