<x-layout>
<div class="container">
        <div class="content">
            <div class="content-title h1 text-center pt-5 pb-5">
                Danh Sách Món Ăn
            </div>
            <div class="food">
                <img class="food-img" width="100px" height="100px"
                    src="https://yummyday.vn/uploads/images/cach-lam-ca-loc-nuong-mo-hanh.jpg" alt="">
                <div class="food-information">
                    <p class="food-name h4">Tên món: <span>Cá lóc nướng</span></p>
                    <p class="food-price">Giá tiền: <span>123456</span></p>
                </div>
            </div>
            <div class="food">
                <img class="food-img" width="100px" height="100px"
                    src="https://yummyday.vn/uploads/images/cach-lam-ca-loc-nuong-mo-hanh.jpg" alt="">
                <div class="food-information">
                    <p class="food-name h4">Tên món: <span>Cá lóc nướng</span></p>
                    <p class="food-price">Giá tiền: <span>123456</span></p>
                </div>
            </div>
            <div class="food">
                <img class="food-img" width="100px" height="100px"
                    src="https://yummyday.vn/uploads/images/cach-lam-ca-loc-nuong-mo-hanh.jpg" alt="">
                <div class="food-information">
                    <p class="food-name h4">Tên món: <span>Cá lóc nướng</span></p>
                    <p class="food-price">Giá tiền: <span>123456</span></p>
                </div>
            </div>
            <div class="feedback">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

            </div>
        </div>
    </div>
        
    
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
      <form class="form-phanHoi" action="">
                <h3 class="form-title">Phản hồi</h3>

                <label for="1">Email:</label><br>
                <input type="text" id="1"> <br><br>

                <label for="2">Tên khách hàng:</label><br>
                <input type="text" id="2"> <br><br>

                <label for="23">Loại phản hồi:</label><br>
                <input list="cars" placeholder="test1">
                <datalist id="cars">
                    <option value="test1"></option>
                    <option value="test2"></option>
                    <option value="test3"></option>
                </datalist> <br> <br>

                <label for="3">Nội dung:</label><br>
                <input type="text" style="height: 80px;" id="3"> <br><br>

                <label for="4">Mã xác nhận:</label><br>
                <span>123454</span>
                <input type="text" style="width: 198px; margin-left: 145px;" id="4" placeholder="Nhập mã xác nhận"> <br><br>

                <button class="btn btn-success" type="submit">Save changes
                </button>
                <button class="btn btn-success" type="submit">Close
                </button>
            </form>
    </div>
  </div>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>