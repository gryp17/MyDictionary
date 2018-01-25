app.config(["$routeProvider", function($routeProvider) {
	$routeProvider.when("/", {
		templateUrl: "app/views/list.php",
		controller: "listController"
	}).when("/list", {
		templateUrl: "app/views/list.php",
		controller: "listController"
	}).when("/word/:id?", {
		templateUrl: "app/views/word.php",
		controller: "wordController"
	}).otherwise({
		templateUrl: "app/views/list.php",
		controller: "listController"
	});
}]);

app.config(["$locationProvider", function($locationProvider) {
	$locationProvider.html5Mode(true);
}]);

//angularJS hack for PHP AJAX/POST requests
app.config(function($httpProvider) {
    $httpProvider.defaults.transformRequest = function(data) {        
        if (data === undefined) { return data; } 
        return $.param(data);
    };
    $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8"; 
});

