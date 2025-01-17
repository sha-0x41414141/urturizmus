<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
</head>
<body>
    <h2 style="text-align: center;">Your reservations</h2>
    <table>
        <tr>
            <th>Destination</th>
            <th>Price</th>
            <th>Departure</th>
        </tr>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->destination}}</td>
                <td>{{$reservation->price}}</td>
                <td>{{$reservation->departure}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>