@forelse ($categories as $category)

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

@empty
    No found
@endforelse
