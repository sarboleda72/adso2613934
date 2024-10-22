@forelse ($games as $game)

    <div class="container-dark">
        <div class="icons">
            <img src="{{ asset('img/' . $game->image) }}" alt="{{ $game->title }} image">
        </div>

        <div class="text">
            <div>
                {{ $game->title }}
            </div>
            <div class="txtAdmin">
                {{ $game->developer }}
            </div>
        </div>

        <div class="btn">
            <!-- Ver detalles del juego -->
            <a class="view" href="{{ url('games/' . $game->id) }}">
                <img src="{{ asset('images/icon-search.svg') }}" alt="View Game">
            </a>

            <!-- Editar juego -->
            <a class="edit" href="{{ url('games/' . $game->id . '/edit') }}">
                <img src="{{ asset('images/icon-edit.svg') }}" alt="Edit Game">
            </a>

            <!-- Eliminar juego (con confirmación) -->
            <a class="delete" href="javascript:;" class="delete" data-title="{{ $game->title }}">
                <img src="{{ asset('images/icon-delete.svg') }}" alt="Delete Game">
            </a>

            <form action="{{ url('games/' . $game->id) }}" method="POST" style="display: none">
                @csrf
                @method('DELETE')
            </form>
        </div>

    </div>

@empty
    <p>No games found</p>
@endforelse
