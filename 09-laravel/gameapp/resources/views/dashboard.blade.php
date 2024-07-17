@extends('layouts.app')
@section('title', 'GameApp - Dashboard')
@section('classMain', 'dashboard')

@section('content')
<header>
    <a href="">
        <img class="back" src="images/back.svg" alt="menu">
    </a>
    <img class="logo" src="images/logo-dashboard.svg" alt="Logo">
    <img class="btn-burger" src="images/menu.svg" alt="menu">
</header>

<nav class="nav"></nav>

<section class="scroll">
    <div class="container-dark">
        <div class="icons">
            <img src="images/icon-users.svg" alt="">
            20 rows
        </div>

        <div class="text">
            Module: Users
        </div>

        <div class="btn">
            <a href="{{ url('users') }}">view</a>
        </div>
        
    </div>

    <div class="container-light">
        <div class="icons">
            <img src="images/icon-categories.svg" alt="">
            20 rows
        </div>
        <div class="text">
            Module: Categories
        </div>

        <div class="btn">
            <a href="categories.html">view</a>
        </div>

    </div>

    <div class="container-dark">
        <div class="icons">
            <img src="images/icon-game.svg" alt="">
            20 rows
        </div>

        <div class="text">
            Module: Games
        </div>

        <div class="btn">
            <a href="games.html">view</a>
        </div>
    </div>

</section>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(".nav").load("/menulogin");

        $('header').on('click', '.btn-burger', function () {
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