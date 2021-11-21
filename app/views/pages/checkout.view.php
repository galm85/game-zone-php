
<?php $this->view('includes/header')?>
    
    <style>
        .my-form-group{
            width: 45%;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Checkout</h1>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-md-8 ">
                <form method="POST">
                    <div class="d-flex justify-content-between">
                        <div class="form-group my-form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" class="form-control">
                        </div>
                        <div class="form-group my-form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="form-group my-form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group my-form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message">Any Note:</label>
                        <textarea type="text" id="message" rows="5" name="message" class="form-control"></textarea>
                    </div>

                    <hr>
                    
                    <div class="form-group my-form-group ">
                        <label for="cc_type">Credit Card:</label>
                        <select name="cc_type" name="cc_type" id="cc_type" class="form-control"> 
                            <option value="">Select Credit Card</option>
                            <option value="master_card">Master Card</option>
                            <option value="american_express">American Express</option>
                            <option value="visa">Visa</option>
                            <option value="dainers">Dainers</option>
                        </select>
                    </div>

                    <div class="form-group my-form-group ">
                        <label for="cc_number">Credit Card Number:</label>
                        <input type="text" id="cc_number" name="cc_number" class="form-control">
                    </div>

                    <div class="form-group my-form-group">
                        <label for="cc_number_back">3 Digit:</label>
                        <input type="text" id="cc_number_back" name="cc_number_back" class="form-control">
                    </div>
                  
                        <h6>Valid</h6>
                    <div class="form-group d-flex my-form-group">
                        
                        <div >
                            <label for="cc_number">Year:</label>
                            <select name="valid_year" id="valid_year" class="form-control" >
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>

                        <div >
                            <label for="cc_number">Month:</label>
                            <select name="valid_month" id="valid_month" class="form-control">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>


                    <button class="btn btn-primary" name="add_order">Pay</button>
                   
                </form>
            </div>

            <div class="col-md-3">
                <?php foreach($items as $item):?>
                    <div class="d-flex justify-content-between">
                        <img src="<?=ASSETS?>/images/<?=$item->image?>" width="50px" alt="product image">
                        <div style="padding-top:5%;" ><?=$item->price?> X <?=$item->qty?> = <?=$item->price * $item->qty?> </div>
                    </div>
                    <hr>
                <?php endforeach;?>
                <hr>
                <div>
                    <h6>Total: $<?=$sum?></h6>
                </div>
            </div>
        </div>
    </div>
   


<?php $this->view('includes/footer')?>