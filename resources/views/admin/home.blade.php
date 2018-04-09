<form action="{{ route('admin.search') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="id" placeholder="ID DE L'ANIME">
    <input type="submit">
</form>

@foreach ($animes as $anime)
    <h2><a href="{{ route('admin.anime', ['id' => $anime->id] ) }}">{{$anime->title}}</a></h2>
    <hr>
@endforeach