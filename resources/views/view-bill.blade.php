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
     </div>
    </div> 
            <table class="table table-bordered border-success table-striped">
            <thead>
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        
         
            <?php 
                foreach ($bills as $item) { 
                    
                    switch ($item->status) {
                        case 0:
                            $status = "Chưa thanh toán";
                          break;
                        case 1:
                            $status = "Đã thanh toán";
                          break;
                        }
                    ?>
                
                   <tr>
                   <td><?php echo htmlentities($item->name); ?></td>
                    <td><?php echo htmlentities($item->phone); ?></td>
                    <td><?php echo htmlentities($item->total); ?></td>
                    <td><?php echo htmlentities($status); ?></td>
                    <td style="width: 200px;">
                    <button class="btn btn-danger"><a onclick="return ConfirmDelete()"  href="/DeleteBill?id=<?php echo htmlentities($item->id_bill);?>&token=<?php echo md5(Cookie::get('user_id')."quananngon")?>">Xóa</a></button>
                    <button  class="btn btn-danger"><a href="/view-bill-detail?id=<?php echo htmlentities($item->id_bill);?>">Xem</a></button>
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