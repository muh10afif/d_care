
    <style>

    #map {
        margin: 10px;
        width: 700px;
        height: 300px; 
        padding: 10px;
    }

    #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
            height: 40px;
        }

        .pac-container { z-index: 100000 !important; }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
        }

        #lat,
        #long,
        #getlocation {
            width: 400px;
        }
</style>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">OTS</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">D-care</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('manager/ots') ?>">OTS</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Data OTS</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

  <div class="row">
      <div class="col-12">
          <div class="card border-info">
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <?php echo form_open('manager/inputOTS'); ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 col-lg-4">
                              <div class="form-group">
                                <label class="form-label"><b>Potensial/Non Potensial</b></label>
                                <div class="row gutters-xs">
                                  <div class="col-auto">
                                    <label class="colorinput">
                                      <input name="character" type="checkbox" value="1">
                                      <span>Character</span>
                                    </label>
                                  </div>
                                  <div class="col-auto">
                                    <label class="colorinput">
                                      <input name="capital" type="checkbox" value="1">
                                      <span>Capital</span>
                                    </label>
                                  </div>
                                  <div class="col-auto">
                                    <label class="colorinput">
                                      <input name="condition" type="checkbox" value="1">
                                      <span>Condition</span>
                                    </label>
                                  </div>
                                  <div class="col-auto">
                                    <label class="colorinput">
                                      <input name="collateral" type="checkbox" value="1">
                                      <span>Collateral</span>
                                    </label>
                                  </div>
                                  <div class="col-auto">
                                    <label class="colorinput">
                                      <input name="capacity" type="checkbox" value="1">
                                      <span>Capacity</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label><b>Keterangan</b></label>
                                <textarea name="keterangan" class="form-control" placeholder="keterangan"></textarea>
                              </div>
                              <div class="form-group">
                                <label><b>Narasumber/Nama yang ditemui</b></label>
                                <input type="text" name="narasumber" class="form-control" placeholder="Narasumber/Nama yang ditemui" />
                                <input type="hidden" name="id_debitur" class="form-control" value="<?php echo $getData['id_debitur'];?>" />
                              </div>
                              <div class="form-group">
                                <label><b>Telepon</b></label>
                                <input type="text" name="telp" class="form-control" placeholder="08111xxxx" />
                              </div>
                              <div class="form-group">
                                <label><b>Alamat</b></label>
                                <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="alamat">Maps</label>
                                  <div  align="center" class="table-responsive">
                                    <input type="hidden" id="getlocation">
                                    <input id="pac-input" class="controls form-control" type="text" placeholder="Search Box">
                                        <div id="map"></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="nama">Latitude</label>
                                  <input class="form-control" id="lat" name="lat" placeholder="Masukkan Latitude" type="text" readonly>
                              </div>
                              <div class="form-group">
                                  <label for="nama">Longitude</label>
                                  <input class="form-control" id="long" name="long" placeholder="Masukkan Longitude" type="text" readonly>
                              </div>
                            </div>
                          </div> <button type="submit" name="submit" class="btn btn-success" onclick="javascript: return confirm('Apakah data yang anda masukan sudah benar ?')"><i class="glyphicon glyphicon-ok"></i><?= nbs(3) ?>S I M P A N</button>
                        </div>
                       
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</div>

    <script>
        // In the following example, markers appear when the user clicks on the map.
        // The markers are stored in an array.
        // The user can then click an option to hide, show or delete the markers.
        var map;
        var markers = [];


        function initMap() {
            var haightAshbury = {
                lat: -6.894323999999999,
                lng: 107.56080120000001  
            };

            map = new google.maps.Map(document.getElementById('map'), {

                center: haightAshbury,
                mapTypeId: 'terrain',
                zoom: 20,
                disableDoubleClickZoom: true,
            });



            // This event listener will call addMarker() when the map is clicked.
            map.addListener('dblclick', function (event) {
                $("#lat").val(event.latLng.lat());
                $("#long").val(event.latLng.lng());
                addMarker(event.latLng);


            });

            // Adds a marker at the center of the map.
            addMarker(haightAshbury);

            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });


                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        animation: google.maps.Animation.BOUNCE,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // alert(place.geometry.location);
                        var plc = place.geometry.location;
                        // var pcl1 = plc.replace("(", " ");
                        // var pcl2 = plc1.replace(")", " ");
                        // console.log(place.geometry.location);
                        // var pecah = plc.split(",");
                        $("#getlocation").val(plc);
                        var location = $(("#getlocation")).val();
                        var pcl1 = location.replace("(", " ");
                        var pcl2 = pcl1.replace(")", " ");
                        var pecah = pcl2.split(",");
                        $("#lat").val(pecah[0]);
                        $("#long").val(pecah[1]);
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });

        }



        // Adds a marker to the map and push to the array.
        function addMarker(location) {

            deleteMarkers();
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                animation: google.maps.Animation.BOUNCE,
            });
            markers.push(marker);


        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            // var m = markers.length + 1;
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);

            }
            // markers[1].setMap(null);
            // console.log(markers.length);
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Shows any markers currently in the array.
        function showMarkers() {
            setMapOnAll(map);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX0BerEOaK59srKbH-FnzzRYM1xTzeEts&libraries=places&callback=initMap"
        async defer></script>