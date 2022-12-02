<x-layou-admin>
    <x-side-bar-user />
    <?php
        if(isset($mess)){
            echo '<script>alert("'.$mess.'")</script>';
        }
    
    ?>
    <div class="container">
        <div class="content">
            <div class="pb-5">
           
            </div>
            <div class="font-weight-bold h1 text-center pt-5">
                Đổi Mật Khẩu
            </div>
            <form class="form-password" action="/UpdatePass" method="post">
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
                <label for="">Mật khẩu</label>
                <input class="test" name="password" type="password" id="1"> <br><br>
                <label for="">Mật khẩu mới</label>
                <input class="test" type="password" name="passwordNew" id="2"> <br><br>
                <label for="">Xác nhận mật khẩu mới</label>
                <input class="test" type="password" name="passwordNew2" id="3"> <br><br>
                <button class="btn btn-primary" type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
</x-layou-admin>