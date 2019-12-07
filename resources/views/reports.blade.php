<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

        <title>ZSSN - Reports</title>      
    </head>
    <body class="container">
        <div class="jumbotron mt-3">
            <h1 class="display-3">Zombie Survival Network</h1>
            <p class="lead text-center">Storing new Survivor.</p>
            <hr class="my-4">

            <div class="row">                    
                <div class="form-group col-lg-6">   
                    <div class="card text-white bg-warning mb-3" style="max-width:200rem;">
                        <div class="card-header text-center">General information about survivors</div>
                        <div class="card-body">
                            Total Survivors: {{$infectedPercentage['totalSurvivors']}}
                            <br>
                            Infected: {{$infectedPercentage['infected']}}
                            <br><br>
                            Infected Survivors: {{$infectedPercentage['infectedPercentage']}}%
                            <br>
                            Healthy Survivors:  {{$infectedPercentage['notInfectedPercentage']}}%
                            <br><br>
                            Lost Points due to Infected Survivors: {{$lostPoints}}
                        </div>
                    </div>
                </div>
            

            
                <div class="form-group col-lg-6">   
                    <div class="card text-white bg-danger mb-3" style="max-width:200rem;">
                        <div class="card-header text-center">Report survivor as infected</div>
                        <div class="card-body">
                            <form action="{{ route('reportSurvivor') }}" method="put">
                                <fieldset>
                                <div class="form-group">
                                    <label for="inputNameSurvivor">Search for the suspected survivor's name</label>
                                    <input type="text" class="typeahead form-control" name="inputNameSurvivor"> 
                                </div>
                                <button type="submit" class="btn btn-danger">Report</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class='text-center'>
                <hr class="my-4">
                <button type="button" class="btn btn-dark" onclick="window.location='{{ route('home') }}'">Go back</button>
            </div>
        </div>
              
        <script type="text/javascript">
            var path = "{{ route('autocomplete') }}";
            $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
                });
            }
        });
        </script>
    </body>