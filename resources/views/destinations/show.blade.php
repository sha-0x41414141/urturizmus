<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit destination</title>
</head>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    @endif
    <h2>Edit destination</h2>
    <form action="{{route('destination.update', $destination->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" value="{{$destination->destination}}"> <br>
        <label for="price">Price:</label>
        <input type="number" min=0 id="price" name="price" value="{{$destination->price}}"> <br>
        <label for="departure">Departure:</label>
        <input type="text" id="departure" name="departure" value="{{$destination->departure}}"> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>