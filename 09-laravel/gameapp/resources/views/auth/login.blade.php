@extends('layouts.app')
@section('title', 'GameApp - Register')
@section('classMain', 'register')

@section('content')
<header>
    <a href="javascript:history.back()">
        <img class="back" src="images/back.svg" alt="menu">
    </a>
    <img class="logo" src="images/logo-register.svg" alt="Logo">
    <img class="btn-burger" src="images/menu.svg" alt="menu">
</header>

<nav class="nav"></nav>

<section>
    <form method="POST" class="frmRegister" action="{{ route('register') }}">
        @csrf

        <div>
            <img src="images/ico-fullname.svg" alt="Fullname">
            Full name:
        </div>
        <input type="text" name="name" placeholder="Jeremias Springfield">

        <div>
            <img src="images/icon-email.svg" alt="Login">
            Email:
        </div>
        <input type="email" name="email" placeholder="example@host.com">

        <div>
            <img src="images/ico-phonenumber.svg" alt="Fullname">
            Phone number:
        </div>
        <input type="text" name="phone" placeholder="3333333333">

        <div>
            <img src="images/icon-pass.svg" alt="Login">
            Password:
        </div>
        <input class="inpPass" id="password" name="password" type="password">

        <button type="submit">register</button>

    </form>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {

        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active');
            $(".nav").load("menu.html");

            if ($(this).attr('src') === 'images/menu.svg') {
                $(this).attr('src', 'images/icon-x.svg');
            } else {
                $(this).attr('src', 'images/menu.svg');
            }

            $('.nav').toggleClass('active')
        })
    });
</script>
@endsection
