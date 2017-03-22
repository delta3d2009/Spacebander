<?php
	session_start();
	//echo "------------------ " . $_SESSION["username"];
	if (empty($_SESSION["username"]))
	{
		header("Location: exit.php");
		session_unset($_SESSION["username"]);
		session_destroy ();
	}
?>

<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
	<html ng-app="spaceBanderApp" ng-app lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Staff Dashboard</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <!--<link rel="stylesheet" type="text/css" href="css/mobile.css">-->
        <!-- Google Fonts -->
       <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,300,500,600,700,800,900,200' rel='stylesheet' type='text/css'>
       <!-- Google Maps API -->
       <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMz8cgj2HUN1yhqmlDLDmStO_so32iaNw"></script>
			 <?php include 'includes/favicons.php';?>
		</head>
    <body class="admin-section dashboard-section">
    	 <div id="header" class="purple">
		<?php include 'includes/header.php';?>
	</div>
    	 	<div class="admin-container dashboard">
    	 		<h1>Staff Dashboard</h1>
	    	  	<!-- Main component for a primary marketing message or call to action -->
			      <div class="content">
			      	<div class="tabs-dashboard">
				        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
						  <li role="presentation" class="active"><a href="#insert" data-toggle="tab">Add New</a></li>
						  <li role="presentation"><a href="#edit"data-toggle="tab">Directory</a></li>
						  <li role="presentation"><a href="#report" data-toggle="tab">Run Reports </a></li>
						  <!--<a class="link" href="exit.php">Logout</a>-->
						  <button class="btn-green" id="logout-btn">Logout</button>
						</ul>
					</div>
					<div id="tab-content" class="tab-content">
						<div class="tab-pane active" id="insert">
							<form id="insertForm" autocomplete="off">
								<h3>ADD A NEW PHYSICIAN / PRACTICE:</h3>
								<div class="left-side">
									<div>
										<label>Company</label>
										<input name="mediccompany" id="mediccompany" type="text" size="50" value="" class="form-control" maxlength="80" required/>
									</div>
									<div>
										<label>First Name</label>
										<input name="medicfirstname" id="medicfirstname" type="text" size="80" value="" class="form-control" maxlength="80" required/>
									</div>
									<div>
										<label>Last Name</label>
										<input name="mediclastname" id="mediclastname" type="text" size="80" value="" class="form-control" maxlength="80" required/>
									</div>
									<div>
										<label>Address</label>
										<input name="address" id="address" type="text" size="80" value="" class="form-control" maxlength="80" required/>
									</div>
									<div>
										<label>Suite #</label>
										<input name="suite" id="suite" type="text" size="80" value="" class="form-control" maxlength="80"/>
									</div>
									<div>
										<label>City</label>
										<input name="city" id="city" type="text" size="40" value="" class="form-control" maxlength="40" required/>
									</div>
									<div>
										<label>State</label>
										<input name="state" id="state" type="text" size="2" value="" class="form-control" maxlength="40" required/>
										<?php include 'includes/states.php';?>
									</div>
								</div>
								<div class="right-side">
									<div>
										<label>Zip</label>
										<input name="zip" id="zip" type="text" size="5" value="" class="form-control" maxlength="5" onKeyPress="return numbersonly(this, event)"/>
									</div>
									<div>
										<label>Country</label>
										<?php include 'includes/countries.php';?>
									</div>
									<div>
										<label>Office Phone</label>
										<input name="phone" id="phone" type="text" size="20" value="" class="form-control" maxlength="20"/>
									</div>
									<div>
										<label>Physician's Cell</label>
										<input name="cell" id="cell" type="text" size="20" value="" class="form-control" maxlength="20"/>
									</div>
									<div>
										<label>Physician's Email</label>
										<input name="email" id="email" type="email" size="50" value="" class="form-control" maxlength="50"/>
									</div>
									<div>
										<label>Physicians' Fax</label>
										<input name="fax" id="fax" type="text" size="20" value="" class="form-control" maxlength="20"/>
									</div>
									<div>
										<label>Office Contact Name</label>
										<input name="office" id="office" type="text" size="20" value="" class="form-control" maxlength="50"/>
									</div>
								</div>
								<!--<div ng-controller="MapCtrl">-->
									<div id="map"></div>
								<!--</div>-->
								<div id="output"></div>
								<div class="buttons">
									<button type="submit" class="btn-green">Save</button>
									<button type="reset" class="btn-orange">Reset</button>
								</div>
							</form>
						</div>
						<!--------------------------------------------------------------------------------- Angular JS Data Grid / Two Way Data Binding--------------------------------------------------------------------------------->
						<div class="tab-pane" id="edit">
							<h3>directory of registered physicians and practices:</h3>
							<!--<div class="filter">
								<h3>directory of registered physicians and practices:</h3>
								<form id="searchForm" autocomplete="off">
									<input name="parameter" id="parameter" type="text" size="50" value="" maxlength="50"/>
									<button type="submit" class="btn-magnifying-glass"></button>
								</form>
							</div>
							<?php include 'php/searchPhysician.php';?>-->
							<div ng-controller="physiciansControler">
								<div>
								    <div class="row control-bar">
								        <div class="rows-number">Number of Rows:<br/>
								            <!--<select ng-model="entryLimit" class="">
								                <option>5</option>
								                <option>10</option>
								                <option>20</option>
								                <option>50</option>
								                <option>100</option>
								            </select>-->
								            <div class="btn-group" id="btn-pagesize">
											 <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
											   <span data-bind="label">Select Number of Rows</span>&nbsp;<span class="caret"></span>
											 </button>
											 <ul class="dropdown-menu form-control" role="menu" id="pagesize">
											    <li ng-click="OnItemClick('5')"><a href="#">5</a></li>
												<li ng-click="OnItemClick('10')"><a href="#">10</a></li>
												<li ng-click="OnItemClick('25')"><a href="#">20</a></li>
												<li ng-click="OnItemClick('50')"><a href="#">50</a></li>
											 </ul>
											</div>
								        </div>
								        <div class="input-container">
								        	&nbsp;
								            <input type="text" ng-model="search" ng-change="filter()" placeholder="SEARCH..." class="form-control" />
								        </div>
								        <div class="copy">
								            <h5>Filtered {{ filtered.length }} of {{ totalItems}} total physicians</h5>
								        </div>
								    </div>
								    <div class="row">
								        <div id="scrollbox" class="table-container" ng-show="filteredItems > 0">
								            <table class="table table-striped table-bordered">
								            <thead>
								            	<th>ID&nbsp;<a ng-click="sort_by('ID');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Company&nbsp;<a ng-click="sort_by('Company');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>First Name&nbsp;<a ng-click="sort_by('FirstName');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Last Name&nbsp;<a ng-click="sort_by('LastName');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Address&nbsp;<a ng-click="sort_by('Address');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Suite #&nbsp;<a ng-click="sort_by('Suite');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>City&nbsp;<a ng-click="sort_by('City');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>State&nbsp;<a ng-click="sort_by('State');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Zip&nbsp;<a ng-click="sort_by('Zip');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Country&nbsp;<a ng-click="sort_by('Country');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Phone&nbsp;<a ng-click="sort_by('Phone');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Cell&nbsp;<a ng-click="sort_by('Cell');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Fax&nbsp;<a ng-click="sort_by('Fax');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Email&nbsp;<a ng-click="sort_by('Email');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th>Office Contact&nbsp;<a ng-click="sort_by('Office');"><i class="caret"></i><i class="caret caret-reversed"></i></a></th>
									            <th></th>
									            <th></th>
								            </thead>
								            <tbody>
								                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
								                    <td>{{data.ID}}</td>
								                    <td>{{data.Company}}</td>
								                    <td>{{data.FirstName}}</td>
								                    <td>{{data.LastName}}</td>
								                    <td>{{data.Address}}</td>
								                    <td>{{data.Suite}}</td>
								                    <td>{{data.City}}</td>
								                    <td>{{data.State}}</td>
								                    <td>{{data.Zip}}</td>
								                    <td>{{data.Country}}</td>
								                    <td>{{data.Phone}}</td>
								                    <td>{{data.Cell}}</td>
								                    <td>{{data.Fax}}</td>
								                    <td>{{data.Email}}</td>
								                    <td>{{data.Office}}</td>
								                    <td><a class='edit' href='#' onClick='configModalForm(this.id); return false;' id={{data.ID}}>Edit</a></td>
								                    <td><a class='remove' href='#' onClick='configModalRemove(this.id); return false;' id={{data.ID}}>Remove</a></td>

								                </tr>
								            </tbody>
								            </table>
								        </div>
								        <div class="col-md-12" ng-show="filteredItems == 0">
								            <div class="col-md-12">
								                <h4>No physicians found</h4>
								            </div>
								        </div>
								        <div class="col-md-12" ng-show="filteredItems > 0">
								            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>


								        </div>
								    </div>
								</div>
								</div>
						</div>
						<!--------------------------------------------------------------------------------- Angular JS Data Grid --------------------------------------------------------------------------------->
						<div class="tab-pane" id="report">
							<h3>SELECT FILTERS TO RUN REPORT:</h3>
							<form id="excelForm" autocomplete="off">
								<div class="radios">
									<div class="radio">
									  <input type="radio" name="optionsRadios" id="optionsRadios1" value="Physician" checked>
									  <label for="optionsRadios1">Physicians</label>
									</div>
									<div class="radio">
									  <input type="radio" name="optionsRadios" id="optionsRadios2" value="Subscriber">
									  <label for="optionsRadios2">Subscribers</label>
									</div>
								</div>
								<button type="submit" class="btn-green">Download Excel Spreadsheet</button>
							</form>
						</div>
					</div>
			      </div><!-- End Main component for a primary marketing message or call to action -->
			 </div><!-- End Container -->
			 <?php include 'includes/footer.php';?>
    	 </div><!-- End Wrapper -->
	<?php include 'includes/interstitial.php';?>
    	<!-- Bootstrap core JavaScript
    	================================================= -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.screwdefaultbuttonsV2.js"></script>
        <!-- Angular JS by Google -->
       <script src="js/angular.min.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
		<!-- http://enscrollplugin.com -->
		<script src="js/enscroll-0.6.1.min.js"></script>
        <!-- Custom Script -->
        <script src="js/grid.js"></script>
        <script src="js/admin.js"></script>
    </body>
</html>
