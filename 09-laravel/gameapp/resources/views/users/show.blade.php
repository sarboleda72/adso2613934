@extends('layouts.app')
@section('title', 'GameApp - View User')
@section('classMain', 'viewUser')

@section('content')
    <header>
        <a href="javascript:history.back()">
            <img class="back" src="images/back.svg" alt="menu">
        </a>
        <img class="logo" src="images/logo-viewUser.svg" alt="Logo">
        <img class="btn-burger" src="images/menu.svg" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>

    <section class="scroll">
        <form action="" class="frmRegister">

            <div class="imgUpload">
                <img src="images/img-viewUser.png" class="upload" alt="upload photo">
            </div>

            <div>
                <img src="images/ico-fullname.svg" alt="Fullname">
                Full name:
            </div>
            <input type="text" value="Jeremias Springfield">

            <div>
                <img src="images/icon-email.svg" alt="Login">
                Email:
            </div>
            <input type="email" value="example@host.com">

            <div>
                <img src="images/ico-phonenumber.svg" alt="Fullname">
                Phone number:
            </div>
            <input type="text" value="3333333333">

        </form>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active');

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
