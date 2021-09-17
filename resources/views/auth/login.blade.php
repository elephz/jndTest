
@extends('template.authentication')
@section('title','Wonder Story | เข้าสู่ระบบ')
@section('head')
<style>
    

    .btn-recute {
        background-color: #ba5050;
        color: white;
    }
</style>
@endsection

@section('content')
<form class="form-login" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <!-- <img alt="logo" src="{{ asset('logo.png') }}" class="theme-logo img-fluid"> -->
            <h1 class="fThai text-dark">Wonder Story</h1>
            <h3 class="mt-4 fThai">เข้าสู่ระบบ</h3>
        </div>

        <div class="col-md-12">
            <label for="inputEmail" class="">Email</label>
            <input type="email" id="inputEmail" class="form-control mb-4" placeholder="Login" required name="email" value="{{ old('email') }}"
                autocomplete="email" autofocus>
            <label for="inputPassword" class="">Password</label>
            <input type="password" id="inputPassword" class="form-control mb-5" placeholder="Password" required name="password" required
                autocomplete="current-password">
            <div class="checkbox d-flex justify-content-between mb-4 mt-3">
                <div class="custom-control custom-checkbox mr-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" value="remember-me" name="remember">
                    <label class="custom-control-label fThai" for="customCheck1">จดจำฉัน</label>
                </div>
                <div class="forgot-pass">
                    <a href="{{ route('password.request') }}" class="fThai">ลืมรหัสผ่าน?</a>
                </div>
            </div>
            @if(Session::has('message'))
            <div class="alert {{ Session::has('alert-class')?Session::get('alert-class'):'alert-success' }}" role="alert">
                <i class="flaticon-cancel-12  text-black close" data-dismiss="alert"></i>
                {{ Session::get('message') }}
            </div>
            @endif
            <button class="btn btn-lg btn-recute btn-block btn-rounded mb-4 mt-3 fThai" type="submit">เข้าสู่ระบบ</button>

        </div>
    </div>
</form>
@endsection



