@extends('User::Front.master')
@section('title')
    تایید حساب کاربری
@endsection
@section('content')
    <div class="account act">
        <form action="{{ route('password.checkVerifyCode') }}" class="form" method="post">
            @csrf
            <input type="hidden" name="email" value="{{request()->email}}">
            @include('User::Front.account-logo')
            <div class="card-header">
                <p class="activation-code-title">کد فرستاده شده به ایمیل <span>{{request()->email}}</span>
                    را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
                </p>
            </div>
            <div class="form-content form-content1">
                <input name="verify_code" required class="activation-code-input" placeholder="فعال سازی">
                @error('verify_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <button class="btn i-t">تایید</button>
                <a href="{{route('password.resend')}}" onclick="
                event.preventDefault();
                document.getElementById('resend-code').submit()
                ">ارسال مجدد کد فعالسازی</a>

            </div>
            <div class="form-footer">
                <a href="{{ route('register') }}">صفحه ثبت نام</a>
            </div>
        </form>

        <form id="resend-code" action="{{route('password.resend',['email'=>request()->email])}}" method="post">
            @csrf
        </form>
    </div>
@endsection

@section('js')
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/activation-code.js"></script>
@endsection
