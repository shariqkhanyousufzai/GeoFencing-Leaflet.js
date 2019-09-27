<!DOCTYPE html>
<html>
<head>
  <title>Leaflet</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
   <div class="container mt-5">
     <div class="row">
       <div class="col-sm-12">
         <div id="mapid" style="height: 400px;"></div>
         <div class="mt-3">
          <label>Address</label>
           <input type="text" name="address" style="width:80%" id="address">
           <button class="btn btn-info" onclick="getaddress()">Submit</button>
         </div>
         <div class="row" id="latdiv">
         </div>
         <div class="row" id="loader" style="display: none;">
           <div class="col-sm-12" align="center">
             <div class="fa fa-cog fa-spin text-info" style="font-size: 34px"></div>
           </div>
         </div>
         <div class="row" id="newlat">
         </div>
         <div class="row mt-5" >
         <div class="col-sm-12">
           <div align="center">
           <input type="hidden" name="lat" id="newlat1">
           <input type="hidden" name="lon" id="newlon">
           <button class="btn btn-info" disabled id="getloction">Get Location</button>
            </div>
         </div>
       </div>
       </div>
       
     </div>
   </div>

</body>
<script type="text/javascript">
  var mymap = L.map('mapid').setView([51.505, -0.09], 13);
  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    draggable: true,
    accessToken: 'pk.eyJ1IjoiZmlyZWJhc2V0ZXN0aW5nIiwiYSI6ImNqcmx0anZkNDBiNnA0NG1zazQzemp5OHcifQ.A0FvkJ2gt4z9nE4eyvSH5w'
}).addTo(mymap);

  // USING OPEN STREET MAP

  // function getaddress()
  // {
  //   $('#loader').show();
  //   var address = $('#address').val();
  //   $.getJSON('https://nominatim.openstreetmap.org/search/'+address+'?format=json&addressdetails=1&limit=1&polygon_svg=1', function(data) {
  //     $('#loader').hide();
  //     if (data == '') {
  //       $('#latdiv').html('<div class="col-sm-6"> <strong>Status: </strong><span class="btn btn-danger btn-md mr-2 ml-4"></span>Unknown Request</div>');
  //     }else{
  //     var marker = L.marker([data[0].lat, data[0].lon]).addTo(mymap);
  //     marker.dragging.enable();
  //     marker.on('dragend', function (e) {
  //     var x = marker.getLatLng().lat;
  //     var y = marker.getLatLng().lng;
  //      $('#newlat1').val(x);
  //      $('#newlon').val(y);
  //      $('#getloction').removeAttr("disabled");

  // });
  //     mymap.setView(new L.LatLng(data[0].lat, data[0].lon), 8);
  //     $('#latdiv').html('<div class="col-sm-6"> <strong>lat: </strong>'+data[0].lat+'<div><strong>Status: </strong><span class="btn btn-success btn-md mr-2 ml-4"></span>Success</div></div><div class="col-sm-6"> <strong>lon:  </strong>'+data[0].lat+' </div>');
  //     }
  //   });
  // }


  // USING OPEN STREET MAP BOX

  function getaddress()
  {
    $('#loader').show();
    var address = $('#address').val();
    $.getJSON('https://api.mapbox.com/geocoding/v5/mapbox.places/'+address+'.json?access_token=pk.eyJ1Ijoic2hhcmlxa2hhbnlvdXN1ZnphaSIsImEiOiJjanRyaDV5bW8wazhrM3ptcmxuZmhjZ2l2In0.o0EqdnII3Ec6VpBLlHyvtg', function(data) {
      console.log(data['features'][0]['geometry'].coordinates[0]);
      $('#loader').hide();
      if (data == '') {
        $('#latdiv').html('<div class="col-sm-6"> <strong>Status: </strong><span class="btn btn-danger btn-md mr-2 ml-4"></span>Unknown Request</div>');
      }else{
      var marker = L.marker([data['features'][0]['geometry'].coordinates[1], data['features'][0]['geometry'].coordinates[0]]).addTo(mymap);
      marker.dragging.enable();
      marker.on('dragend', function (e) {
      var x = marker.getLatLng().lat;
      var y = marker.getLatLng().lng;
       $('#newlat1').val(x);
       $('#newlon').val(y);
       $('#getloction').removeAttr("disabled");

  });
      mymap.setView(new L.LatLng(data['features'][0]['geometry'].coordinates[1], data['features'][0]['geometry'].coordinates[0]), 8);
      $('#latdiv').html('<div class="col-sm-6"> <strong>lat: </strong>'+data['features'][0]['geometry'].coordinates[1]+'<div><strong>Status: </strong><span class="btn btn-success btn-md mr-2 ml-4"></span>Success</div></div><div class="col-sm-6"> <strong>lon:  </strong>'+data['features'][0]['geometry'].coordinates[0]+' </div>');
      }
    });
  }

  $('#getloction').click(function(){
    getlat = $('#newlat1').val();
    getlon = $('#newlon').val();
    $.getJSON("https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat="+getlat+"&lon="+getlon, function(data) {
      $('#newaddress').html(data['display_name']);
    });
    $('#newlat').html('<div class="col-sm-6 mt-3"><div> Your Fix lat: </div> <strong>lat: </strong>'+getlat+'</div><div class="col-sm-6  mt-3"><div> Your Fix lon: </div> <strong>lon:  </strong>'+getlon+' </div><div class="col-sm-12 mt-2"><b>Address:  </b><span id="newaddress"></span></div>')
  });

  
</script>
</html>
