@extends('layouts.app')
@section('title', 'GameApp - View User')
@section('classMain', 'viewUser')

@section('content')
    <header>
        <a href="javascript:history.back()">
            <img class="back" src="{{asset('images/back.svg')}}" alt="menu">
        </a>
        <img class="logo" src="{{asset('images/logo-viewUser.svg')}}" alt="Logo">
        <img class="btn-burger" src="{{asset('images/menu.svg')}}" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>

    <section class="scroll">
        <form action="" class="frmRegister">

            <div class="imgUpload">
                <img src="{{ asset('img').'/'.$users->photo }}" class="upload" alt="upload photo">
            </div>

            <div>
                <img src="{{ asset('images/icon-document.svg') }}" alt="Document">
                Document:
            </div>
            <input type="text" name="document" value="{{ $users->document }}">

            <div>
                <img src="{{ asset('images/ico-fullname.svg') }}" alt="Fullname">
                Full name:
            </div>
            <input type="text" value="{{ $users->fullname }}">

            <div>
                <img src="{{ asset('images/ico-date.svg') }}" alt="birthdate">
                birthdate:
            </div>
            <input type="date" name="birthdate" value="{{ $users->birthdate}}">

            <div>
                <img src="{{ asset('images/ico-gender.svg') }}" alt="birthdate">
                Gender:
            </div>
            <input type="text" value="{{ $users->gender }}">
            

            <div>
                <img src="{{asset('images/icon-email.svg')}}" alt="Login">
                Email:
            </div>
            <input type="email" value="{{ $users->email }}">

            <div>
                <img src="{{asset('images/ico-phonenumber.svg')}}" alt="Fullname">
                Phone number:
            </div>
            <input type="text" value="{{ $users->phone }}">

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
