<x-layout>
<?php 
if(isset($mess)){
    echo '<script>alert('.$mess.')</script>';
}



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

    <x-from-feedback/>
</x-layout>
