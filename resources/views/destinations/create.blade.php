<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New destination</title>
</head>
<body>

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    @endif
    @if(session('success'))
        {{session('success')}}
    @endif
    <h2>Add new destination</h2>
    <form action="{{route('destinations.create')}}" method="POST">
        @csrf
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination"> <br>
        <label for="price">Price:</label>
        <input type="number" min=0 id="price" name="price"> <br>
        <label for="departure">Departure:</label>
        <input type="date" id="departure" name="departure"> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>