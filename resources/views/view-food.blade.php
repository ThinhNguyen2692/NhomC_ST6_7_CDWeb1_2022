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
            <form style="padding-right: 20px; padding-top: 12px;" class="d-flex" method="get" action="/view-food" role="search"> 
        <input class="form-control me-2" style=" width: 207px; height: 37px;" type="search" name="key" placeholder="Món ăn" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
        </form>
    </p>
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
    <?php 
                if(!isset($key)){
                    $key = "";
                 }
        ?>
        @if(count($foods) != 0)
                <div style="margin-top:20px;">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="view-food?key=<?php echo $key?>&page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Đầu</span>
                                </a>
                                </li>
                                @for($page = 1; $page <= $foods->lastPage(); $page++)
                                <li class="page-item <?php if($foods->currentPage() == $page) echo "active";?>"><a class="page-link" href="view-food?key=<?php echo $key?>&page=<?php echo $page?>">{{$page}}</a></li>
                                @endfor
                                <li class="page-item">
                                <a class="page-link" href="/view-food?key=<?php echo $key?>&page=<?php echo $foods->lastPage()?>" aria-label="Next">
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