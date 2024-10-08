@extends('layouts.app')
@section('title', 'GameApp - Game Create')
@section('classMain', 'addUsers')

@section('content')
    <header>
        <a href="javascript:history.back()">
            <img class="back" src="{{ asset('images/back.svg')}}" alt="menu">
        </a>
        <img class="logo" src="{{ asset('images/logo-games.svg') }}" alt="Logo">
        <img class="btn-burger" src="{{asset('images/menu.svg')}}" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>
    <section class="scroll">
        <section>
        <form method="POST" class="frmRegister" action="{{ route('games.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Cargar imagen del juego -->
    <div class="imgUpload">
        <input type="file" id="fileInput" name="image" accept="image/*">
        <img src="{{ asset('images/img-uploadgame.svg') }}" class="upload" alt="upload photo">
    </div>

    <!-- Título del juego -->
    <div>
        <img src="{{ asset('images/icon-title.svg') }}" alt="Title">
        Title Game:
    </div>
    <input type="text" name="title" placeholder="Valorant">

    <!-- Categoría -->
    <div>
        <img src="{{ asset('images/ico-categories.svg') }}" alt="Category">
        Category:
    </div>
    <select name="categoryId">
        <option value="" selected>Select Category</option>
        <option value="1">RPG</option>
        <option value="2">SHOOTER</option>
        <option value="3">CAR</option>
        <option value="4">SPORT</option>
    </select>

    <!-- Fecha de lanzamiento -->
    <div>
        <img src="{{ asset('images/ico-date.svg') }}" alt="Release Date">
        Release Date:
    </div>
    <input type="date" name="releasedate" placeholder="2024-01-01">

    <!-- Desarrollador -->
    <div>
        <img src="{{ asset('images/ico-developer.svg') }}" alt="Developer">
        Developer:
    </div>
    <input type="text" name="developer" placeholder="Example Dev Studio">

    <!-- Precio -->
    <div>
        <img src="{{ asset('images/ico-price.svg') }}" alt="Price">
        Price:
    </div>
    <input type="text" name="price" placeholder="59.99">

    <!-- Género -->
    <div>
        <img src="{{ asset('images/ico-genre.svg') }}" alt="Genre">
        Genre:
    </div>
    <input type="text" name="genre" placeholder="Action">

    <!-- Slider (Campo booleano o checkbox) -->
    <div>
        <img src="{{ asset('images/ico-slider.svg') }}" alt="Slider">
        Featured (Slider):
    </div>
    <input type="checkbox" name="slider" value="1">

        <!-- Descripción -->
        <div>
        <img src="{{ asset('images/icon-description.svg') }}" alt="Description">
        Description:
    </div>
    <textarea name="description" placeholder="Write a short description of the game"></textarea>

    <!-- Botón de guardar -->
    <button type="submit">Save</button>
</form>

        </section>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active');
                $(".nav").load("/menulogin");

                if ($(this).attr('src') === "{{ asset('images/menu.svg')}}" ) {
                    $(this).attr('src', "{{ asset('images/icon-x.svg')}}" );
                } else {
                    $(this).attr('src', "{{ asset('images/menu.svg')}}" );
                }

                $('.nav').toggleClass('active')
            })
        });
    </script>
@endsection
