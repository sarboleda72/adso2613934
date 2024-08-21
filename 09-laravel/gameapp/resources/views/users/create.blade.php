@extends('layouts.app')
@section('title', 'GameApp - User Create')
@section('classMain', 'addUsers')

@section('content')
    <header>
        <a href="javascript:history.back()">
            <img class="back" src="{{ asset('images/back.svg')}}" alt="menu">
        </a>
        <img class="logo" src="{{ asset('images/logo-addUsers.svg') }}" alt="Logo">
        <img class="btn-burger" src="{{asset('images/menu.svg')}}" alt="menu">
    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>
    <section class="scroll">
        <section>
            <form method="POST" class="frmRegister" action="{{ route('users.store') }}">
                @csrf

                <div>
                    <img src="{{ asset('images/icon-document.svg') }}" alt="Document">
                    Document:
                </div>
                <input type="text" name="document" placeholder="1234567890">

                <div>
                    <img src="{{ asset('images/ico-fullname.svg')}}" alt="Fullname">
                    Full name:
                </div>
                <input type="text" name="fullname" placeholder="Jeremias Springfield">

                <div>
                    <img src="{{ asset('images/ico-date.svg')}}" alt="birthdate">
                    birthdate:
                </div>
                <input type="date" name="birthdate" placeholder="1990-01-01">

                <div>
                    <img src="{{ asset('images/ico-gender.svg')}}" alt="birthdate">
                    Gender:
                </div>

                <div>
                    <select name="gender" class="gender">
                        <option value="Other">Other</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div>
                    <img src="{{ asset('images/icon-email.svg')}}" alt="Login">
                    Email:
                </div>
                <input type="email" name="email" placeholder="example@host.com">

                <div>
                    <img src="{{ asset('images/ico-phonenumber.svg')}}" alt="Fullname">
                    Phone number:
                </div>
                <input type="text" name="phone" placeholder="3333333333">

                <div>
                    <img src="{{ asset('images/icon-pass.svg')}}" alt="Login">
                    Password:
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <img src="{{ asset('images/ico-confirm.svg')}}" alt="Fullname">
                    Confirm Password:
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

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
