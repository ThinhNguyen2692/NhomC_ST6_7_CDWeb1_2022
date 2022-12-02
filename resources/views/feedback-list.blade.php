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
                    foreach ($feedbackList as $item) { if($status == $item->status){?>
                   
                <tr>
                    <td><?php echo htmlentities($item->customer_name)?></td>
                    <td><?php echo htmlentities($item->customer_email)?></td>
                    <td><?php echo htmlentities($item->feedback_type_name)?></td>
                    <td><a style="color:blue;" href="/Showfeedback?id={{$item->id}}"><?php if($item->status == 0) echo "Chưa phản hồi"; else echo "Đã phản hồi" ;?></a></td>
                </tr>
                    <?php   
                    }    
                }
                ?>
            
                
            </tbody>
        </table>
    </div>

</div>
</x-layou-admin>