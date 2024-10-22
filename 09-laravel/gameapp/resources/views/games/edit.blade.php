@extends('layouts.app')
@section('title', 'GameApp - Edit Game')
@section('classMain', 'editUser')

@section('content')
    <header>
        <a href="javascript:history.back()">
            <img class="back" src="{{ asset('images/back.svg') }}" alt="menu">
        </a>
        <img class="logo" src="{{ asset('images/logo-editGame.svg') }}" alt="Logo">
        <img class="btn-burger" src="{{ asset('images/menu.svg') }}" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>

    <section class="scroll">
        <section>
            <form method="POST" class="frmRegister" action="{{ url('games/'.$game->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $game->id }}">

                <!-- Cargar imagen del juego -->
                <div class="imgUpload">
                    <img src="{{ asset('img').'/'.$game->image }}" class="upload" alt="Game image">
                    <input type="file" id="fileInput" name="image" accept="image/*">
                </div>

                <!-- Título del juego -->
                <div>
                    <img src="{{ asset('images/icon-title.svg') }}" alt="Title">
                    Title Game:
                </div>
                <input type="text" name="title" value="{{ $game->title }}">

                <!-- Categoría -->
                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="Category">
                    Category:
                </div>
                <select name="categoryId">
                    <option value="" selected>Select Category</option>
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}" {{ $game->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                <!-- Fecha de lanzamiento -->
                <div>
                    <img src="{{ asset('images/ico-date.svg') }}" alt="Release Date">
                    Release Date:
                </div>
                <input type="date" name="releasedate" value="{{ $game->releasedate }}">

                <!-- Desarrollador -->
                <div>
                    <img src="{{ asset('images/ico-developer.svg') }}" alt="Developer">
                    Developer:
                </div>
                <input type="text" name="developer" value="{{ $game->developer }}">

                <!-- Precio -->
                <div>
                    <img src="{{ asset('images/ico-price.svg') }}" alt="Price">
                    Price:
                </div>
                <input type="text" name="price" value="{{ $game->price }}">

                <!-- Género -->
                <div>
                    <img src="{{ asset('images/ico-genre.svg') }}" alt="Genre">
                    Genre:
                </div>
                <input type="text" name="genre" value="{{ $game->genre }}">

                <!-- Slider (Campo booleano o checkbox) -->
                <div>
                    <img src="{{ asset('images/ico-slider.svg') }}" alt="Slider">
                    Featured (Slider):
                </div>
                <input type="checkbox" name="slider" value="1" {{ $game->slider ? 'checked' : '' }}>

                <!-- Descripción -->
                <div>
                    <img src="{{ asset('images/icon-description.svg') }}" alt="Description">
                    Description:
                </div>
                <textarea name="description">{{ $game->description }}</textarea>

                <!-- Botón de editar -->
                <button type="submit">Edit</button>

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
