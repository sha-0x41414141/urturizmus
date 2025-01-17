<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
</head>
<style>
    table{
        margin: auto;
    }

    td, th{
        padding: 10px;
    }

</style>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    @endif
    @if(session('success'))
        {{session('success')}}
    @endif
    <table>
        <tr>
            <th>Destination</th>
            <th>Price</th>
            <th>Departure</th>
        </tr>
        @foreach($destinations as $destination)
        <tr>
            <td>{{$destination->destination}}</td>
            <td>{{$destination->price}}</td>
            <td>{{$destination->departure}}</td>
            <form action="{{route('destinations.book', $destination->id)}}" method="POST">
                 @csrf
                <td><input type="submit" value="Book"></td>
            </form>
           
            @if(Auth::user()->role === 'admin')
            <form action="{{route('destination.show', $destination->id)}}">
                 @csrf
                 <td><input type="submit" value="Edit"></td>
            </form>

            <form action="{{route('destinations.delete', $destination->id)}}" method="POST">
                 @csrf
                 @method('DELETE')
                <td><input type="submit" value="Delete"></td>
                
            </form>
            @endif
        </tr>
        @endforeach
    </table>
</body>
</html>