<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    
        <title>ZSSN</title>
    </head>
    <body class="container">
        <div class="jumbotron mt-3">
            <h1 class="display-3">Zombie Survival Network</h1>
            <p class="lead"></p>
            <hr class="my-4">
            <blockquote class="blockquote text-center">
                <p class="mb-0">Why does it always have to be some crazy, evil shit? Can't we for once just find a bakery? Maybe a working donut shop? A fully stocked dispensary-is that too much to ask?</p>
                <footer class="blockquote-footer">Doc<cite title="Source Title"> in Z Nation</cite></footer>
            </blockquote>
            <div class='text-center'>    
                <button type="button" class="btn btn-info" onclick="window.location='{{ route('storeSurvivor') }}'">New Survivor</button>
                <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('survivors') }}'">List Survivors</button>
                <button type="button" class="btn btn-success" onclick="window.location='{{ route('trade') }}'">Trade Items</button>
                <button type="button" class="btn btn-warning" onclick="window.location='{{ route('genInfo') }}'">Reports</button>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
