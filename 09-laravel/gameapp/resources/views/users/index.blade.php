@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('classMain', 'users')

@section('content')

    <header>
        <a href="javascript:history.back()">
            <img class="back" src="images/back.svg" alt="menu">
        </a>
        <img class="logo" src="images/logo-user.svg" alt="Logo">
        <img class="btn-burger" src="images/menu.svg" alt="menu">

    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>

    <section class="scroll">

        <div class="add">
            <a href="{{ url('users/create') }}">+ add</a>
        </div>
        @foreach ($users as $user)
            <div class="container-dark">
                <div class="icons">
                    <img src="img/{{ $user->photo }}" alt="">
                </div>

                <div class="text">
                    <div>
                        {{ $user->fullname }}
                    </div>
                    <div class="txtAdmin">
                        {{ $user->role }}
                    </div>
                </div>

                <div class="btn">
                    <a class="view" href="{{ url('users/' . $user->id) }}"><img src="images/icon-search.svg"
                            alt=""></a>
                    <a class="edit" href="{{ url('users/' . $user->id . '/edit') }}"><img src="images/icon-edit.svg"
                            alt=""></a>
                    <a class="delete" href="#"><img src="images/icon-delete.svg" alt=""></a>
                </div>

            </div>
        @endforeach

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>¿Estás seguro de que quieres eliminar este usuario?</p>
                <div>
                    <button id="confirmDelete">Si</button>
                    <button id="noDelete">No</button>
                </div>

            </div>
        </div>
    </section>

    <div class="paginate">
        {{ $users->links('layouts.paginator') }}
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active');

                if ($(this).attr('src') === 'images/menu.svg') {
                    $(this).attr('src', 'images/icon-x.svg');
                } else {
                    $(this).attr('src', 'images/menu.svg');
                }
                $('.nav').toggleClass('active')
            });

            $(".delete").click(function() {
                $("#myModal").css("display", "block");
            });

            $(".close").click(function() {
                $("#myModal").css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == $("#myModal")[0]) {
                    $("#myModal").css("display", "none");
                }
            });

            $("#confirmDelete").click(function() {
                $("#myModal").css("display", "none");
            });

            $("#noDelete").click(function() {
                $("#myModal").css("display", "none");
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session('messages'))
                Swal.fire({
                    position: "top",
                    icon: "success",
                    title: "{{ session('messages')}}",
                    showConfirmButton: false,
                    timer: 5000
                });
            @endif
        })
    </script>
@endsection
