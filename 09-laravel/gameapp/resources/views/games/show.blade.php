@extends('layouts.app')
@section('title', 'GameApp - View Game')
@section('classMain', 'addUsers')

@section('content')
    <header>
        <a href="javascript:history.back()">
            <img class="back" src="{{asset('images/back.svg')}}" alt="menu">
        </a>
        <img class="logo" src="{{asset('images/logo-games.svg')}}" alt="Logo">
        <img class="btn-burger" src="{{asset('images/menu.svg')}}" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>

    <section class="scroll">
        <form action="" class="frmRegister">

            <!-- Mostrar la imagen del juego -->
            <div class="imgUpload">
                <img src="{{ asset('img').'/'.$game->image }}" class="upload" alt="Game image">
            </div>

            <!-- Título del juego -->
            <div>
                <img src="{{ asset('images/icon-title.svg') }}" alt="Title">
                Title Game:
            </div>
            <input type="text" name="title" value="{{ $game->title }}" readonly>

            <!-- Categoría -->
            <div>
                <img src="{{ asset('images/ico-categories.svg') }}" alt="Category">
                Category:
            </div>
            <input type="text" name="category" value="{{ $game->category->name }}" readonly>

            <!-- Fecha de lanzamiento -->
            <div>
                <img src="{{ asset('images/ico-date.svg') }}" alt="Release Date">
                Release Date:
            </div>
            <input type="date" name="releasedate" value="{{ $game->releasedate }}" readonly>

            <!-- Desarrollador -->
            <div>
                <img src="{{ asset('images/ico-developer.svg') }}" alt="Developer">
                Developer:
            </div>
            <input type="text" name="developer" value="{{ $game->developer }}" readonly>

            <!-- Precio -->
            <div>
                <img src="{{ asset('images/ico-price.svg') }}" alt="Price">
                Price:
            </div>
            <input type="text" name="price" value="{{ $game->price }}" readonly>

            <!-- Género -->
            <div>
                <img src="{{ asset('images/ico-genre.svg') }}" alt="Genre">
                Genre:
            </div>
            <input type="text" name="genre" value="{{ $game->genre }}" readonly>

            <!-- Slider (Campo booleano o checkbox) -->
            <div>
                <img src="{{ asset('images/ico-slider.svg') }}" alt="Slider">
                Featured (Slider):
            </div>
            <input type="checkbox" name="slider" value="1" {{ $game->slider ? 'checked' : '' }} disabled>

            <!-- Descripción -->
            <div>
                <img src="{{ asset('images/icon-description.svg') }}" alt="Description">
                Description:
            </div>
            <textarea name="description" readonly>{{ $game->description }}</textarea>

        </form>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active');

                if ($(this).attr('src') === '{{asset('images/menu.svg')}}') {
                    $(this).attr('src', '{{asset('images/icon-x.svg')}}');
                } else {
                    $(this).attr('src', '{{asset('images/menu.svg')}}');
                }
                $('.nav').toggleClass('active')
            })
        });
    </script>
@endsection
