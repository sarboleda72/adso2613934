<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Games</title> <!-- Cambiar el título -->
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th> <!-- Cambiar 'Full Name' a 'Title' -->
            <th>Developer</th> <!-- Cambiar 'Email' a 'Developer' -->
            <th>Release Date</th> <!-- Cambiar 'Phone' a 'Release Date' -->
            <th>Price</th> <!-- Agregar 'Price' -->
            <th>Image</th> <!-- Cambiar 'Photo' a 'Image' -->
        </tr>
        @foreach ($games as $game) <!-- Cambiar 'users' a 'games' -->
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->title }}</td>
                <td>{{ $game->developer }}</td>
                <td>{{ $game->releasedate }}</td> <!-- Cambiar para mostrar la fecha de lanzamiento -->
                <td>{{ $game->price }}</td> <!-- Cambiar para mostrar el precio -->
                <td><img src="{{ public_path().'/img/'.$game->image }}" alt="" width="40px"></td> <!-- Cambiar 'photo' a 'image' -->
            </tr>            
        @endforeach
    </table>
</body>
</html>
