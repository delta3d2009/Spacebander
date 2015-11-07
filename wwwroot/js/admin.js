/*
 * Eng. Marlon Ulate Caruzo.
 * March 2015
 * 
 * 
 */

/* Global Variables */

var countryLocation = "United States";
var stateLocation = "";
var isUS = true;
var fullLocation = "";
var locationLat = 0.0;
var locationLng = 0.0;
var map;
var currentTab = "";

$(document).ready(function() {
	//Handler for .ready() called.
	if(!$(document.body).hasClass("body-iframe") && !$(document.body).hasClass("body-results") )//If Document is not the iframe
	{
		addDashboardTabs();
		addDropDownCountries();
		addDropDownStates();
		addDropDownPageSize();
		addEventsInsertForm();
		addEventsSearchForm();
		configSearchForm();
		configModal();
		addEventsExcelForm();
		configRadioButtons();
	}
});

/*$(window).on('beforeunload', function ()
{
    console.log("Exit from Site. Closing Session.");
});*/

$(window).unload(function () {
    //console.log("Exit from Site. Closing Session. " + event);
});

/*Bootstrap Component Nav Tabs*/
function addDashboardTabs()
{
	$('#tabs').tab();
	 // Change hash for page-reload
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	 currentTab = e.target.hash.replace('#', '');
	 window.location.hash = currentTab;
	 $( document ).scrollTop( 0 );
	 //e.relatedTarget // previous active tab  
	});
	
	var url = window.location.hash;
	if (url.match('#')) 
	{
	   	$("#tabs a[href='" + window.location.hash + "']").tab("show"); // Select tab by name
	}
}

/*Bootstrap Component DropDown
 *For the Add Physician Panel
 * */
function addDropDownCountries()
{
	$( document.body ).on( 'click', '#btn-countries .dropdown-menu li', function( event ) {
      var $target = $( event.currentTarget );
      //console.log($target.attr("value"))
      //countryLocation = $target.attr("value");
      //$(this).closest( '.btn-group' ).find( '[data-bind="label"]' ).text( countryName );
      countryLocation = $target.find("a").text();
      if(countryLocation != "United States")
      {
          $("#insertForm #btn-states").hide();
          //$("#insertForm").find("input[name='state']").show();
      }else
      {
          $("#insertForm #btn-states").show();
          //$("#insertForm").find("input[name='state']").hide();
      }
      searchLocations(fullLocation);
      $target.closest( '.btn-group' )
         .find( '[data-bind="label"]' ).text( $target.text() )
            .end()
         .children( '.dropdown-toggle' ).dropdown( 'toggle' );
      return false;
   });
   $("#insertForm #btn-countries .dropdown-menu li a").closest( '.btn-group' ).find( '[data-bind="label"]' ).text( countryLocation );
   //$("#insertForm").find("input[name='state']").hide();
}

function addDropDownStates()
{
    $( document.body ).on( 'click', '#btn-states .dropdown-menu li', function( event ) {
      var $target = $( event.currentTarget );
      stateLocation = $target.find("a").text();
      $("#insertForm").find("input[name='state']").val(stateLocation);
      searchLocations(fullLocation);
      //$("label[for='state']") add the both following lines to restart error label over drop down states
      $("#state-error").hide();
      $("input#state").removeClass("error");
      $target.closest( '.btn-group' )
         .find( '[data-bind="label"]' ).text( $target.text() )
            .end()
         .children( '.dropdown-toggle' ).dropdown( 'toggle' );
      return false;
   });
}

function addEventsInsertForm()
{
	$("#insertForm").validate({
		rules: {
		    mediccompany: {
                required: true,
                minlength: 2
            },
			medicfirstname: {
				required: true,
				minlength: 2
			},
			mediclastname: {
                required: true,
                minlength: 2
            },
			address: {
				required: true,
				minlength: 5
			},
			suite: {
                required: false,
                minlength: 5
            },
			city: {
				required: true,
				minlength: 2
			},
			state: {
				required: true,
				minlength: 2
			},
			zip: {
				required: true,
				minlength: 1
			},
			phone: {
				required: true,
				minlength: 7
			},
			cell: {
                required: false,
                minlength: 7
            },
			email: {
				required: true,
				email: true
			},
			fax: {
                required: false,
                minlength: 7
            },
			office: {
                required: true,
                minlength: 2
            }
		},
		messages: {
		    company: {
                required: "This field is required.",
                minlength: "Names must be at least 2 characters."
            },
			medicfirstname: {
				required: "This field is required.",
				minlength: "Names must be at least 2 characters."
			},
			mediclastname: {
                required: "This field is required.",
                minlength: "Names must be at least 2 characters."
            },
			address: {
				required: "This field is required.",
				minlength: "Address must be at least 5 characters."
			},
			suite: {
                required: "This field is required.",
                minlength: "Suite Number must be at least 5 characters."
            },
			city: {
				required: "This field is required.",
				minlength: "City must be at least 2 characters."
			},
			state: {
				required: "This field is required.",
				minlength: "State must be at least 2 characters."
			},
			zip: {
				required: "This field is required.",
				minlength: "Zip must be at least 5 characters."
			},
			phone: {
				required: "This field is required.",
				minlength: "Phones must be at least 7 characters."
			},
			cell: {
                required: "This field is required.",
                minlength: "Phones must be at least 7 characters."
            },
            fax: {
                required: "This field is required.",
                minlength: "Phones must be at least 7 characters."
            },
			email: "Please enter a valid e-mail address.",
			office: {
                required: "This field is required.",
                minlength: "Web must be at least 2 characters."
            }
		},
		 submitHandler: function(form) {
			//var posting = $.post("php/insertPhysician.php", $("#insertForm").serialize());
			var $form = $("#insertForm");
			company = $form.find("input[name='mediccompany']").val();
			firstname = $form.find("input[name='medicfirstname']").val();
			lastname = $form.find("input[name='mediclastname']").val();
			address = $form.find("input[name='address']").val();
			suite = $form.find("input[name='suite']").val();
			city = $form.find("input[name='city']").val();
			state = $form.find("input[name='state']").val();
			zip = $form.find("input[name='zip']").val();
			country = countryLocation;
			phone = $form.find("input[name='phone']").val();
			cell = $form.find("input[name='cell']").val();
			email = $form.find("input[name='email']").val();
			fax = $form.find("input[name='fax']").val();
			office = $form.find("input[name='office']").val();
			lat = locationLat;
			lng = locationLng;
			var posting = $.post("php/insertPhysician.php", {company:company, firstname:firstname, lastname:lastname, address:address, suite:suite, city:city, state:state, zip:zip, country:country, phone:phone, cell:cell, email:email, fax:fax, office:office, lat:lat, lng:lng});
			posting.done(function( data ) {
				//showThankYouMessage();
				$( "#output" ).empty().append(data);
				showModal("Physician sucessfully registered.","Physician information was saved into Data Base.","For Searching, Editing or Removing use other tabs.");
			});
			posting.fail(function( data ) {
				//showThankYouMessage();
			});
		}
	});	
	
	$( "button:reset" ).on( 'click', function( event ) {
		resetInsertForm();
	});
	
	$("#medicname, #address, #city, #zip, #state").keydown(function() {
		fullLocation = $("#insertForm").find("input[name='mediccompany]").val() + " " + $("#insertForm").find("input[name='medicfirstname']").val() + " " + $("#insertForm").find("input[name='mediclastname']").val() + " " + $("#insertForm").find("input[name='address']").val() + " " + $("#insertForm").find("input[name='city']").val() + " " + $("#insertForm").find("input[name='zip']").val() + " " + $("#insertForm").find("input[name='state']").val() + " " + countryLocation;
		//console.log(fullLocation);
		searchLocations(fullLocation);
	});
	
	initMap();
}

function addEventsUpdateForm(iframe)
{
    var form = $(iframe).find("#updateForm");
    $(form).validate({
        rules: {
            mediccompany: {
                required: true,
                minlength: 2
            },
            medicfirstname: {
                required: true,
                minlength: 2
            },
            mediclastname: {
                required: true,
                minlength: 2
            },
            address: {
                required: true,
                minlength: 5
            },
            suite: {
                required: true,
                minlength: 5
            },
            city: {
                required: true,
                minlength: 2
            },
            state: {
                required: true,
                minlength: 2
            },
            zip: {
                required: true,
                minlength: 1
            },
            phone: {
                required: true,
                minlength: 7
            },
            cell: {
                required: true,
                minlength: 7
            },
            fax: {
                required: true,
                minlength: 7
            },
            email: {
                required: true,
                email: true
            },
            office: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            company: {
                required: "This field is required.",
                minlength: "Names must be at least 2 characters."
            },
            medicfirstname: {
                required: "This field is required.",
                minlength: "Names must be at least 2 characters."
            },
            mediclastname: {
                required: "This field is required.",
                minlength: "Names must be at least 2 characters."
            },
            address: {
                required: "This field is required.",
                minlength: "Address must be at least 5 characters."
            },
            suite: {
                required: "This field is required.",
                minlength: "Address must be at least 5 characters."
            },
            city: {
                required: "This field is required.",
                minlength: "City must be at least 2 characters."
            },
            state: {
                required: "This field is required.",
                minlength: "State must be at least 2 characters."
            },
            zip: {
                required: "This field is required.",
                minlength: "Zip must be at least 5 characters."
            },
            phone: {
                required: "This field is required.",
                minlength: "Phones must be at least 7 characters."
            },
            cell: {
                required: "This field is required.",
                minlength: "Phones must be at least 7 characters."
            },
            fax: {
                required: "This field is required.",
                minlength: "Phones must be at least 7 characters."
            },
            email: "Please enter a valid e-mail address.",
            office: {
                required: "This field is required.",
                minlength: "Web must be at least 2 characters."
            }
        },
         submitHandler: function(form) {
            //var posting = $.post("php/insertPhysician.php", $("#insertForm").serialize());
            var $form = $(iframe).find("#updateForm");
            id = $form.attr("physicianid");
            company = $form.find("input[name='company']").val();
            firstname = $form.find("input[name='medicfirstname']").val();
            lastname = $form.find("input[name='mediclastname']").val();
            address = $form.find("input[name='address']").val();
            suite = $form.find("input[name='suite']").val();
            city = $form.find("input[name='city']").val();
            state = $form.find("input[name='state']").val();
            zip = $form.find("input[name='zip']").val();
            //country = $form.find(".dropdown-menu li a").text();
            country =  $form.find("#btn-countries .dropdown-menu li a").closest( '.btn-group' ).find( '[data-bind="label"]' ).text();
            phone = $form.find("input[name='phone']").val();
            cell = $form.find("input[name='cell']").val();
            fax = $form.find("input[name='fax']").val();
            email = $form.find("input[name='email']").val();
            office = $form.find("input[name='office']").val();
            //console.log( id + company + firstname + lastname + address + city + state + zip + country + phone + email + office + web);
            var posting = $.post("php/editPhysician.php", {id:id, company:company, firstname:firstname, lastname:lastname, address:address, suite:suite, city:city, state:state, zip:zip, country:country, phone:phone, cell:cell, fax:fax, email:email, office:office});
            posting.done(function( data ) {
                //showThankYouMessage();
                //$form.find( "#output" ).empty().append(data);
                showModal("Physician sucessfully updated.","Physician information was saved into Data Base.","For Searching, Editing or Removing use other tabs.");
                closeIframe();
            });
            posting.fail(function( data ) {
                //showThankYouMessage();
            });
        }
    }); 
    
}

function addEventsSearchForm()
{
    $("#searchForm").validate({
        rules: {
            parameter: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            parameter: {
                required: "This field is required.",
                minlength: "Search Parameter must be at least 2 characters."
            }
        },
         submitHandler: function(form) {
            var $form = $("#searchForm");
            parameter = $form.find("input[name='parameter']").val();
            window.location.href = "searchResults.php?parameter=" + parameter;
            /*var posting = $.post("php/filterPhysicians.php", {parameter:parameter});
            posting.done(function( data ) {
                //showThankYouMessage();
            });
            posting.fail(function( data ) {
                //showThankYouMessage();
            });*/
        }
    }); 
}

function configSearchForm()
{
    var defaultValue = "SEARCH...";
    $("#parameter").val(defaultValue);
    
    $("#parameter").focus(function(){
        var currentValue = $(this).val(); 
            if(currentValue === defaultValue)
            {
                 $(this).val("");
                 //(this).css("color","#363737");
            }
    });
    $("#parameter").blur(function(){
        var currentValue = $(this).val();
        if(currentValue === "")
        {
          $(this).val(defaultValue);
        }
    });
}

function resetInsertForm()
{
	$( "#btn-countries button span:first-child" ).text("United States");
	$( "#btn-states button span:first-child" ).text("Select State");
	$( "label.error" ).hide();
	$( "#insertForm input.error" ).css("border-color","#cccccc");
	$( "#insertForm input:text" ).val("");
	$( "#insertForm #email").val("");
	$( "#output" ).empty();
	initialize();
}

/*Reset all the fields in Update Form*/

function resetUpdateForm(iframe)
{
    $(iframe).find("#updateForm #btn-countries button span:first-child" ).text($(iframe).find("#updateForm").attr("physicianCountry"));
    $(iframe).find("#updateForm #btn-states button span:first-child" ).text($(iframe).find("#updateForm").attr("physicianState"));
    $("#updateForm label.error" ).hide();
    $("#updateForm input.error" ).css("border-color","#cccccc");
    $("#updateForm input:text" ).val("");
    $("#updateForm #email").val("");
    $("#updateForm #output" ).empty();
}

function  closeIframe()
{
    $("#modal-screen iframe").remove();
    setTimeout(function(){ $('#modal-screen').modal('hide');}, 3000);
    setTimeout(function(){ window.location.reload();}, 5000);
}

/*Bootstrap Interstitial Modal Window*/
function showModal(title, p1, p2)
{
	$('#modal-screen').modal('show');
	$('#modal-screen .modal-header').text(title);
	$('#modal-screen p:first-child').text(p1);
	$('#modal-screen p:last-child').text(p2);
	$('#modal-screen p').show();
}

function configModalForm(id)
{
	showModal("Edit Physician","","");
	$('#modal-screen p').hide();
	$('#modal-screen .modal-footer button').text("Close");
	$('#modal-screen .modal-footer .btn-green').hide();
	$('#modal-screen .modal-body iframe').remove();
	$('#modal-screen .modal-dialog').width(850);
$('<iframe />');
    $('<iframe />', {
        name: 'update',
        id: 'update',
        src: 'updatePhysician.php?id='+id
    }).appendTo('#modal-screen .modal-body');
    
    	 $("#update").load(function(){
    	 	addDropDownCountriesIframe($(this).contents().find('body'));
    	 	addDropDownStatesIframe($(this).contents().find('body'));
    	 	addClickEventsIframe($(this).contents().find('body')); 
    	 	addEventsUpdateForm($(this).contents().find('body'));
          });
}

/*Bootstrap Component DropDown
 *For the Update/Edit Physician Panel
 * */
function addDropDownCountriesIframe(iframe)
{
	 $( iframe ).on( 'click', '#btn-countries .dropdown-menu li', function( event ) {
      var $target = $( event.currentTarget );
      
      $target.closest( '.btn-group' )
         .find( '[data-bind="label"]' ).text( $target.text() )
            .end()
         .children( '.dropdown-toggle' ).dropdown( 'toggle' );
      //return false;
   });
}

function addDropDownStatesIframe(iframe)
{
     $( iframe ).on( 'click', '#btn-states .dropdown-menu li', function( event ) {
      var $target = $( event.currentTarget );
      //alert($target.find("a").text() + " >>> " +  $( iframe ).find("#updateForm input#state").val());
      var stateSelected = $target.find("a").text();
      $( iframe ).find("#updateForm input#state").val(stateSelected);
      //$( iframe ).find("#updateForm input#state").show();
      
      $target.closest( '.btn-group' )
         .find( '[data-bind="label"]' ).text( $target.text() )
            .end()
         .children( '.dropdown-toggle' ).dropdown( 'toggle' );
      //return false;
   });
}

/*Update Iframe - Form value per DataBase received information*/
function adjustUpdateIframe(formID, countryName, stateName)
{
	//Set the country
 	$("#updateForm #btn-countries .dropdown-menu li a").each(function(){
		if($(this).text() == countryName){
		 	$(this).closest( '.btn-group' ).find( '[data-bind="label"]' ).text( countryName );
		}	
	});
	//Set the state
    $("#updateForm #btn-states .dropdown-menu li a").each(function(){
        if($(this).text() == stateName){
            $(this).closest( '.btn-group' ).find( '[data-bind="label"]' ).text( stateName );
        }   
    });
    
	//set Physician ID to Form
	$("form#updateForm").attr("PhysicianID", formID);
	//set Physician State to Form
    $("form#updateForm").attr("PhysicianState", stateName);
    //set Physician Country to Form
    $("form#updateForm").attr("PhysicianCountry", countryName);
	
	if(countryName === "United States")
	{
	     $("#updateForm #btn-states").show();
         $("#updateForm").find("input[name='state']").hide();    
     }else
     {
          $("#updateForm #btn-states").hide();
          $("#updateForm").find("input[name='state']").show();
          alert($("#updateForm").find("input[name='state']").val());
     }
}

/*Handling Click Events Update Physician Form*/
function addClickEventsIframe(iframe)
{
	$(iframe).find(":reset").on("click", function(event){
		resetUpdateForm(iframe);
	});
}

function configModal()
{
	$('#modal-screen').on('hidden.bs.modal', function (e) {
  		resetInsertForm();
	});
}

function configModalRemove(id)
{
	showModal("Remove Physician","Are You Sure you want to remove this Physician ?","");
	$('#modal-screen .modal-footer .btn-orange').text("No");
	$('#modal-screen .modal-footer .btn-green').text("Yes");
    $('#modal-screen .modal-footer .btn-green').show();
	$('#modal-screen .modal-footer .btn-primary').show();
	$('#modal-screen .modal-body iframe').remove();
	$('#modal-screen .modal-body p').show();
	addEventClickRemove(id);
}

function addEventClickRemove(id)
{
	$( "#modal-screen .modal-footer .btn-green" ).on( 'click', function( event ) {
		var posting = $.post("php/removePhysician.php", {id:id});
		posting.done(function( data ) {
			$('#modal-screen .modal-footer .btn-orange').text("OK");
			$('#modal-screen .modal-footer .btn-green').hide();
			if(parseInt(data) != 0)
			{
				showModal("Remove Physician", "Physician was Removed.","");
				
			}else
			{
				showModal("Remove Physician", "We cannot remove the Physician at this moment. ","Please try again later");
			}
		});
		posting.fail(function( data ) {
			//showThankYouMessage();
		});
		
		$("#modal-screen").on('hide.bs.modal', function (e) {
  			window.location.reload();
		});
	});
}

function addEventsExcelForm(){
	$("#excelForm").submit(function( event ) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this);
		var selectedVal = "";
		var selected = $form.find("input[type='radio']:checked");
		if (selected.length > 0) {
		    tableName = selected.val();
		    window.open("php/create-spreadsheet.php?table=" + tableName);
		}
		//var posting = $.post("php/create-spreadsheet.php", {table:tableName});
		//posting.done(function( data ) {
			//$( "#output" ).empty().append(data);
		//});
	});
}

/*Radio buttons and checkboxes plugin http://screwdefaultbuttons.com/*/
function configRadioButtons()
{
    $('input:radio').screwDefaultButtons({
        image: 'url("img/desktop/sprite-radio-buttons.png")',
        width: 24,
        height: 24
    });
}

// copyright 1999 Idocs, Inc. http://www.idocs.com
// Distribute this script freely but keep this notice in place
function numbersonly(myfield, e, dec)
{
	var key;
	var keychar;
	
	if (window.event)
	   key = window.event.keyCode;
	else if (e)
	   key = e.which;
	else
	   return true;
	keychar = String.fromCharCode(key);
	
	// control keys
	if ((key==null) || (key==0) || (key==8) || 
	    (key==9) || (key==13) || (key==27) )
	   return true;
	
	// numbers
	else if ((("0123456789").indexOf(keychar) > -1))
	   return true;
	
	// decimal point jump
	else if (dec && (keychar == "."))
	   {
	   myfield.form.elements[dec].focus();
	   return false;
	   }
	else
	   return false;
}


/* Google Maps Initialize Implementation 
 * More Info about API Version 3 at https://developers.google.com/maps/web/ 
 */

function initialize() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(40, -100),
    zoom: 3,
    mapTypeId: 'roadmap',
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
  });
}

function initMap() {
    //Handler for .ready() called.
    google.maps.event.addDomListener(window, 'load', initialize);
    google.maps.event.addDomListener(window, "resize", function() {
     var center = map.getCenter();
     google.maps.event.trigger(map, "resize");
     map.setCenter(center); 
    
     $("#map").width($("#insertForm").width());
     $("#map").height($("#insertForm input").height() * 9); }); 
     //Resize map on document ready
     $("#map").width($("#insertForm").width());
     $("#map").height($("#insertForm input").height() * 9);
}


function searchLocations(address) {
 var geocoder = new google.maps.Geocoder();
 geocoder.geocode({address: address}, function(results, status) {
 //console.log(">>>>>> " + address + " >>>>>> " + status)
 if (status == google.maps.GeocoderStatus.OK) {
    locateAddress(results);
   } else {
     //alert(address + ' not found');
     }
  });
}

function locateAddress(results){
    var center = results[0].geometry.location;
    var center = new google.maps.LatLng(center.lat(), center.lng());
    //console.log(results[0])
    locationLat = center.lat();
    locationLng = center.lng();
    
    var arrAddress = results[0].address_components;
    var itemRoute = '';
    var itemLocality = '';
    var itemCountry = '';
    var itemCity = '';
    var itemState = '';
    var itemZip = '';
    var itemStreetnumber = '';
    var itemStreet = '';
    
    // iterate through address_component array
    $.each(arrAddress, function (i, address_component) {
        //console.log('address_component:'+i);
    
        if (address_component.types[0] == "route"){
            itemRoute = address_component.long_name;
        }
    
        if (address_component.types[0] == "locality"){
            itemLocality = address_component.long_name;
        }
        if (address_component.types[0] == "country"){ 
            itemCountry = address_component.long_name;
        }
        if (address_component.types[0] == "sublocality"){
            itemCity = address_component.long_name;
        }
        if (address_component.types[0] == "neighborhood"){
            itemCity = address_component.long_name;
        }
        if (address_component.types[0] == "administrative_area_level_3"){
            itemCity = abddress_component.long_name;
        }
        if (address_component.types[0] == "city"){
            itemCity = address_component.long_name;
        }
        if (address_component.types[0] == "postal_code_prefix"){ 
            itemPc = address_component.long_name;
        }
        if (address_component.types[0] == "street_number"){ 
            itemStreetnumber = address_component.long_name;
        }
        if (address_component.types[0] == "postal_code"){
            itemZip = address_component.long_name;
        }
        if (address_component.types[0] == "administrative_area_level_1"){
            itemState = address_component.short_name;
        }
        //return false; // break the loop   
        
        //console.log("Address : " + itemStreetnumber + " " + itemRoute + " Town : " + itemLocality + " Country : " + itemCountry + " City : " + itemCity + " Zip : " + itemZip + " State " + itemState);
    });
    
    //Move the map to located address
    map.panTo(center);
    map.setZoom(12);
     //Put the marker/pin
     var marker = new google.maps.Marker({
      position: center,
      map: map,
      title: 'Click to set this Address'
    });
    
    var infoWindow = new google.maps.InfoWindow();
    var html = "<div id='customInfoWindow'><p>" + itemStreetnumber + " " + itemRoute + "<p>" + itemLocality + ", " + itemState + " " + itemZip + "</p>" + "<p>" + itemCountry + "</p><a href='#' onClick='return false;'>Use This</a></div>";
    
    google.maps.event.addListener(marker, 'click', function() {
        
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
        
        $("#customInfoWindow a").on( 'click', function( event ) {
            setLocationIntoForm(itemStreetnumber, itemRoute, itemLocality, itemCountry, itemCity, itemZip, itemState);
        });
    });
}

function setLocationIntoForm(itemStreetnumber, itemRoute, itemLocality, itemCountry, itemCity, itemZip, itemState)
{
    console.log("Address : " + itemStreetnumber + " " + itemRoute + " Town : " + itemLocality + " Country : " + itemCountry + " City : " + itemCity + " Zip : " + itemZip + " State " + itemState);
    var $form = $("#insertForm");
    if(itemRoute == "")
    {
        $form.find("input[name='address']").val(itemLocality);
    }else
    {
        $form.find("input[name='address']").val(itemStreetnumber + " " + itemRoute);
    }
    if(itemCity == "")
    {
        $form.find("input[name='city']").val(itemLocality);
    }else
    {
        $form.find("input[name='city']").val(itemCity);
    }
    if(itemZip == "")
    {
        $form.find("input[name='zip']").val("0");
    }else
    {
        $form.find("input[name='zip']").val(itemZip);
    }
    $form.find("input[name='state']").val(itemState);
    $( "#btn-countries button span:first-child" ).text(itemCountry);
}

function addDropDownPageSize()
{
    $( document.body ).on( 'click', '#btn-pagesize .dropdown-menu li', function( event ) {
      var $target = $( event.currentTarget );
      //event.preventDefault();
      // $target.find("a").text();
      //console.log();
     // app.controller('customersCrtl', function ($scope){
         // $scope.entryLimit = $target.find("a").text();
      //});
      
      /*angular.module('SpacebanderApp').controller('add', ['$scope',function($scope) {
           $scope.entryLimit = 32;
    }]);*/
   
   /*var scope = angular.element($("#outer")).scope();
    scope.$apply(function(){
        scope.msg = 'Superhero';
    })*/
          
      //console.log( app.controller('physiciansControler').scope);
      console.log( app);
      $target.closest( '.btn-group' )
         .find( '[data-bind="label"]' ).text( $target.text() )
            .end()
         .children( '.dropdown-toggle' ).dropdown( 'toggle' );
      return false;
   });
}
