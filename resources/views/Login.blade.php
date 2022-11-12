<x-layout>

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
                            Đăng nhập
                        </h4>
                    </div>

                    <div class="login-form">
                        <label class="login-label" for="">Mã nhân viên</label>
                        <input type="text" class="login-form-input" name="user_id">
                        <label class="login-label" for="">Mật khẩu</label>
                        <input type="password" class="login-form-input" name="password">
                        <button class="login-form-button">Đăng nhập</button>

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