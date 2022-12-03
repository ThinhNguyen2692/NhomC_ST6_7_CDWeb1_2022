<x-layou-admin>
    <?php
        if(isset($check)){
            echo '<script>alert("'.$check.'")</script>';
        }
    
    ?>
    <x-side-bar />
    <div class="container" style="max-width: 1000px;">
        <div class="table-feedback-list">
            <p class="pb-5"></p>
            <h1 class="text-center pt-5 pb-3">Thêm loại phản hồi</h1>
            <p> 
            <form style="padding-right: 20px; padding-top: 12px;" class="d-flex" method="get" action="/add-feedback-type" role="search"> 
        <input class="form-control me-2" style=" width: 207px; height: 37px;" type="search" name="key" placeholder="Loại phản hồi" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
        </form>
    </p>
            <form class="add-feedback" action="/feedbacktypeadd" method="post">
            @csrf
                <input class="test" placeholder="Thêm loại phản hồi" type="text" name="feedback_name">
                <button class="btn btn-primary submit-btn mt-2 mb-3" type="submit">Thêm</button>
            </form>
            <table class="table table-bordered border-success table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Loại phản hồi</th>
                        <th>Chức năng</th>
                    </tr>

                </thead>
                <tbody>
                <?php foreach($TypeFeedbacks as $item){?>
                        <tr>
                        <td><?php echo htmlentities($item->feedback_type_id)?></td>
                        <td><?php echo htmlentities($item->feedback_type_name)?></td>
                        <?php
                            $token = md5($item->feedback_type_id.Cookie::get('user_id').Cookie::get('full_name')."deletefeedback");
                        ?>
                        <td style="width: 200px;">

                        <a class="btn btn-danger" onclick="return ConfirmDelete()"  href="/deletefeedbacktype?id=<?php echo $item->feedback_type_id;?>&&token={{$token}}">Xóa</a>
                  
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
        @if(count($TypeFeedbacks) != 0)
                <div style="margin-top:20px;">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="add-feedback-type?key=<?php echo $key?>&page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Đầu</span>
                                </a>
                                </li>
                                @for($page = 1; $page <= $TypeFeedbacks->lastPage(); $page++)
                                <li class="page-item <?php if($TypeFeedbacks->currentPage() == $page) echo "active";?>"><a class="page-link" href="add-feedback-type?key=<?php echo $key?>&page=<?php echo $page?>">{{$page}}</a></li>
                                @endfor
                                <li class="page-item">
                                <a class="page-link" href="add-feedback-type?key=<?php echo $key?>&page=<?php echo $TypeFeedbacks->lastPage()?>" aria-label="Next">
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