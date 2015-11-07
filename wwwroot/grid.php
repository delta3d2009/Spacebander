<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
    ul>li, a{cursor: pointer;}
    </style>
    <title>Datagrid with search, sort and paging using AngularJS, PHP, MySQL</title>
</head>
<body>


<div ng-controller="customersCrtl">
<div class="container">
<br/>
    <div class="row">
        <div class="col-md-2">PageSize:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="col-md-3">Filter:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        </div>
        <div class="col-md-4">
            <h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
            <thead>
            <th>Company&nbsp;<a ng-click="sort_by('Company');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>First Name&nbsp;<a ng-click="sort_by('FirstName');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Last Name&nbsp;<a ng-click="sort_by('LastName');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Address&nbsp;<a ng-click="sort_by('Address');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Suite #&nbsp;<a ng-click="sort_by('Suite');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>City&nbsp;<a ng-click="sort_by('City');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>State&nbsp;<a ng-click="sort_by('State');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Zip&nbsp;<a ng-click="sort_by('Zip');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Country&nbsp;<a ng-click="sort_by('Country');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Phone&nbsp;<a ng-click="sort_by('Phone');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Cell&nbsp;<a ng-click="sort_by('Cell');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Fax&nbsp;<a ng-click="sort_by('Fax');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Email&nbsp;<a ng-click="sort_by('Email');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Office Contact&nbsp;<a ng-click="sort_by('Office');"><i class="glyphicon glyphicon-sort"></i></a></th>
            </thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
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
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No customers found</h4>
            </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems > 0">    
            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
            
            
        </div>
    </div>
</div>
</div>
<script src="js/angular.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="js/grid.js"></script>         
    </body>
</html>