<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> 

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

        <title>ZSSN - Trade Items</title>      
    </head>
    <body class="container">
        <div class="jumbotron mt-3">        
            
            <h1 class="display-3">Zombie Survival Network</h1>
            <p class="lead text-center">Trading items between healthy survivors.</p>
            <hr class="mx-4">
            <p class="lead text-center">Keep in mind the price table below, every trade must be cost equivalent.</p>

            <table class="table table-hover">
                <thead>
                    <tr class="table-info">
                        <th scope="col">Item</th>
                        <th scope="col">Water</th>
                        <th scope="col">Food</th>
                        <th scope="col">Medication</th>
                        <th scope="col">Ammo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info">
                        <th scope="row">Cost</th>
                        <td>4 points</td>
                        <td>3 points</td>
                        <td>2 points</td>
                        <td>1 point</td>
                    </tr>
            </table>
            <hr class="mx-4">
            <p class="lead text-center">Fill the form bellow including the ammount of each item you wish to trade, if none, insert 0.</p>

            <form action="{{url('/survivors/trade')}}" method="post">
                <fieldset>
                    <div class="row">                    
                        <div class="form-group col-lg-6">                        
                            <div class="form-group">
                                <label for="inputNameSurvivor1">Survivor's #1 name</label>
                                <input type="text" class="typeahead form-control" name="inputNameSurvivor1"> 
                            </div>
                            <hr class="mx-4">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputWater">Water</label>
                                <input type="number" class="form-control" name="inputWater" placeholder="Quantity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputFood">Food</label>
                                <input type="number" class="form-control" name="inputFood" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputMedication">Medication</label>
                                <input type="number" class="form-control" name="inputMedication" placeholder="Quantity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAmmo">Ammo</label>
                                <input type="number" class="form-control" name="inputAmmo" placeholder="Quantity">
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="inputNameSurvivor1">Survivor's #2 name</label>
                                <input type="text" class="typeahead form-control" name="inputNameSurvivor2"> 
                            </div>
                            <hr class="mx-4">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputWater">Water</label>
                                <input type="number" class="form-control" name="inputWater" placeholder="Quantity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputFood">Food</label>
                                <input type="number" class="form-control" name="inputFood" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputMedication">Medication</label>
                                <input type="number" class="form-control" name="inputMedication" placeholder="Quantity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAmmo">Ammo</label>
                                <input type="number" class="form-control" name="inputAmmo" placeholder="Quantity">
                            </div>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                    <button type="button" class="btn btn-light" onclick="window.location='{{ route('home') }}'">Cancel</button>
                </fieldset>    
            </form>
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
</html>