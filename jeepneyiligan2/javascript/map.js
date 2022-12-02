 // Creating map options

 let map = L.map('map').setView([8.2181, 124.2561], 11);

		mapLink = "<a href='http://openstreetmap.org'>OpenStreetMap</a>";
		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: 'OSM', maxZoom: 18 }).addTo(map);


		//var marker = L.marker([28.2380, 83.9956], { icon: taxiIcon }).addTo(map);


        L.Routing.control({
            waypoints: [
              L.latLng(8.2463, 124.25917),
              L.latLng(8.2435, 124.2605)
            ]
          }).addTo(map);

	
                if(!navigator.geolocation) {
            console.log("Your browser doesn't support geolocation feature!")
        } else {
            setInterval(() => {
                navigator.geolocation.getCurrentPosition(getPosition)
            }, 5000);
        }
    
        let marker, circle; 

        function getPosition(position){
            console.log(position)
            let lat = position.coords.latitude
            let long = position.coords.longitude
            let accuracy = position.coords.accuracy
    
            if(marker) {
                map.removeLayer(marker)
            }
    
          if(circle) {
                map.removeLayer(circle)
            } 
    
            marker = L.marker([lat, long])
           circle = L.circle([lat, long], {radius: accuracy})
    
          let featureGroup = L.featureGroup([marker]).addTo(map)
    
            map.fitBounds(featureGroup.getBounds())
    
           console.log("Your coordinate is: Lat: "+ lat +" Long: "+ long+ " Accuracy: "+ accuracy)
        }
    