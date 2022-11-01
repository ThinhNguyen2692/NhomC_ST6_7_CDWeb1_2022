<x-layout>
    <div class="container">
        <div class="content">
            <div class="title h1 text-center pt-5 pb-5">
                Danh Sách Món Ăn
            </div>
            <div class="food">
                <img class="food-img" width="100px" height="100px" src="https://yummyday.vn/uploads/images/cach-lam-ca-loc-nuong-mo-hanh.jpg" alt="">
                <div class="food-information">
                    <p class="food-name h4">Tên món: <span>Cá lóc nướng</span></p>
                    <p class="food-price">Giá tiền: <span>123456</span></p>
                </div>
            </div>
            <div class="food">
                <img class="food-img" width="100px" height="100px" src="https://yummyday.vn/uploads/images/cach-lam-ca-loc-nuong-mo-hanh.jpg" alt="">
                <div class="food-information">
                    <p class="food-name h4">Tên món: <span>Cá lóc nướng</span></p>
                    <p class="food-price">Giá tiền: <span>123456</span></p>
                </div>
            </div>
            <div class="food">
                <img class="food-img" width="100px" height="100px" src="https://yummyday.vn/uploads/images/cach-lam-ca-loc-nuong-mo-hanh.jpg" alt="">
                <div class="food-information">
                    <p class="food-name h4">Tên món: <span>Cá lóc nướng</span></p>
                    <p class="food-price">Giá tiền: <span>123456</span></p>
                </div>
            </div>
            <div class="feedback">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Phản hồi</button>

            </div>
        </div>
    </div>
    <x-login>
    </x-login>
</x-layout>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3 class="title">Phản hồi</h3>

                <label>Email:</label><br>
                <input class="modal-input" type="text"> <br><br>

                <label>Tên khách hàng:</label><br>
                <input class="modal-input" type="text"> <br><br>

                <label>Loại phản hồi:</label><br>
                <input class="modal-input" list="cars" placeholder="test1">
                <datalist>
                    <option value="test1"></option>
                    <option value="test2"></option>
                    <option value="test3"></option>
                </datalist> <br> <br>

                <label>Nội dung:</label><br>
                <input class="modal-input" type="text" style="height: 80px;"> <br><br>

                <label>Mã xác nhận:</label><br>
                <span style="margin-left: 15px; background-color: #ccc;">123454</span>
                <input type="text" style="width: 104px; margin-left: 165px; font-size: 11px; height: 28px;" placeholder="Nhập mã xác nhận"> <br><br>
                <button type="button" class="btn btn-secondary modal-btnClose" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary modal-btnSeen">Gửi</button>
            </div>
        </div>