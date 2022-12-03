<x-layout-home>
<main>

        <div class="card" style="margin-left:550px; width:670px">
            <div class="card-body mx-4">
                <div class="container">
                 <p class="my-5 mx-5" style="padding-left:190px; ;font-size: 30px;">Hóa đơn</p>
                 <div class="row">
                    <ul class="list-unstyled">
                    <li class="text-muted mt-1"><span class="text-black">Mã hóa đơn:</span> <?php echo htmlentities($bill[0]->id_bill); ?></li>
                    <li class="text-black"><?php echo htmlentities($bill[0]->name); ?></li>
                    <li class="text-black"><?php echo htmlentities($bill[0]->phone); ?></li>
                    <li class="text-black mt-1"><?php echo htmlentities($bill[0]->updated_at); ?></li>
                    </ul>
                  </div>
                    <?php 
                    foreach ($billDetail as $item){
                    ?>
                    <div class="row">
                        <div class="col-xl-10">
                        <p><?php echo htmlentities($item->food_name); ?></p>
                        </div>
                        <div class="col-xl-2">
                        <p class="float-end"><?php echo htmlentities($item->total); ?></p>
                        </div>
                </div>
                <?php }?>
                <div class="row text-black">

                    <div class="col-xl-12">
                    <p class="float-end fw-bold">Thanh toán: $<?php echo htmlentities($bill[0]->total); ?>
                    </p>
                    </div>
                    <div class="container order-md-1">
                 <div id="paypal-button-container"></div>
                </div>
        </div>
     
   


</main>
    <script src="https://www.paypal.com/sdk/js?client-id=AV0nPApQvTKA9KdhNHyyTBSdX8kiKL0cZsyoO8OGCbcSPPuVt61nWAQ1AdF6hFEUOp_mhLtuyWoyqnN_&currency=USD"></script>
<script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
               value: {{$bill[0]->total}}// Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
             const endpoint = 'https://www.gov.uk/bank-holidays.json';
                 fetch(endpoint)
                         .then((response)=>console.log(response));
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
                    window.location.href = 'http://localhost:8000/UpdateBill?id={{$bill[0]->id_bill}}'
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>
    
</x-layout-home>