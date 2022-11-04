<x-layout>
<?php 
?>
    <div class="container">
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
<<<<<<< HEAD
    <x-login>
    </x-login>
</x-layout>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
=======

    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                <h3 class="form-title">Phản hồi</h3>
>>>>>>> f828d355a7fe48457377b545bedc23fd64008397
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>
                <div class="modal-body">
                <form action="/guiphanhoiquanan" method="post">
                @csrf
                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Email:</label>
                 <input type="email" class="form-control" id="recipient-name" name="customer_email">
                </div>

<<<<<<< HEAD
                <h3 class="title">Phản hồi</h3>
=======
                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Tên khách hàng:</label>
                 <input type="text" class="form-control" id="recipient-name" name="customer_name">
                </div>
>>>>>>> f828d355a7fe48457377b545bedc23fd64008397

                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Loại phản hồi</label>
                  <select class="form-control" id="recipient-name" name="feedback_type_id">   
                  <?php 
                    foreach($TypeFeedbacks as $item){?>
                        <option value="{{$item->feedback_type_id}}">{{$item->feedback_type_name}}</option>
                        <?php
                    }
                  ?>
                 </select>
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Phản hồi:</label>
                    <textarea class="form-control" id="recipient-name" name="feedback_content"></textarea>
                </div>
               
                 <div class="form-group">
                    <div class="captcha">
                     <label for="recipient-name" class="col-form-label">Mã phản hồi:</label>
                     <span>{!! captcha_img('math') !!}</span>
                     <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                     </button>
                    </div>
                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                </div>
                <button type="button" class="btn btn-secondary modal-btnClose" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
                </div>
             </div>
        </div>
    </div>
</x-layout>
