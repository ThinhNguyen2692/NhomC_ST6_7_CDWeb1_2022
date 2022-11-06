<x-layout>
    <!-- 
    <div class="login">
        <div class="pb-5"></div>
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
                    <label>Nhập mã người dùng</label> <br />
                    <input type="text" style="width: 300px;" name="user_id">
                </div>
                <div>
                    <label>Nhập mật khẩu</label><br />
                    <input type="password" style="width: 300px;" name="password">
                </div>
                <div>
                    <button class="btn btn-success mt-3" type="submit">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div> -->

    <div class="login-container">


        <div class="login-body">
            <!-- Form Login -->
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
            <form method="post" action="/login">
            @csrf
            <div class="login-form-container">
                <div class="login-form-header">
                    <h4>
                        Login
                    </h4>
                </div>

                <div class="login-form">
                    <input type="text" class="login-form-input" name="user_id" placeholder="Email or phone number">
                    <input type="password" class="login-form-input" placeholder="Password" name="password">
                    <button class="login-form-button">Sign In</button>

                </div>
            </div>
            </form>
        </div>

        <div class="login-overlay">
        </div>

        <!-- <div class="login-footer">
        </div> -->
    </div>
</x-layout>