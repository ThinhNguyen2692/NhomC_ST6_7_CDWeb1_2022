<x-layou-admin>
    <x-side-bar/>
<div class="container" style="max-width: 1000px;">
    <div class="table-feedback-list">
        <p class="pb-5"></p>
    <div class="user-list-tile">
         <h1 class="text-center pt-5 pb-3">DANH SÁCH NHÂN VIÊN</h1>
         <p> 
            <form style="padding-right: 20px; padding-top: 12px;" class="d-flex" method="get" action="/employee-list" role="search"> 
        <input class="form-control me-2" style=" width: 207px; height: 37px;" type="search" name="key" placeholder="Mã nhân viên" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
        </form>
    </p>
         <div class="user-list-tile-item">
         <button class="btn btn-danger"><a href="/add-user">Thêm</a></button>
     </div>
    </div> 
            <table class="table table-bordered border-success table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Vị trí công việc</th>
                    <th>Di động</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                 $count = 0;
                 foreach ($users as $item) {
                    $count ++;
                    $postionName = "Nhân viên";
                    switch ($item->postion_id) {
                        case 1:
                            $postionName = "Quản trị hệ thống";
                          break;
                        case 2:
                            $postionName = "Quản lý";
                          break;
                        case 3:
                            $postionName = "Nhân viên phản hồi";
                          break;
                        }
                    ?>
                    <tr>
                    <td><?php echo htmlentities($count); ?></td>
                    <td><?php echo htmlentities($item->full_name); ?></td>
                    <td><?php echo htmlentities($postionName); ?></td>
                    <td><?php echo htmlentities($item->phone); ?></td>
                    <td style="width: 200px;">
                    <button class="btn btn-danger"><a onclick="return ConfirmDelete()"  href="/delete?id=<?php echo htmlentities($item->user_id);?>&token=<?php echo md5(Cookie::get('user_id')."quananngon")?>">Xóa</a></button>
                    <button class="btn btn-danger"><a href="/ShowUser?id=<?php echo htmlentities($item->user_id);?>">Cập nhật</a></button>
                    </td>
                  </tr>
                    <?php }?>
                </th>
            </tbody>
        </table>
    </div>
    <?php 
                if(!isset($key)){
                    $key = "";
                 }
        ?>
        @if(count($users) != 0)
                <div style="margin-top:20px;">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="employee-list?key=<?php echo $key?>&page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Đầu</span>
                                </a>
                                </li>
                                @for($page = 1; $page <= $users->lastPage(); $page++)
                                <li class="page-item <?php if($users->currentPage() == $page) echo "active";?>"><a class="page-link" href="employee-list?key=<?php echo $key?>&page=<?php echo $page?>">{{$page}}</a></li>
                                @endfor
                                <li class="page-item">
                                <a class="page-link" href="employee-list?key=<?php echo $key?>&page=<?php echo $users->lastPage()?>" aria-label="Next">
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