<?php
echo "
  <!-- Static navbar -->
        <nav class='navbar navbar-inverse'>
        <div class='container-fluid'>
            <div class='navbar-header'> 
                <a class='navbar-brand'  href='./'><img class='img-responsive' src='img/desktop/spacebander-logo.jpg'></a>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span> 
                </button>
            </div>

            <div id='myNavbar' class='collapse navbar-collapse'>
              <ul class='nav navbar-nav navbar-right'>
                    <li><a href='./'>HOME</a></li>
                    <li><a href='about.php'>ABOUT</a></li>
                    <li><a href='find-physicians.php'>FIND A PHYSICIAN</a></li>
                    <li><a href='contact.php'>CONTACT</a></li>
              </ul>
            </div>
        </div>
      </nav>
      ";
?>