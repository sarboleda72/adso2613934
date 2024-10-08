@extends('layouts.app')
@section('title', 'GameApp - User Create')
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
            <form method="POST" class="frmRegister" action="{{ url('users/'.$users->id) }}">
                @csrf
                @method('PUT')


                <input type="hidden" name="id" value="{{ $users->id }}">

                <div>
                    <img src="{{ asset('images/icon-document.svg') }}" alt="Document">
                    Document:
                </div>
                <input type="text" name="document" value="{{ $users->document }}">

                <div>
                    <img src="{{ asset('images/ico-fullname.svg')}}" alt="Fullname">
                    Full name:
                </div>
                <input type="text" name="fullname" value="{{ $users->fullname }}">

                <div>
                    <img src="{{ asset('images/ico-date.svg')}}" alt="birthdate">
                    birthdate:
                </div>
                <input type="date" name="birthdate" value="{{ $users->birthdate}}">

                <div>
                    <img src="{{ asset('images/ico-gender.svg')}}" alt="birthdate">
                    Gender:
                </div>

                <div>
                    <select name="gender" class="gender">
                        <option value="Other">Other</option>
                        <option value="Male" @if( $users->gender == 'Male') selected @endif>Male</option>
                        <option value="Female" @if( $users->gender == 'Famale') selected @endif>Female</option>
                    </select>
                </div>

                <div>
                    <img src="{{ asset('images/icon-email.svg')}}" alt="Login">
                    Email:
                </div>
                <input type="email" name="email" value="{{ $users->email }}">

                <div>
                    <img src="{{ asset('images/ico-phonenumber.svg')}}" alt="Fullname">
                    Phone number:
                </div>
                <input type="text" name="phone" value="{{ $users->phone }}">

                <div>
                    <img src="{{ asset('images/icon-pass.svg')}}" alt="Login">
                    Password:
                </div>

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
