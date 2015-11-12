/*
 * Eng. Marlon Ulate Caruzo.
 * March 2015
 * 
 * 
 */

/* Global Variables */
var map;
var markers = [];
var infoWindow;
var locationSelect;
var radius = 500;// default radius distance in milles
var mapContainerWidth = 0;
var mapContainerHeight = 0;
var address;

var breakpoint_mobile = '320px';
var breakpoint_mobile_max = '768px';
var media_query = "screen and (min-width: " + breakpoint_mobile + ") and (max-width: " + breakpoint_mobile_max + ")";
var isMobile;

$(document).ready(function() {
	//Handler for .ready() called.
	isMobile = window.matchMedia && window.matchMedia(media_query).matches;
	//if(isMobile)
	//{
	     //getLocation();
	     //setAsMobile();
	//}else
	//{
	    google.maps.event.addDomListener(window, 'load', initialize);
	    mapContainerWidth = 624;
	    mapContainerHeight = 655;
	    if($(window).width() <= 1024)
	    {
	        mapContainerWidth = "43%";
	    }
	    if($(window).width() <= 768)
        {
            mapContainerWidth = "100%";
        }
	//}
	
	google.maps.event.addDomListener(window, "resize", function() {
    	 var center = map.getCenter();
    	 google.maps.event.trigger(map, "resize");
    	 map.setCenter(center); 
	
	     $("#map").width(mapContainerWidth);
	     $("#map").height(mapContainerHeight);	
	 });	
	 //Resize map on document ready
	 $("#map").width(mapContainerWidth);
	 $("#map").height(mapContainerHeight);
	 
	 addDropDown();
	 configInputField();
	 isMobile = window.matchMedia && window.matchMedia(media_query).matches;
	 
	 addFindFormEvents();
});

/* Google Maps Initialize Implementation 
 * More Info about API Version 3 at https://developers.google.com/maps/web/ 
 */

function initialize() {
   map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(40, -100),
    zoom: 4,
    mapTypeId: 'roadmap',
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
  });
  infoWindow = new google.maps.InfoWindow();

  locationSelect = document.getElementById("locationSelect");
  locationSelect.onchange = function() {
    var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
    if (markerNum != "none"){
      google.maps.event.trigger(markers[markerNum], 'click');
        }
      };
      
      if(isMobile)
      {
         getLocation();
         //setAsMobile();
      }
}

function addFindFormEvents()
{
    $("#findForm").submit(function( event ) {
        // Stop form from submitting normally
        event.preventDefault();
        // Get some values from elements on the page:
        var $form = $(this);
        searchLocations();
    });
}

function searchLocations() {
    
   if(!isMobile)
    {
        address = document.getElementById("addressInput").value;
    }
 //address = document.getElementById("addressInput").value;
 var geocoder = new google.maps.Geocoder();
 geocoder.geocode({address: address}, function(results, status) {
 console.log(">>>>>> " + address + " >>>>>> " + status);
 if (status == google.maps.GeocoderStatus.OK) {
    locateAddress(results);
   } else {
     alert(address + ' not found');
     }
  });
}
   
function locateAddress(results){
var addr = {};
if (results.length >= 1) {
for (var ii = 0; ii < results[0].address_components.length; ii++)
{
var street_number = route = street = city = state = zipcode = country = formatted_address = '';
var types = results[0].address_components[ii].types.join(",");
if (types == "street_number"){
    addr.street_number = results[0].address_components[ii].long_name;
}
if (types == "route" || types == "point_of_interest,establishment"){
    addr.route = results[0].address_components[ii].long_name;
}
if (types == "sublocality,political" || types == "locality,political" || types == "neighborhood,political" || types == "administrative_area_level_3,political"){
addr.city = (city == '' || types == "locality,political") ? results[0].address_components[ii].long_name : city;
}
if (types == "administrative_area_level_1,political"){
    addr.state = results[0].address_components[ii].short_name;
}
if (types == "postal_code" || types == "postal_code_prefix,postal_code"){
    addr.zipcode = results[0].address_components[ii].long_name;
}
if (types == "country,political"){
        addr.country = results[0].address_components[ii].long_name;
    }
}
    addr.success = true;
    for (name in addr)
    {
        console.log('### google maps api ### ' + name + ': ' + addr[name] );
    }
    response(addr);
    searchLocationsNear(results[0].geometry.location);
    } else 
    {
        response({success:false});
    }
   }
   
function response(obj)
{
	console.log(obj);
}

function clearLocations() {
	infoWindow.close();
	for (var i = 0; i < markers.length; i++) 
	{
		markers[i].setMap(null);     
	}
	    markers.length = 0;
	
	    locationSelect.innerHTML = "";
	 	var option = document.createElement("option");
	 	option.value = "none";
	 	option.innerHTML = "See all results:";
	    locationSelect.appendChild(option);
	    $(".results").empty();
}

function searchLocationsNear(center) {
	 clearLocations();
	 //var radius = document.getElementById('radiusSelect').value;
	 console.log("Result from Google Maps " + center.lat() + " >> " + center.lng() + " >> " + radius);
	 var center = new google.maps.LatLng(center.lat(), center.lng());
	 map.panTo(center);
	 //Put the marker/pin
	 var marker = new google.maps.Marker({
	  position: center,
	  map: map,
	  title: 'Hello World!'
	});

 var searchUrl = 'php/search-genxml.php?latitude=' + center.lat() + '&longitude=' + center.lng() + '&radius=' + radius;
 downloadUrl(searchUrl, function(data) {
   var xml = parseXml(data);
   var markerNodes = xml.documentElement.getElementsByTagName("physician");
   var bounds = new google.maps.LatLngBounds();
   if(markerNodes.length > 0){
       $(".results").empty();
       for (var i = 0; i < markerNodes.length; i++) {
         var company = markerNodes[i].getAttribute("company");
         var firstname = markerNodes[i].getAttribute("firstname");
         var lastname = markerNodes[i].getAttribute("lastname");
         var name = firstname + " " + lastname;
         var address = markerNodes[i].getAttribute("address");
         var city = markerNodes[i].getAttribute("city");
         var phone = markerNodes[i].getAttribute("phone");
         var distance = parseFloat(markerNodes[i].getAttribute("distance"));
         var latlng = new google.maps.LatLng(
              parseFloat(markerNodes[i].getAttribute("lat")),
              parseFloat(markerNodes[i].getAttribute("lng")));

         createOption(company, name, address, phone, distance, i);
         createMarker(latlng, company, name, address, city);
         bounds.extend(latlng);
       }      
        map.fitBounds(bounds);
         $('.scroll-pane').jScrollPane({showArrows: false,verticalDragMinHeight: 40,verticalDragMaxHeight: 40, contentWidth: '0px'});
        //locationSelect.style.visibility = "visible";
   }
  
   /*locationSelect.onchange = function() {
     var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
     google.maps.event.trigger(markers[markerNum], 'click');
   };*/
  });
}

function createMarker(latlng, company, name, address, city) {
  var html = "<b>" + company + "<br/>" + name + "</b> <br/>" + address + "<br/>" + city;
  var marker = new google.maps.Marker({
    map: map,
    position: latlng
  });
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
  markers.push(marker);
}

function createOption(company, name, address, phone, distance, num) {
  /*var option = document.createElement("option");
  option.value = num;
  option.innerHTML = name + "(" + distance.toFixed(1) + ")";
  locationSelect.appendChild(option);*/
  num++;
  var option = "<div class='result'><span class='arrow'></span><span class='index'>" + num + "</span><div class='info'><p>"+ company +"</p><p>"+ name +"</p><p>"+ address +"</p><p>" + phone + "</p><p>" + distance.toFixed(1) + " milles</p></div></div>";
  $(".results").append(option);
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request.responseText, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

function parseXml(str) {
  if (window.ActiveXObject) {
    var doc = new ActiveXObject('Microsoft.XMLDOM');
    doc.loadXML(str);
    return doc;
  } else if (window.DOMParser) {
    return (new DOMParser).parseFromString(str, 'text/xml');
  }
}

function doNothing() {}

/*Bootstrap Component DropDown*/
function addDropDown()
{
	 $( document.body ).on( 'click', '.dropdown-menu li', function( event ) {
      var $target = $( event.currentTarget );
      //console.log($target.attr("value"))
      radius = $target.attr("value");
      $target.closest( '.btn-group' )
         .find( '[data-bind="label"]' ).text( $target.text() )
            .end()
         .children( '.dropdown-toggle' ).dropdown( 'toggle' );
      return false;
   });
}

function configInputField()
{
    var defaultValue = "What is your zip code?";
    $("#addressInput").val(defaultValue);
    
    $("#addressInput").focus(function(){
        var currentValue = $(this).val(); 
            if(currentValue === defaultValue)
            {
                 $(this).val("");
                 //(this).css("color","#363737");
            }
    });
    $("#addressInput").blur(function(){
        var currentValue = $(this).val();
        if(currentValue === "")
        {
          $(this).val(defaultValue);
        }
    });
}


/*********** Mobile Geolocation ************/

//Get current Location Mobile or desktop computer in a LAN
//See more documentation W3C http://www.w3schools.com/html/html5_geolocation.asp

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    var latlon = new google.maps.LatLng(lat, lon);
    
    getAddressFromLatLang(lat, lon);
    
    map = new google.maps.Map(document.getElementById("map"), {
    center:latlon,
    zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    });
     //infoWindow = new google.maps.InfoWindow();
    //var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
    createMarker(latlon,"", "You are here !","","");
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

function setAsMobile()
{
    
}


function getAddressFromLatLang(lat,lng){
        console.log("Entering getAddressFromLatLang()");
        var geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(lat, lng);
        geocoder.geocode( { 'latLng': latLng}, function(results, status) {
            //console.log("After getting address");
            //console.log(results);
            if (status == google.maps.GeocoderStatus.OK) 
            {
                if (results[1]) 
                {
                    console.log(results[1]);
                    //alert(results[1].formatted_address);
                    $(".current-location span").text(results[1].formatted_address);
                    address = results[1].formatted_address;
                }
            }else{
                //alert("Geocode was not successful for the following reason: " + status);
            }
        });
}

