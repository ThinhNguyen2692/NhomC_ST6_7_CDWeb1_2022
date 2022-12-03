<x-layou-admin>
<x-side-bar/>
    <div class="container">
        <div class="pb-5"></div>
        <div class="title font-weight-bold h1 text-center pt-5">
           
        </div>
        <div>
         <div class="card" style="margin-left:350px; width:670px">
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
                    foreach ($billDetail as $item) { 
                    
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
        
        </div>
   

    </div>
  </div>
</div>
        </div>
        </div>
    </div>
  
</x-layou-admin>