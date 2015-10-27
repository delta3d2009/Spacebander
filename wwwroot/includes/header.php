<?php
echo "
	<!-- Static navbar -->
      <nav class='navbar navbar-default'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
              <span class='sr-only'>Toggle navigation</span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='index.php'><img src='img/desktop/spacebander-logo.png' /></a>
          </div>
          <div id='navbar' class='navbar-collapse collapse'>
            <ul class='nav navbar-nav'>
              <li class='active'><a href='index.php'>HOME</a></li>
              <li><a href='about.php'>ABOUT</a></li>
              <li><a href='find-physicians.php'>FIND A PHYSICIAN</a></li>
              <li><a href='contact.php'>CONTACT</a></li>
              <!--<li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>Find a Physician <span class='caret'></span></a>
                <ul class='dropdown-menu' role='menu'>
                  <li><a href='find-physicians.php'>Find a Physician in your Area</a></li>
                  <li><a href='#'>Another action</a></li>
                  <li><a href='#'>Something else here</a></li>
                  <li class='divider'></li>
                  <li class='dropdown-header'>Nav header</li>
                  <li><a href='#'>Separated link</a></li>
                  <li><a href='#'>One more separated link</a></li>
                </ul>
              </li>-->
            </ul>
            <!--<ul class='nav navbar-nav navbar-right'>
            	<li><a href='../navbar/'>Facebook<span class='sr-only'>(current)</span></a></li>
            	<li><a href='../navbar-static-top/'>Twitter</a></li>
            	<li class='active'><a href='admin.php'>Admin Entrance</a></li>
          </ul>-->
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      ";
?>
