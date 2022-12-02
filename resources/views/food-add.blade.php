<x-layou-admin>
    <?php 
        if($food->id == 0){
            $url = "/addfood";
            $tile = "Thêm";
        }else{  $url = "/updatefood"; $tile = "Cập nhật";}
     
        if(isset($mess)){
            echo '<script>alert("'.$mess.'")</script>';
        }
    
   
    ?>
    <div class="container">
        <div class="content">
            <div class="pb-5"></div>
            <div class="font-weight-bold h1 text-center pt-5">
               Món ăn
            </div>
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br />
                @endif
            <form enctype="multipart/form-data" class="form-password pt-5" method="post" action="<?php echo $url?>">
            @csrf
            <input type="hidden" name="food_id" id="file" value="<?php echo htmlentities($food->id)?>" />
                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Tên món ăn:</label>
                 <input type="text" class="form-control" id="recipient-name" name="food_name" value="<?php echo htmlentities($food->food_name)?>">
                </div>
                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Giá món ăn:</label>
                 <input type="number" class="form-control" min="1" id="recipient-name" name="food_price" value="<?php echo htmlentities($food->food_price)?>">
                </div>
                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Mô tả món ăn:</label>
                <textarea class="form-control description" id="recipient-name" name="food_description"><?php echo htmlentities($food->food_description)?></textarea>
                </div>
                <div class="form-group">
                        <label for="file">Chọn hình đại diện:</label> <br>
                        <input type="file" accept="image/*" name="food_Image" id="file" class="inputfile" />
                        @if ($food->id != 0)
                        <input type="hidden" name="food_Image_2" id="file" value="<?php echo htmlentities($food->food_Image)?>" />
                         <img width="40" height="40" src="{{ asset('/images/'.$food->food_Image. '') }}" alt="">
                        @endif
               </div>
                        <button class="btn btn-primary submit-btn" type="submit"><?php echo $tile?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-layou-admin>