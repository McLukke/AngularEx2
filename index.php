<html ng-app="countryApp">
<?php include('partials/head.html'); ?>
<body>
<div ng-controller="CountryCtrl">
<!-- 	Controllers<br />Enumerating objects - countries and populations<br /><br />
	<ul>
		<li ng-repeat="country in countries">{{country.name}} - population {{country.population}}</li>
	</ul> -->

	Controllers<br />Building a table<br /><br />
	<table>
		<tr>
			<th>Country</th>
			<th>City</th>
			<th>Name</th>
		</tr>
		<tr ng-repeat="country in countries">
			<td>{{country.Country}}</td>
			<td>{{country.City}}</td>
			<td>{{country.Name}}</td>
		</tr>
	</table>
</div>
<script>
	var countryApp = angular.module('countryApp', []);
	// $http is NG dependency injection mechanism
	countryApp.controller('CountryCtrl', function($scope, $http) {
		// // example array of json data
		// $scope.countries = [
		// 	{'name': 'China', 'population': 1359821000},
		// 	{'name': 'India', 'population': 1205625000},
		// 	{'name': 'United States of America', 'population': 312247000}

		// local development has "same-origin policy" issues with NG
		// kinda redundant to call success with function(response) and return response.data (same origin)
		// success fn DOES NOT return result - using random public API
		$http.get('http://www.w3schools.com/angular/customers.php').success(function(data) {
			$scope.countries = data.records;
		});
	});
</script>
</body>
</html>
