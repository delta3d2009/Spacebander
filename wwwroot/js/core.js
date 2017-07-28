/*
 * Eng. Marlon Ulate Caruzo.
 * March 2015
 *
 *
 */

/* Global Variables */
var currentPage = "";
var breakpoint_mobile = '320px';
var breakpoint_mobile_max = '767px';
var media_query = "screen and (min-width: " + breakpoint_mobile + ") and (max-width: " + breakpoint_mobile_max + ")";
var isMobile;

//Closure function
(function() {
    var carousel = $('.carousel').hide();
    var deferreds = [];
    var imgs = $('.carousel').find('img');
    // loop over each img
    imgs.each(function(){
        var self = $(this);
        var datasrc = self.attr('data-src');
        if (datasrc) {
            var d = $.Deferred();
            self.one('load', d.resolve)
                .attr("src", datasrc)
                .attr('data-src', '');
            deferreds.push(d.promise());
        }
    });

    $.when.apply($, deferreds).done(function(){
        $('#ajaxloader').hide();
        carousel.fadeIn(1000);
    });
});


$(document).ready(function() {
	//Handler for .ready() called.
	currentPage = document.body.className;
	isMobile = window.matchMedia && window.matchMedia(media_query).matches;

	configModal();
	configCarousel();

	addCTAEvents();

	if(currentPage === "homepage-section")
	{
		addClickEventPlayVideo();
	}

	if(isMobile && currentPage === "homepage-section")
	{
	     configCarouselMobile();
	}
	//pageName = getPageName(window.location.pathname);
	//currentPage = $(".content").attr("id");
	validateNavigation();

	if(currentPage != "find-physicians-section")
  {
     addEventsContactForm();
  }
  setViewPort();

});

$(window).bind("resize", function(){
    //setViewPort();
});

window.document.addEventListener('orientationchange', function() {
  var iOS = navigator.userAgent.match(/(iPad|iPhone|iPod)/g);
  var viewportmeta = document.querySelector('meta[name="viewport"]');
  if (iOS && viewportmeta) {
    if (viewportmeta.content.match(/width=device-width/)) {
      viewportmeta.content = viewportmeta.content.replace(/width=[^,]+/, 'width=1');
    }
    viewportmeta.content = viewportmeta.content.replace(/width=[^,]+/, 'width=' + window.innerWidth);
  }
  // If you want to hide the address bar on orientation change, uncomment the next line
  // window.scrollTo(0, 0);
}, false);

/*function setViewPort()
{
    var mobile_timer = false;
    if(navigator.userAgent.match(/iPhone/i)) {
        $('#viewport').attr('content','width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0');
        $(window).bind('gesturestart',function () {
            clearTimeout(mobile_timer);
            $('#viewport').attr('content','width=device-width,minimum-scale=1.0,maximum-scale=10.0');
        }).bind('touchend',function () {
            clearTimeout(mobile_timer);
            mobile_timer = setTimeout(function () {
                $('#viewport').attr('content','width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0');
            },1000);
        });
    }
}*/

function setViewPort()
{
    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
      var ww = ( $(window).width() < window.screen.width ) ? $(window).width() : window.screen.width; //get proper width
      var mw = 640; // min width of site
      var ratio =  ww / mw; //calculate ratio
      if( ww < mw){ //smaller than minimum size
       $('#Viewport').attr('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + ww);
      }else{ //regular size
       $('#Viewport').attr('content', 'initial-scale=1.0, maximum-scale=2, minimum-scale=1.0, user-scalable=yes, width=' + ww);
      }
    }   */

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
			var viewportmeta = document.querySelector('meta[name="viewport"]');
			if (viewportmeta) {
			    viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0';
			    jQuery(document).ready(function() {
			        document.body.addEventListener('gesturestart', function () {
			            viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
			        }, false);
			    });
			}
		}
}

function addEventsContactForm()
{
	try {
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
					$('#modal-screen .modal-footer .btn-green').hide();
				});
				posting.fail(function( data ) {
					//showThankYouMessage();
				});
			}
		});
	} catch(error) {}

	$( "button:reset" ).on( 'click', function( event ) {
		resetContactForm();
	});
}

function resetContactForm()
{
	$( "label.error" ).hide();
	$( "#contactForm input.error" ).css("border-color","#68DDDD");
	$( "#contactForm textarea.error" ).css("border-color","#68DDDD");
	$( "#contactForm input:text" ).val("");
	$( "#contactForm #email").val("");
	$( "#contactForm #confirmemail").val("");
	$( "#contactForm #message").val("");
	$( "#output" ).empty();
}

function setupNavigation()
{
	pageName = getPageName(window.location.pathname);
}

function addCTAEvents()
{
    $('#cta_area .curtain').on( 'click', function( event ) {
        window.location.href = $(this).find("a").attr("href");
    });
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
	        interval: 8000
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

function validateNavigation()
{
    switch(currentPage)
    {

        case "homepage-section":
            $("#myNavbar ul.navbar-nav li").eq(0).find("a").addClass("active");
        break;

        case "about-section":
            $("#myNavbar ul.navbar-nav li").eq(1).find("a").addClass("active");
        break;

        case "find-physicians-section":
           $("#myNavbar ul.navbar-nav li").eq(2).find("a").addClass("active");
        break;

        case "contact-section":
             $("#myNavbar ul.navbar-nav li").eq(3).find("a").addClass("active");
        break;

        default:
        break;

    }
}

function addClickEventPlayVideo()
{
	var myPlayer = videojs("video-homepage");
	$(".play-video").on('click tap', function() {
	  if (myPlayer.paused()) {
	    myPlayer.play();
	  }
	  else {
	    myPlayer.pause();
	  }
	});
}


//Carousel Events

$(function() {
    var carousel = $('.carousel').hide();
    var deferreds = [];
    var imgs = $('.carousel').find('img');
    // loop over each img
    imgs.each(function(){
        var self = $(this);
        var datasrc = self.attr('data-src');
        if (datasrc) {
            var d = $.Deferred();
            self.one('load', d.resolve)
                .attr("src", datasrc)
                .attr('data-src', '');
            deferreds.push(d.promise());
        }
    });

    $.when.apply($, deferreds).done(function(){
        $('#ajaxloader').hide();
        carousel.fadeIn(1000);
    });
});
