@extends('layouts.app')
@section('title', 'GameApp - Categories Create')
@section('classMain', 'addUsers')

@section('content')
    <header>
        <a href="javascript:history.back()">
            <img class="back" src="{{ asset('images/back.svg')}}" alt="menu">
        </a>
        <img class="logo" src="{{ asset('images/logo-AddCatego.svg') }}" alt="Logo">
        <img class="btn-burger" src="{{asset('images/menu.svg')}}" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>
    <section class="scroll">
        <section>
            <form method="POST" class="frmRegister" action="{{ route('categories.store') }}">
                @csrf

                <div class="imgUpload">
                    <input type="file" id="fileInput" accept="image/*">
                    <img src="{{ asset('images/icon-uploadPhoto.svg') }}" class="upload" alt="upload photo">
                </div>

                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="name">
                    Name:
                </div>
                <input type="text" name="name" placeholder="SNES">

                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="manufacturer">
                    Manufacturer:
                </div>
                <input type="text" name="manufacturer" placeholder="Nintendo">

                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="releasedate">
                    Release date:
                </div>
                <input type="date" name="releasedate">

                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="description">
                    Description:
                </div>
                <textarea name="description" id="" cols="30" rows="10"></textarea>

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
