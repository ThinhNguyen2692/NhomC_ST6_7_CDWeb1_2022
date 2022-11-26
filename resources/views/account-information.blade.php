<x-layou-admin>
<x-side-bar-user/>
<div class="container">
        <div class="content">
            <div class="pb-5"></div>
            <div class="font-weight-bold h1 text-center pt-5">
                Thông tin tài khoản
            </div>
            
            <form class="form-password pt-5" action="" method="post">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-5">
                        <label for="1">Tên tài khoản:</label><br>
                        <input name="user_name" type="text" value="<?php echo htmlentities($UserInformation->user_name) ?>" id="1"> <br><br>

                        <label for="2">Email:</label><br>
                        <input name="email" value="<?php echo htmlentities($UserInformation->email) ?> type="text" id="2"> <br><br>

                        <label for="3">Di động:</label><br>
                        <input name="phone" value="<?php echo htmlentities($UserInformation->phone) ?> type="text" id="3"> <br><br>
                        <label for="" name="satus">Trạng thái:</label> <br>
                        <select name="status" id="cars">
                            <option value="<?php echo htmlentities()?>" >Test1</option>
                            <option value="1">Đang làm</option>
                            <option value="mercedes">Tạm đóng user</option>
                        </select> <br> <br>

                        <label for="3">Địa chỉ cá nhân:</label><br>
                        <input value="<?php echo htmlentities() ?> name="address" type="text" id="3"> <br><br>
                    </div>
                    <div class="col-5">
                    <label for="1">Họ tên:</label><br>
                        <input value="<?php echo htmlentities() ?> name="full_name" type="text" id="1"> <br><br>
                        <label for="cars">Chức vụ:</label> <br>
                        <select name="postion_id" id="cars">
                            <option <?php if($UserInformation->postion_id == 1) echo "selected="."selected"?> value="1">Quản trị hệ thống</option>
                            <option <?php if($UserInformation->postion_id == 2) echo "selected="."selected"?> value="2">Quản lý</option>
                            <option <?php if($UserInformation->postion_id == 3) echo "selected="."selected"?> value="3">Nhân viên phản hồi</option>
                        </select> <br> <br>

                        <label for="cars">Vị trí công việc:</label> <br>
                        <select name="feedback_id" id="cars">
                        <option selected="selected" value="<?php echo htmlentities() ?>">Test1</option>
                            <option value="saab">Test2</option>
                            <option value="mercedes">Test3</option>
                        </select> <br> <br>

                        <label for="start">Thời gian tạo tài khoản:</label><br>
                        <input type="date" id="start" disabled name="begin" value="<?php echo htmlentities() ?>"> min="1997-01-01"
                            max="2030-12-31"><br><br>

                        <label for="start1">Thời gian Đăng nhâp lần cuối:</label><br>
                        <input type="date" disabled id="start1" name="begin" value="<?php echo htmlentities() ?>"> min="1997-01-01"
                            max="2030-12-31"><br><br><br><br>

                            <div class="submit-btn pt-5">
                              <a href=""><button class="btn btn-primary" type="submit">Đổi mật khẩu</button></a> 
                                <button class="btn btn-primary" style="margin-left:10px;" type="submit">Cập nhật</button>
                            </div>
                    </div>

                </div>
               

            </form>
        </div>
    </div>

    </x-layou-admin>