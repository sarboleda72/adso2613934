@extends('layouts.app')
@section('title', 'GameApp - Category Edit')
@section('classMain', 'addUsers')

@section('content')
    <header>
        <a href="javascript:history.back()">
            <img class="back" src="{{ asset('images/back.svg')}}" alt="menu">
        </a>
        <img class="logo" src="{{ asset('images/logo-editUser.svg') }}" alt="Logo">
        <img class="btn-burger" src="{{asset('images/menu.svg')}}" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>
    <section class="scroll">
        <section>
            <form method="POST" class="frmRegister" action="{{ url('categories/'.$category->id) }}">
                @csrf
                @method('PUT')

                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="name">
                    Name:
                </div>
                <input type="text" name="name" placeholder="SNES" value="{{ $category->name }}">
    
                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="manufacturer">
                    Manufacturer:
                </div>
                <input type="text" name="manufacturer" placeholder="Nintendo" value="{{ $category->manufacturer }}">
    
                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="releasedate">
                    Release date:
                </div>
                <input type="date" name="releasedate" value="{{ $category->releasedate }}">
    
                <div>
                    <img src="{{ asset('images/ico-categories.svg') }}" alt="description">
                    Description:
                </div>
                <textarea name="description" id="" cols="30" rows="10" readonly>{{ $category->description }}</textarea>
    
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
