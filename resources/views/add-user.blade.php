<x-layout>


    <div class="container">
        <div class="content">
            <div class="pb-5"></div>
            <div class="content-title h1 text-center pt-5">
                Thêm Người Dùng Mới
            </div>

            <form class="form-password pt-5" action="">
                <div class="row">
                    <div class="col-6">
                        <label for="1">Tên tài khoản:</label><br>
                        <input type="text" id="1"> <br><br>

                        <label for="2">Họ và tên:</label><br>
                        <input type="text" id="2"> <br><br>

                        <label for="3">Di động:</label><br>
                        <input type="text" id="3"> <br><br>

                        <label for="3">Địa chỉ cá nhân:</label><br>
                        <input type="text" id="3"> <br><br>
                    </div>
                    <div class="col-6">
                        <label for="3">Email:</label><br>
                        <input type="text" id="3"> <br><br>

                        <label for="cars">Chức vụ:</label> <br>
                        <select name="cars" id="cars">
                            <option value="volvo">Test1</option>
                            <option value="saab">Test2</option>
                            <option value="mercedes">Test3</option>
                        </select> <br> <br>

                        <label for="ca3rs">Vị trí công việc: </label> <br>
                        <select name="cars" id="ca3rs">
                            <option value="volvo">Test1</option>
                            <option value="saab">Test2</option>
                            <option value="mercedes">Test3</option>
                        </select> <br> <br>

                        <label for="file">Chọn hình đại diện:</label> <br>
                        <input type="file" name="file" id="file" class="inputfile" />
                        <br><br>
                        <button class="btn btn-primary submit-btn" type="submit">Thêm</button>
                    </div>
                </div>




            </form>
        </div>
    </div>


</x-layout>