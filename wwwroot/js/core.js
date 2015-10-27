/*
 * Eng. Marlon Ulate Caruzo.
 * March 2015
 * 
 * 
 */

/* Global Variables */
var currentPage = "";
var breakpoint_mobile = '320px';
var breakpoint_mobile_max = '768px';
var media_query = "screen and (min-width: " + breakpoint_mobile + ") and (max-width: " + breakpoint_mobile_max + ")";
var isMobile;

$(document).ready(function() {
	//Handler for .ready() called.
	isMobile = window.matchMedia && window.matchMedia(media_query).matches;
	
	addEventsContactForm();
	configModal();
	configCarousel();
	if(isMobile)
	{
	     //configCarouselMobile();
	}
	//pageName = getPageName(window.location.pathname);
	//currentPage = $(".content").attr("id");
});

function addEventsContactForm()
{
	$("#contactForm").validate({
		rules: {
			contactfirstname: {
				required: true,
				minlength: 2
			},
			contactlastname: {
                required: true,
                minlength: 2
            },
			phone: {
				required: false,
				minlength: 7
			},
			email: {
				required: true,
				email: true
			},
			confirmemail: {
                required: true,
                email: true,
                equalTo: "#email"
            },
			message: {
				required: true,
				minlength: 10
			}
		},
		messages: {
			contactfirstname: {
				required: "This field is required.",
				minlength: "Names must be at least 2 characters."
			},
			contactlastname: {
                required: "This field is required.",
                minlength: "Names must be at least 2 characters."
            },
			email: "Please enter a valid e-mail address.",
			confirmemail: {
			    equalTo: "Please validate email address."
			},
			message: {
				required: "This field is required.",
				minlength: "Message must be at least 10 characters."
			}
		},
		 submitHandler: function(form) {
			var $form = $("#contactForm");
			firstname = $form.find("input[name='contactfirstname']").val();
			lastname = $form.find("input[name='contactlastname']").val();
			phone = $form.find("input[name='phone']").val();
			email = $form.find("input[name='email']").val();
			message = $form.find("#message").val();
			
			var posting = $.post("php/insertContact.php", {firstname:firstname, lastname:lastname, phone:phone, email:email, message:message});
			posting.done(function( data ) {
				//showThankYouMessage();
				$( "#output" ).empty().append(data);
				showModal("Your message was sucessfully sent.","We'll contact you as soon as possible.","Thanks.");
			});
			posting.fail(function( data ) {
				//showThankYouMessage();
			});
		}
	});	
	
	$( "button:reset" ).on( 'click', function( event ) {
		resetContactForm();
	});
}

function resetContactForm()
{
	$( "label.error" ).hide();
	$( "#contactForm input.error" ).css("border-color","#cccccc");
	$( "#contactForm input:text" ).val("");
	$( "#contactForm #email").val("");
	$( "#contactForm #message").val("");
	$( "#output" ).empty();
}

function setupNavigation()
{
	pageName = getPageName(window.location.pathname);
	
	/*switch(pageName){
		case "index":
			
		break;
		case "":
			
		break;
		case "aging-with-influenza":
			$('.navbar ul #item-1').find(".horizontal-line").show();
			$('.navbar ul #item-1').find(".green-menu").css("color", "#FFFFFF");
		break;
		case "immune-response-and-influenza":
			$('.navbar ul #item-2').find(".horizontal-line").show();
			$('.navbar ul #item-2').find(".green-menu").css("color", "#FFFFFF");
		break;
		case "influenza-case-studies":
			$('.navbar ul #item-3').find(".horizontal-line").show();
			$('.navbar ul #item-3').find(".green-menu").css("color", "#FFFFFF");
		break;
		
	}*/
}

/*Bootstrap Interstitial Modal Window*/
function showModal(title, p1, p2)
{
	$('#modal-screen').modal('show');
	$('#modal-screen .modal-header').text(title);
	$('#modal-screen p:first-child').text(p1);
	$('#modal-screen p:last-child').text(p2);
}

function configModal()
{
	$('#modal-screen').on('hidden.bs.modal', function (e) {
  		resetContactForm();
	});
}

function getPageName(url) {
    var currurl = window.location.pathname;
    var index = currurl.lastIndexOf("/") + 1;
    var filenameWithExtension = currurl.substr(index);
    var filename = filenameWithExtension.split(".")[0];
    return filename;
}

function configCarousel()
{
	$('.carousel').each(function(){
		$(this).carousel({
	        //interval: 5000
	        interval:false
	    });
	});
}

function configCarouselMobile()
{    
     var script = "js/jquery.mobile-1.4.5.min.js";
     $("head").append('<script type="text/javascript" src="' + script + '"></script>');
     
     $("#myCarousel").swiperight(function() {
         $(this).carousel('prev');
    });
    $("#myCarousel").swipeleft(function() {
        $(this).carousel('next');
    });
}
