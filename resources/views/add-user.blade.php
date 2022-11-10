<x-layout>
<?php 
if(isset($userid)){
    echo '<script>alert('."Mã user mới là:".''.$userid.'")</script>';
}



?>

    <div class="container">
        <div class="content">
            <div class="pb-5"></div>
            <div class="font-weight-bold h1 text-center pt-5">
                Thêm Người Dùng Mới
            </div>
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br />
                @endif
            <form enctype="multipart/form-data" class="form-password pt-5" method="post" action="/addnewuser">
            @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="1">Tên tài khoản:</label><br>
                        <input type="text" name="user_name"> <br><br>

                        <label for="2">Họ và tên:</label><br>
                        <input type="text" name="full_name"> <br><br>

                        <label for="3">Di động:</label><br>
                        <input type="text" name="phone"> <br><br>

                        <label for="3">Địa chỉ cá nhân:</label><br>
                        <input type="text" name="address"> <br><br>
                    </div>
                    <div class="col-6">
                        <label for="3">Email:</label><br>
                        <input type="email" name="email"> <br><br>

                        <label for="cars">Chức vụ:</label> <br>
                        <select name="postion_id">
                            <option value="1">Quản trị hệ thống</option>
                            <option value="2">Quản lý</option>
                            <option value="3">Nhân viên phản hồi</option>
                        </select> <br> <br>

                      <x-form-type/>
                         <br> <br>

                        <label for="file">Chọn hình đại diện:</label> <br>
                        <input type="file" accept="image/*" name="avarta" id="file" class="inputfile" />
                        <br><br>
                        <button class="btn btn-primary submit-btn" type="submit">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-layout>