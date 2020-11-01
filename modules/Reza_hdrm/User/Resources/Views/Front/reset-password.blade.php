@extends('User::Front.master')
@section('title')
    بازیابی رمز عبور
@endsection
@section('content')
    <form action="" class="form" method="post">
        @include('User::Front.account-logo')
        <div class="form-content form-account">
            <input type="text" class="txt-l txt" placeholder="ایمیل">
            <br>
            <button class="btn btn-recoverpass">بازیابی</button>
        </div>
        <div class="form-footer">
            <a href="{{route('login')}}">صفحه ورود</a>
        </div>
    </form>
@endsection
