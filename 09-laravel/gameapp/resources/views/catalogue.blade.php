@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('classMain', 'catalogue')

@section('content')

    <header>
        <img class="logo" src="images/logo-catalogue.png" alt="Logo">
        <img class="btn-burger" src="images/menu.svg" alt="menu">
    </header>

    <nav class="nav">

    </nav>

    <section class="scroll">

        <form class="filter" action="">
            <input class="inpFilter" type="text" placeholder="Filter">
        </form>

        <div class="containerCarrusel">
            <h2 class="category">SNES:</h2>
            <section class="owl-carousel owl-theme">
                <figure>
                    <a href="view-game.html">
                        <img class="catalogue" src="images/carrusel 1.png" alt="Slide01">
                    </a>
                    <h2>
                        Ninja Turtles
                    </h2>
                    <p>
                        Konami
                    </p>
                </figure>
                <figure>
                    <a href="">
                        <img class="catalogue" src="images/carrusel 2.png" alt="Slide01">
                    </a>
                    <h2>
                        Sunset Riders
                    </h2>
                    <p>
                        Konami
                    </p>
                </figure>
            </section>

            <h2 class="category">PSX:</h2>
            <section class="owl-carousel owl-theme">
                <figure>
                    <a href="">
                        <img class="catalogue" src="images/carrusel 3.png" alt="Slide01">
                    </a>
                    <h2>
                        PEPSI MAN
                    </h2>
                    <p>
                        KID
                    </p>
                </figure>
                <figure>
                    <a href="">
                        <img class="catalogue" src="images/carrusel 4.png" alt="Slide01">
                    </a>
                    <h2>
                        FF VII
                    </h2>
                    <p>
                        SqueareSoft
                    </p>
                </figure>
            </section>

            <h2 class="category">N64:</h2>
            <section class="owl-carousel owl-theme">
                <figure>
                    <a href="">
                        <img class="catalogue" src="images/carrusel 5.png" alt="Slide01">
                    </a>
                    <h2>
                        Mario Kart 64
                    </h2>
                    <p>
                        Nintendo EAD
                    </p>
                </figure>
                <figure>
                    <a href="">
                        <img class="catalogue" src="images/carrusel 6.png" alt="Slide01">
                    </a>
                    <h2>
                        F-Zero X
                    </h2>
                    <p>
                        Nintendo EAD
                    </p>
                </figure>
            </section>

        </div>

    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".nav").load("/menu");
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 1,
                dots: false,
                responsive: {
                    0: {
                        items: 2,
                    },
                },
            });

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
