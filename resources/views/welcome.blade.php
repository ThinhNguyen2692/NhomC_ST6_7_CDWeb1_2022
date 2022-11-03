<x-layout>
    <div class="container">
        <div class="content">
            <div class="content-title h1 text-center pt-5 pb-5">
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Phản hồi</button>

            </div>
        </div>
    </div>


</x-layout>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="form-title">Phản hồi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/send" method="get">
                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="recipient-name" name="customer_email">
                </div>

                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tên khách hàng:</label>
                <input type="text" class="form-control" id="recipient-name" name="customer_name">
                </div>

                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Loại phản hồi</label>
                <select class="form-control" id="recipient-name" name="feedback_type_id">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
                </div>

                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Phản hồi:</label>
                <textarea class="form-control" id="recipient-name" name="feedback_content"></textarea>
                </div>
               

                <label>Mã xác nhận:</label><br>
                <span style="margin-left: 15px; background-color: #ccc;">123454</span>
                <input type="text" style="width: 104px; margin-left: 165px; font-size: 11px; height: 28px;" placeholder="Nhập mã xác nhận"> <br><br>
                <button type="button" class="btn btn-secondary modal-btnClose" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>

        