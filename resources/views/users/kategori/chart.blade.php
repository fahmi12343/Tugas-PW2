{{-- @extends('layouts.app')


@endsection --}}


<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 Chart example using Charts Package</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
     {{-- ChartScript --}}
     @if($usersChart)
     {!! $usersChart->script() !!}
     @endif
</head>
<body>
    <h1>Users Graphs</h1>

    <div style="width: 50%">
        {!! $usersChart->container() !!}
    </div>
</body>
</html>
