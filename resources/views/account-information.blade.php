<x-layou-admin>
<x-side-bar-user/>
<div class="container">
        <div class="content">
            <div class="pb-5"></div>
            <div class="font-weight-bold h1 text-center pt-5">
                Thông tin tài khoản
            </div>
            <form class="form-password pt-5" action="/UpdateUser" method="post">
                @csrf
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
            <input name="user_id" type="hidden" value="<?php echo htmlentities($UserInformation["user_id"]) ?>" id="1"> 
            <input name="avatar" type="hidden" value="<?php echo htmlentities($UserInformation["avatar"]) ?>" id="1"> 
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-5">
                        <label for="1">Tên tài khoản:</label><br>
                        <input name="user_name" type="text" value="<?php echo htmlentities($UserInformation["user_name"]) ?>" id="1" readonly> <br><br>

                        <label for="2">Email:</label><br>
                        <input name="email" value="<?php echo htmlentities($UserInformation["email"]) ?>" type="text" id="2"> <br><br>

                        <label for="3">Di động:</label><br>
                        <input name="phone" value="<?php echo htmlentities($UserInformation["phone"]) ?>" type="text" id="3"> <br><br>
                        <label for="" name="satus">Trạng thái:</label> <br>
                        <select name="status" id="cars">
                            <option <?php if($UserInformation["status"] == 1) echo "selected="."selected"?> value="1">Đang làm</option>
                            <option  <?php if($UserInformation["status"] == 0) echo "selected="."selected"?> value="0">Tạm đóng user</option>
                        </select> <br> <br>

                        <label for="3">Địa chỉ cá nhân:</label><br>
                        <input value="<?php echo htmlentities($UserInformation["address"]) ?>" name="address" type="text" id="3"> <br><br>
                    </div>
                    <div class="col-5">
                    <label for="1">Họ tên:</label><br>
                        <input value="<?php echo htmlentities($UserInformation["full_name"])?>" name="full_name" type="text" id="1"> <br><br>
                        <label for="cars">Chức vụ:</label> <br>
                        <select name="postion_id" id="cars">
                            <option <?php if($UserInformation["postion_id"] == 1) echo "selected="."selected"?> value="1">Quản trị hệ thống</option>
                            <option <?php if($UserInformation["postion_id"] == 2) echo "selected="."selected"?> value="2">Quản lý</option>
                            <option <?php if($UserInformation["postion_id"] == 3) echo "selected="."selected"?> value="3">Nhân viên phản hồi</option>
                        </select> <br> <br>

                        <label for="ca3rs">Vị trí công việc: </label> <br>
                        <select name="feedback_type_id">
                              <?php 
                     foreach($TypeFeedbacks as $item){?>
                        <option <?php if($UserInformation["feedback_type_id"] == $item->feedback_type_id) echo "selected="."selected"?> value="<?php echo htmlentities($item->feedback_type_id)?>"><?php echo htmlentities($item->feedback_type_name)?></option>
                        <?php
                          }
                               ?>
                        </select> <br> <br>

                        <label for="start">Thời gian tạo tài khoản:</label><br>
                       
                        <input type="date" readonly value="<?php echo htmlentities($UserInformation["create_time_at_account"]) ?>" name="create_time_at_account"> <br><br>
                        <label for="start1">Thời gian Đăng nhâp lần cuối:</label><br>
                        <input type="date" name="last_logged_in" readonly id="start1" name="begin" value="<?php echo htmlentities($UserInformation["last_logged_in"]) ?>"><br><br><br><br>

                            <div class="submit-btn"> 
                            <a href="/AdminUpdatePass?id=<?php echo $UserInformation["user_id"]?>&token=<?php echo md5(Cookie::get('user_id')."quananngon")?>" ><span class="btn btn-primary">Đổi mật khẩu</span></a> 
                            <button class="btn btn-primary" style="margin-left:10px;" type="submit">Cập nhật</button>  
                            </div>
                    </div>

                </div>
               

            </form>
        </div>
    </div>

    </x-layou-admin>