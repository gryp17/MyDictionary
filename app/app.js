'use strict';

var app = angular.module("my-dictionary", ["ngRoute"]);

app.run(function($rootScope, WordHttpService) {
	
	//on route change check if the $rootScope.words array is set and request it from the backend if necessary
    $rootScope.$on("$routeChangeSuccess", function() { 
		
		if (angular.isUndefined($rootScope.words)) {
			$rootScope.orderField = "en";
			$rootScope.orderReverse = false;

			WordHttpService.getWords().then(function (response) {
				if (response.data.status === 1) {
					$rootScope.words = response.data.data;
				} else {
					console.log(response.data.error);
				}
			}).catch(function (err) {
				console.log(err);
			});
		}
		
    });
});

