/*
 * Eng. Marlon Ulate Caruzo.
 * March 2015
 * 
 * 
 */

/* Global Variables */

$(document).ready(function() {
    //Handler for .ready() called.
if(!$(document.body).hasClass("body-iframe"))//If Document is not the iframe
    {
        resetLoginForm();
        addEventsLoginForm();
    }
});

function resetLoginForm()
{
    $("#signin :text").val("");
    $("#signin :password").val("");
}

function addEventsLoginForm(){
    $("#signin").submit(function( event ) {
    // Stop form from submitting normally
    event.preventDefault();
    // Get some values from elements on the page:
    var $form = $(this);
    user = $form.find("input[name='user']").val();
    pass = $form.find("input[name='pass']").val();
    if(user)
    {
        $( "#username .required").hide();
        if(pass)
        {
            $( "#password .required").hide();
            // Send the data using post
            var posting = $.post("php/login.php", {user:user, pass:pass});
            // Put the results in div
            posting.done(function( data ) {
                $( "#output" ).empty().append(data);
                //console.log(data)
            });
        }else
        {
            $( "#output" ).empty().append("Fields are Required");
            $( "#password .required").show();
        }
    }else
    {
        $( "#output" ).empty().append("Fields are Required");
        $( "#username .required").show();
        }       
    });
}

function configModalForgot()
{
    showModal("Forgot Your Password","","");
    $('#modal-screen p').hide();
    $('#modal-screen .modal-footer button').text("Close");
    $('#modal-screen .modal-footer .btn-green').hide();
    $('#modal-screen .modal-body iframe').remove();
    $('#modal-screen .modal-dialog').width(466);
$('<iframe />');
    $('<iframe />', {
        name: 'forgot',
        id: 'forgot',
        src: 'forgot.php'
    }).appendTo('#modal-screen .modal-body');
         
         $("#forgot").load(function(){
            addClickEventsForgot($(this).contents().find('body')); 
            addEventsForgotForm($(this).contents().find('body'));
          });
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

/*Handling Click Events Forgot Password Form*/
function addClickEventsForgot(iframe)
{
    $(iframe).find(":reset").on("click", function(event){
        resetForgotForm(iframe);
    });
}

function resetForgotForm(iframe)
{
    $(iframe).find("#forgotForm label.error" ).hide();
    $(iframe).find("#forgotForm input:text" ).val("");
    $(iframe).find("#forgotForm #output" ).empty();
}

function  closeIframeForgot()
{
    $("#modal-screen iframe").remove();
    setTimeout(function(){ $('#modal-screen').modal('hide');}, 8000);
}

function addEventsForgotForm(iframe)
{
   var form = $(iframe).find("#forgotForm");
    $(form).validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: "Please enter a valid e-mail address."
        },
         submitHandler: function(form) {
            var $form =  $(iframe).find("#forgotForm");
            email = $form.find("input[name='email']").val();
            var posting = $.post("php/sendToken.php", {email:email});
            posting.done(function( data ) {
                showModal("Forgot your Password ?",data,"");
                closeIframeForgot();
            });
            posting.fail(function( data ) {
                //showThankYouMessage();
            });
        }
    }); 
    
    $( "#forgotForm button:reset" ).on( 'click', function( event ) {
        resetForgotForm();
    });
}


function setResetForm(){
    //alert("Token " + token + " Email " + email + " Form " +  $("#resetForm"));
    //$("#resetForm").find("input[name='email']").text(email);
    //$("#resetForm").attr("token",token);
    $("#resetForm").find("input[name='email']").prop( "disabled", true );
    $("#resetForm").find("input[name='user']").prop( "disabled", true );
    //prop( "disabled", false );
    addClickEventsReset();
    addEventsResetForm();
}

/*Handling Click Events Reset Password Form*/
function addClickEventsReset()
{
    $("#resetForm :reset").on("click", function(event){
        resetResetForm();
    });
}

function resetResetForm()
{
    $("#resetForm label.error" ).hide();
    $("#resetForm input.error" ).css("border-color","#cccccc");
    $("#resetForm input:text" ).val("");
    $("#resetForm #email").val("");
    $("#resetForm #output" ).empty();
}

function addEventsResetForm()
{
    $("#resetForm").validate({
        rules: {
            password: {
                required: true,
            },
            confirmpassword: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password: "Please enter a valid password.",
            confirmpassword:{
                equalTo: "Please confirm password."
            }
        },
         submitHandler: function(form) {
            var $form =  $("#resetForm");
            email = $form.find("input[name='email']").val();
            password = $form.find("input[name='password']").val();
            token = $form.attr("token");
            var posting = $.post("php/resetPassword.php", {email:email, password: password, token:token});
            posting.done(function( data ) {
                //showModal("Forgot your Password ?",data,"");
                $( "#output" ).empty().append(data);
                $("#resetForm").find("input[name='password']").prop( "disabled", true );
                $("#resetForm").find("input[name='confirmpassword']").prop( "disabled", true );
            });
            posting.fail(function( data ) {
                //showThankYouMessage();
            });
        }
    }); 
    
    $( "#resetForm button:reset" ).on( 'click', function( event ) {
        resetForgotForm();
    });
}