<html>
<head>
<title>Distance finder</title>
<meta type="description" content="Find the distance between two places on the map and the shortest route."/>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">

	var location1;
	var location2;
	
	var address1;
	var address2;

	var latlng;
	var geocoder;
	var map;
	
	var distance;
	
	// finds the coordinates for the two locations and calls the showMap() function
	function initialize()
	{
		geocoder = new google.maps.Geocoder(); // creating a new geocode object
		
		// getting the two address values
		address1 = document.getElementById("address1").value;
		address2 = document.getElementById("address2").value;
		
		// finding out the coordinates
		if (geocoder) 
		{
			geocoder.geocode( { 'address': address1}, function(results, status) 
			{
				if (status == google.maps.GeocoderStatus.OK) 
				{
					//location of first address (latitude + longitude)
					location1 = results[0].geometry.location;
				} else 
				{
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
			geocoder.geocode( { 'address': address2}, function(results, status) 
			{
				if (status == google.maps.GeocoderStatus.OK) 
				{
					//location of second address (latitude + longitude)
					location2 = results[0].geometry.location;
					// calling the showMap() function to create and show the map 
					showMap();
				} else 
				{
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}
	}
		
	// creates and shows the map
	function showMap()
	{
		// center of the map (compute the mean value between the two locations)
		latlng = new google.maps.LatLng((location1.lat()+location2.lat())/2,(location1.lng()+location2.lng())/2);
		
		// set map options
			// set zoom level
			// set center
			// map type
		var mapOptions = 
		{
			zoom: 1,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		// create a new map object
			// set the div id where it will be shown
			// set the map options
		map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		// show route between the points
		directionsService = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer(
		{
			suppressMarkers: true,
			suppressInfoWindows: true
		});
		directionsDisplay.setMap(map);
		var request = {
			origin:location1, 
			destination:location2,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) 
		{
			if (status == google.maps.DirectionsStatus.OK) 
			{
				directionsDisplay.setDirections(response);
				distance = "The distance between the two points on the chosen route is: "+response.routes[0].legs[0].distance.text;
				distance += "<br/>The aproximative driving time is: "+response.routes[0].legs[0].duration.text;
				document.getElementById("distance_road").innerHTML = distance;
			}
		});
		
		// create the markers for the two locations		
		var marker1 = new google.maps.Marker({
			map: map, 
			position: location1,
			title: "Pickup Location"
		});
		var marker2 = new google.maps.Marker({
			map: map, 
			position: location2,
			title: "Destination"
		});
		
		// create the text to be shown in the infowindows
		var text1 = '<div id="content">'+
				'<h1 id="firstHeading">Pickup Location</h1>'+
				'<div id="bodyContent">'+
				'<p>Coordinates: '+location1+'</p>'+
				'<p>Address: '+address1+'</p>'+
				'</div>'+
				'</div>';
				
		var text2 = '<div id="content">'+
			'<h1 id="firstHeading">Destination</h1>'+
			'<div id="bodyContent">'+
			'<p>Coordinates: '+location2+'</p>'+
			'<p>Address: '+address2+'</p>'+
			'</div>'+
			'</div>';
		
		// create info boxes for the two markers
		var infowindow1 = new google.maps.InfoWindow({
			content: text1
		});
		var infowindow2 = new google.maps.InfoWindow({
			content: text2
		});

		// add action events so the info windows will be shown when the marker is clicked
		google.maps.event.addListener(marker1, 'click', function() {
			infowindow1.open(map,marker1);
		});
		google.maps.event.addListener(marker2, 'click', function() {
			infowindow2.open(map,marker1);
		});
		
	}
	
	function toRad(deg) 
	{
		return deg * Math.PI/180;
	}
</script>

</head>

<body bgcolor="#eeeeee">
	<div id="form" style="width:30%; height:20%">
		<table align="leftr" valign="left">
			<tr>
				<td colspan="7" align="left"><b>Calculate Fare</b></td>
			</tr>
			<tr>
				<td colspan="7">&nbsp;</td>
			</tr>
			<tr>
				<td>Pickup Location:</td>
				<td>&nbsp;</td>
				<td><input type="text" name="address1" id="address1" size="40"/></td>
				<td>&nbsp;</td>
            </tr>
            <tr>
				<td>Destination:</td>
				<td>&nbsp;</td>
				<td><input type="text" name="address2" id="address2" size="40"/></td><td colspan="7">&nbsp;</td><td colspan="7" align="center"><input type="button" value="Calculate" onclick="initialize();"/></td>
			</tr>
		</table>
		</div>
		
    <left><div id="map_canvas" style="width:35%; height:350px"></div></left>   
	<left><div style="width:100%; height:10%" id="distance_road"></div></left>
</body>
</html>