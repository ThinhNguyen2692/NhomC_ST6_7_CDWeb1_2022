<x-layou-admin>
<?php
        if(isset($check)){
            echo '<script>alert("'.$check.'")</script>';
        }
    
    ?>
<x-side-bar/>
<div class="container" style="max-width: 1000px;">
    <div class="table-feedback-list">
        <p class="pb-5"></p>
        <h1 class="text-center font-weight-bold pt-5 pb-3">DANH SÁCH PHẢN HỒI</h1>
        <p> 
            <form style="padding-right: 20px; padding-top: 12px;" class="d-flex" method="get" action="/feedback-list" role="search"> 
        <input class="form-control me-2" style=" width: 207px; height: 37px;" type="search" name="key" placeholder="Email" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
        </form>
    </p>
        <table class="table table-bordered border-success table-striped">
            <thead>
                <tr>
                    <th>Tên Khách hàng</th>
                    <th>Email</th>
                    <th>Loại phản hồi</th>
                    <th>Trạng thái</th>
                </tr>

            </thead>
            <tbody>
                <?php 
                    foreach ($feedbackList as $item) { ?>
                   
                <tr>
                    <td><?php echo htmlentities($item->customer_name)?></td>
                    <td><?php echo htmlentities($item->customer_email)?></td>
                    <td><?php echo htmlentities($item->feedback_type_name)?></td>
                    <td><a style="color:blue;" href="/Showfeedback?id={{$item->id}}"><?php if($item->status == 0) echo "Chưa phản hồi"; else echo "Đã phản hồi" ;?></a></td>
                </tr>
                    <?php   
                    }    
                
                ?>
            
                
            </tbody>
        </table>
    </div>
    <?php 
                if(!isset($key)){
                    $key = "";
                 }
        ?>
                    @if(count($feedbackList) != 0)
                <div style="margin-top:20px;">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="feedback-list?key=<?php echo $key?>&page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Đầu</span>
                                </a>
                                </li>
                                @for($page = 1; $page <= $feedbackList->lastPage(); $page++)
                                <li class="page-item <?php if($feedbackList->currentPage() == $page) echo "active";?>"><a class="page-link" href="feedback-list?key=<?php echo $key?>&page=<?php echo $page?>">{{$page}}</a></li>
                                @endfor
                                <li class="page-item">
                                <a class="page-link" href="feedback-list?key=<?php echo $key?>&page=<?php echo $feedbackList->lastPage()?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Cuối</span>
                                </a>
                                </li>
                            </ul>
                            </nav>
                    </div>
                    @endif
</div>
</x-layou-admin>