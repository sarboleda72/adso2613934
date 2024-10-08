@forelse ($users as $user)

        <div class="container-dark">
            <div class="icons">
                <img src="{{asset ("img/". $user->photo )}}" alt="">
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
                <a class="delete" href="javascript:;" class="delete" data-fullname="{{ $user->fullname }}"><img
                        src="images/icon-delete.svg" alt=""></a>

                <form action="{{ url('users/' . $user->id) }}" method="POST" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>

        </div>

@empty
    No found
@endforelse
