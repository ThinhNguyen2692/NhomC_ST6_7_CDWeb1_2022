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
         <p> 
            <form style="padding-right: 20px; padding-top: 12px;" class="d-flex" method="get" action="/view-bill" role="search"> 
        <input class="form-control me-2" style=" width: 207px; height: 37px;" type="search" name="key" placeholder="Số điện thoại" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
        </form>
    </p>
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
    <?php 
                if(!isset($key)){
                    $key = "";
                 }
        ?>
        @if(count($bills) != 0)
                <div style="margin-top:20px;">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="view-bill?key=<?php echo $key?>&page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Đầu</span>
                                </a>
                                </li>
                                @for($page = 1; $page <= $bills->lastPage(); $page++)
                                <li class="page-item <?php if($bills->currentPage() == $page) echo "active";?>"><a class="page-link" href="view-bill?key=<?php echo $key?>&page=<?php echo $page?>">{{$page}}</a></li>
                                @endfor
                                <li class="page-item">
                                <a class="page-link" href="view-bill?key=<?php echo $key?>&page=<?php echo $bills->lastPage()?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Cuối</span>
                                </a>
                                </li>
                            </ul>
                            </nav>
                    </div>
                    @endif
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