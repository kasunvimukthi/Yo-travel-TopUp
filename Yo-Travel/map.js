      // Initialize and add the map
      function loadMap(){
        // The location of Uluru
        var colombo  = { lat: 6.9271, lng: 79.8612 };
        // The map, centered at Uluru
        var map = new google.maps.Map(
          document.getElementById("map"),
          {
            zoom: 10,
            center: colombo,
          }
        );
      
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({
          position: colombo,
          map: map,
        });
      }