<x-layou-admin>
    <x-side-bar/>
<div class="container" style="max-width: 1000px;">
    <div class="table-feedback-list">
        <p class="pb-5"></p>
    <div class="user-list-tile">
         <h1 class="text-center pt-5 pb-3">DANH SÁCH NHÂN VIÊN</h1>
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