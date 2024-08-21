@extends('layouts.app')
@section('title', 'GameApp - Categories Module')
@section('classMain', 'users')

@section('content')

    <header>
        <a href="javascript:history.back()">
            <img class="back" src="images/back.svg" alt="menu">
        </a>
        <img class="logo" src="images/logo-categories.svg" alt="Logo">
        <img class="btn-burger" src="images/menu.svg" alt="menu">

    </header>

    <nav class="nav">
        @include('partials.menulogin')
    </nav>

    <section class="scroll">

        <div class="add">
            <a href="{{ url('categories/create') }}">+ add</a>
        </div>
        <div class="options">
            <a href="{{url('exports/users/excel')}}">
                excel
            </a>
            <a href="{{url('exports/users/pdf')}}">
                pdf
            </a>
        </div>

        <input type="text" id="qsearch" placeholder="Search">

        <div class="loader"></div>

        <div class="insert">
            

            @foreach ($categories as $category)
            <div class="container-dark">
                <div class="icons">
                    <img src="img/{{ $category->image }}" alt="">
                </div>

                <div class="text">
                    <div>
                        {{ $category->name }}
                    </div>
                    <div class="txtAdmin">
                        {{ $category->manufacturer}}
                    </div>
                </div>

                <div class="btn">
                    <a class="view" href="{{ url('categories/' . $category->id) }}"><img src="images/icon-search.svg"
                            alt=""></a>
                    <a class="edit" href="{{ url('categories/' . $category->id . '/edit') }}"><img src="images/icon-edit.svg"
                            alt=""></a>
                    <a class="delete" href="javascript:;" class="delete" data-fullname="{{ $category->name }}"><img
                            src="images/icon-delete.svg" alt=""></a>

                    <form action="{{ url('categories/' . $category->id) }}" method="POST" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>

            </div>
        @endforeach
        </div>

    </section>

    <div class="paginate">
        {{ $categories->links('layouts.paginator') }}
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

            $('.loader').hide();


        });

        @if (session('messages'))
            Swal.fire({
                position: "top",
                icon: "success",
                title: "{{ session('messages') }}",
                showConfirmButton: false,
                timer: 5000
            });
        @endif


        $('div').on('click', '.delete', function() {
            $fullname = $(this).attr('data-fullname')

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this! " + $fullname,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).next().submit()
                }
            });

        })

        // ---- reconocer el cambio en el input buscador
        $('#qsearch').on('keyup', function(e){
            e.preventDefault();
            $query = $(this).val();
            $token = $('input[name=_token]').val();
            $model= 'categories';

            $('.loader').show();
            $('.insert').hide();
            
            $.post($model+'/search', 
                {q: $query, _token: $token},
                function(data){
                    $('.loader').hide();
                    $('.insert').show();
                    $('.insert').empty().append(data);
                },
            )

        })
    </script>
@endsection
