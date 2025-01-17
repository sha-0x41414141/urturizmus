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
        </tr>
        @endforeach
    </table>
</body>
</html>