<x-layou-admin>
    <x-side-bar />
    <div class="container" style="max-width: 1000px;">
        <div class="table-feedback-list">
            <p class="pb-5"></p>
            <h1 class="text-center pt-5 pb-3">Thêm loại phản hồi</h1>

            <form class="add-feedback" action="">
                <input class="test" placeholder="Thêm loại phản hồi" type="text">
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
                        <td style="width: 200px;">
                    <button class="btn btn-danger"><a href="">Xóa</a></button>
                    <button class="btn btn-danger"><a href="">Cập nhật</a></button>
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
</x-layou-admin>