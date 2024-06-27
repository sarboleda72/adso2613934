@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('classMain', 'welcome')

@section('content')
    <header>
        <img src="images/logo-welcome.png" alt="Logo">
    </header>

    <section class="owl-carousel owl-theme">
        <img class="welcome" src="images/slide-01.png" alt="Slide01">
        <img class="welcome" src="images/slide-01.png" alt="Slide03">
        <img class="welcome" src="images/slide-01.png" alt="Slide02">
    </section>

    <footer>
        <a href="{{ url('catalogue') }}" class="btn btn-explore">
            <img src="images/content-btn-welcome.svg" alt="Explore">
        </a>
    </footer>
@endsection

@section('js')
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                responsive: {
                    0: {
                        items: 1,
                    },
                },
            });
        });
@endsection
