<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    
        <title>ZSSN - All Survivors</title>
    </head>
    <body class="container">
        <div class="jumbotron mt-3">
            <h1 class="display-3" a href=>Zombie Survival Network</h1>
            <p class="lead text-center">Listing of all registered survivors</p>
            <hr class="mx-4">
            <div class="row">
                @foreach ($survivors as $s)
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                                <div class="form-group col-lg-6">   
                                    <h5 class="mb-1">{{$s->name}}
                                    @if($s->infected)
                                        <small class="text-danger">Infected</small>
                                    @else
                                        <small class="text-success">Not infected</small>
                                    @endif
                                    </h5>
                                    <p class="mb-1">Age: {{$s->age}}</p>
                                    <p class="mb-1">Gender: {{$s->gender}}</p>
                                    <?php 
                                        $loc = substr(serialize($s->lastLocation), 6, -2);
                                    ?>
                                    <p class="mb-1">Last known location: <br> {{$loc}}</p>
                                    <p class="mb-1">Infected Reports: {{$s->infectedReports}}</p>
                                   
                                </div>
                                <div class="form-group col-lg-6">   
                                    <h5 class="mb-1">Inventory ID#{{$s->inventory_id}}</h5>
                                    <br>    
                                    <div class="row">
                                        <div class="form-group col-lg-5">                                        
                                            <p class="mb-1">Water bottles: {{$s->inventory->qtyWater}}</p>
                                            <p class="mb-1">Food: {{$s->inventory->qtyFood}}</p>
                                        </div>
                                        <div class="form-group col-lg-5">                                    
                                            <p class="mb-1">Medication: {{$s->inventory->qtyMedication}}</p>
                                            <p class="mb-1">Ammo: {{$s->inventory->qtyAmmo}}</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <br>
            <hr class="mx-4">
            <div class="text-center">
                <button type="button" class="btn btn-light" onclick="window.location='{{ route('home') }}'">Go back</button>
            </div>
        </div>
        @include('sweetalert::alert')
    </body>