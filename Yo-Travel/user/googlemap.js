
function loadMap1() {

	var my = {lat:7.8731, lng:80.7718};
    map = new google.maps.Map(document.getElementById('gps_map'), {
      zoom: 7,
      center: my
    });
    let markers = [];
    setInterval(function(){
        var lati = $("#lat").val();
        var long = $("#lng").val();
        var vehical = $("#vehical").val();
        
        if (vehical == '')
        {
          vehical = 'vehical';
        }
        
        const marker = new google.maps.Marker({
          position: new google.maps.LatLng(lati,long),
          
          map: map,
          draggable:false,
          
          
          label: {
            text: vehical,
            color: "#000",
            fontSize: "12px",
          },
        });
      
        markers.push(marker);
        showMarkers();
        
        
    },500);

    setInterval(function(){
      deleteMarkers();
    },1000);
    

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Sets the map on all markers in the array.
  function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  hideMarkers();
  markers = [];
}

// Removes the markers from the map, but keeps them in the array.
function hideMarkers() {
  setMapOnAll(null);
}
}

