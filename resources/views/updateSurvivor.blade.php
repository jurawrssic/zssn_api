<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

        <title>ZSSN - New Survivor</title>      
    </head>
    <body class="container">
        <div class="jumbotron mt-3">
            <h1 class="display-3">Zombie Survival Network</h1>
            <p class="lead text-center">Welcome to Murphytown!</p>
            <hr class="my-4">
            <form action="{{ route('store') }}" method="post">
                {{ csrf_field() }}
                <fieldset>
                <div class="row">                    
                        <div class="form-group col-lg-6">
                            <p class="lead text-left">Fill out your form.</p>
                            <div class="form-group col-md-11">
                                <label for="inputNameSurvivor">Type your name</label>
                                <input type="text" class="typeahead form-control" id="name" name="inputNameSurvivor" placeholder="Enter name"> 
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputAgeSurvivor">Enter your age</label>
                                <input type="number" class="form-control" name="inputAgeSurvivor" id="inputAge" placeholder="Enter age" disabled>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="genderSelect">Select your gender</label>
                                <select class="form-control" name="genderSelect" id="selectGender" placeholder="-" disabled>
                                    <option value="" disabled selected hidden>-</option>
                                    <option>Female</option>
                                    <option>Male</option>
                                </select>
                            </div>
                            <input class="form-control" id="lat" name="inputLatitude" hidden>
                            <input class="form-control" id="lon" name="inputLongitude" hidden>
                        </div>
                        <div class="form-group col-lg-6">
                            <div id="map" style="height: 100%; width: 100%"></div>
                            <p class="text-center">*Click on your current location</p>
                        </div>
                </div>
                
                <hr class="my-4">
                <p class="lead text-center">What you packin?</p>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputWater">How many water bottles you got?</label>
                        <input type="number" class="form-control" name="inputQtyWater" id="inputWater" placeholder="Quantity" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputFood">How much food you got?</label>
                        <input type="number" class="form-control" name="inputQtyFood" id="inputFood" placeholder="Quantity" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputMedication">How many meds you got?</label>
                        <input type="number" class="form-control" name="inputQtyMedication" id="inputMedications" placeholder="Quantity" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAmmo">How much ammo you got?</label>
                        <input type="number" class="form-control" name="inputQtyAmmo" id="inputAmmo" placeholder="Quantity" disabled>
                    </div>
                </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
            <button type="button" class="btn btn-light" onclick="window.location='{{ url('/') }}'">Cancel</button>
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
            },
            updater: function(obj){
                document.getElementById('inputAge').value = obj.age;
                document.getElementById('selectGender').value = obj.gender;
                console.log(obj);

                document.getElementById('inputWater').value = obj.inventory.qtyWater;

                document.getElementById('inputFood').value = obj.inventory.qtyWater;
                document.getElementById('inputMedication').value = obj.inventory.qtyWater;
                document.getElementById('inputAmmo').value = obj.inventory.qtyWater;
                return obj;
            }
        });
        </script>



        <script>        
            var map;
            var marker;

            function placeMarker(event){
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lon').value = event.latLng.lng();
                if(marker){
                    marker.setPosition(event.latLng);
                }else{
                    marker = new google.maps.Marker({
                        position: event.latLng,
                        map: map
                    });
                }
            }

            function initMap(){
                map = new google.maps.Map(document.getElementById('map'),  {
                    center: {lat: -25.2343, lng: -51.2729},
                    zoom: 6
                });
                google.maps.event.addListener(map, 'click', placeMarker)
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAksAD4fzPuTTHSvzpB4jqaMgFSszSZlk4&callback=initMap" async defer></script>

        
        </script>
    </body>
</html>