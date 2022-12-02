<x-layou-admin>
    <?php 
           if(isset($mess)){
            echo '<script>alert("'.$mess.'")</script>';
        }
    ?>
    <x-side-bar/>
<div class="container" style="max-width: 1000px;">
    <div class="table-feedback-list">
        <p class="pb-5"></p>
    <div class="user-list-tile">
         <h1 class="text-center pt-5 pb-3">DANH SÁCH MÓN ĂN</h1>
         <div class="user-list-tile-item">
         <button class="btn btn-danger"><a href="/View-add-food">Thêm</a></button>
     </div>
    </div> 
            <table class="table table-bordered border-success table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Tên món</th>
                    <th>Giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        
         
            <?php 
                foreach ($foods as $item) {?>
                   <tr>
                    <td>  <img width="70" height="70" src="{{ asset('/images/'.$item->food_Image. '') }}" alt=""></td>
                    <td><?php echo htmlentities($item->food_name); ?></td>
                    <td><?php echo htmlentities($item->food_price); ?></td>
                    <td style="width: 200px;">
                    <button class="btn btn-danger"><a onclick="return ConfirmDelete()"  href="/DeleteFood?id=<?php echo htmlentities($item->id);?>&token=<?php echo md5(Cookie::get('user_id')."quananngon")?>">Xóa</a></button>
                    <button class="btn btn-danger"><a href="/Showfood?id=<?php echo htmlentities($item->id);?>">Cập nhật</a></button>
                    </td>
                    </tr>
                   <?php
                }
            ?>
                   
                    
                  
                  
                </th>
            </tbody>
        </table>
    </div>

</div>
<script>
        function ConfirmDelete()
        {
     var x = confirm("Bạn chắc muốn xóa?");
    if (x)
        return true;
      else
    return false;
        }
    </script>
</x-layou-admin>