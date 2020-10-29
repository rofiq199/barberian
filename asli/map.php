<html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
   <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

   <style>
       #map{ height: 100% }
   </style>
</head>
<body>
    <div id="map"style="width: 600px; height: 400px;" ></div>
    <script>
        var map = L.map('map',{
            center: [-8.19345,113.70704],
            zoom: 15
        });
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([-8.15880,113.72319]).addTo(map)
                    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
                    .openPopup();
        var popup = L.popup();
        function onMapClick(e) {
            popup
		.setLatLng(e.latlng)
		.setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);}
        mymap.on('click', onMapClick);
    </script>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
     integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
     crossorigin=""></script>
</body>
</html>