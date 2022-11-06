<x-layout>
    
<div class="container">
        <div class="content">
            <div class="pb-5"></div>
            <div class="content-title h1 text-center pt-5">
                Thông tin tài khoản
            </div>
            
            <form class="form-password pt-5" action="">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-5">
                        <label for="1">Tên:</label><br>
                        <input type="text" id="1"> <br><br>

                        <label for="2">Email:</label><br>
                        <input type="text" id="2"> <br><br>

                        <label for="3">Di động:</label><br>
                        <input type="text" id="3"> <br><br>

                        <label for="cars">Trạng thái:</label> <br>
                        <select name="cars" id="cars">
                            <option value="volvo">Test1</option>
                            <option value="saab">Test2</option>
                            <option value="mercedes">Test3</option>
                        </select> <br> <br>

                        <label for="3">Địa chỉ cá nhân:</label><br>
                        <input type="text" id="3"> <br><br>
                    </div>
                    <div class="col-5">
                        <label for="cars">Chức vụ:</label> <br>
                        <select name="cars" id="cars">
                            <option value="volvo">Test1</option>
                            <option value="saab">Test2</option>
                            <option value="mercedes">Test3</option>
                        </select> <br> <br>

                        <label for="cars">Vị trí công việc:</label> <br>
                        <select name="cars" id="cars">
                            <option value="volvo">Test1</option>
                            <option value="saab">Test2</option>
                            <option value="mercedes">Test3</option>
                        </select> <br> <br>

                        <label for="start">Thời gian tạo tài khoản:</label><br>
                        <input type="date" id="start" name="begin" placeholder="dd-mm-yyyy" min="1997-01-01"
                            max="2030-12-31"><br><br>

                        <label for="start1">Thời gian Đăng nhâp lần cuối:</label><br>
                        <input type="date" id="start1" name="begin" placeholder="dd-mm-yyyy" min="1997-01-01"
                            max="2030-12-31"><br><br><br><br>

                            <div class="submit-btn pt-5">
                                <button class="btn btn-primary" type="submit">Đổi mật khẩu</button>
                                <button class="btn btn-primary" style="margin-left:10px;" type="submit">Cập nhật</button>
                            </div>


                    </div>

                </div>
               

            </form>
        </div>
    </div>

</x-layout>