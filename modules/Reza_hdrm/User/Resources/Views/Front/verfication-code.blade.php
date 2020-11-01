@extends('User::Front.master')
@section('title')
    تایید حساب کاربری
@endsection
@section('content')
    <form action="" class="form" method="post">
        @include('User::Front.account-logo')
        <div class="card-header">
            <p class="activation-code-title">کد فرستاده شده به ایمیل <span>{{request()->email}}</span> را وارد کنید</p>
        </div>
        <div class="form-content form-content1">
            <input class="activation-code-input" placeholder="فعال سازی">
            <br>
            <button class="btn i-t">تایید</button>

        </div>
        <div class="form-footer">
            <a href="{{route('register')}}">صفحه ثبت نام</a>
        </div>
    </form>
@endsection
