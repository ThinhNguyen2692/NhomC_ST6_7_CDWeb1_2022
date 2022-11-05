<x-layout>
<div class="login">
    <div class="title h1 text-center pt-5">
        Đăng Nhập
    </div>
    <div class="form-login">
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
    <form class="form-password" method="post" action="/login">
    @csrf
       <div>
       <label>Nhập mã người dùng</label> <br/>
        <input type="text" class="" name="user_id">
       </div>
        <div>
        <label>Nhập mật khẩu</label><br/>
        <input type="password" class="" name="password">
        </div>
        <div>
        <button class="btn btn-success" type="submit">Đăng nhập</button>
        </div>
    </form>
    </div>
</div>
</x-layout>