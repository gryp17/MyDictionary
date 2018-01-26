app.controller("listController", function ($scope, $rootScope, $location, $filter){
	$scope.limit = 10;
	$scope.offset = 0;
		
	//watch for searchValue changes and reset the pagination
	$scope.$watch("searchValue", function (){
		$scope.offset = 0;
	});
	
	/**
	 * Sets the list orderBy field
	 * @param {String} field
	 */
	$scope.setOrder = function (field){
		$rootScope.orderField = field;
		$rootScope.orderReverse = !$rootScope.orderReverse;
	};
	
	/**
	 * Checks if there are more pages in the words list
	 * @returns {Boolean}
	 */
	$scope.hasMorePages = function (){
		var filteredResults = $filter("filter")($rootScope.words, $scope.searchValue);
		
		if(angular.isDefined(filteredResults) && filteredResults.length > $scope.offset + $scope.limit){
			return true;
		}else{
			return false;
		}
	};
	
	/**
	 * Goes to the previous page
	 * @returns {undefined}
	 */
	$scope.previousPage = function (){
		$scope.offset = $scope.offset - $scope.limit;
	};
	
	/**
	 * GOes to the next page
	 * @returns {undefined}
	 */
	$scope.nextPage = function (){
		$scope.offset = $scope.offset + $scope.limit;
	};
	
	/**
	 * Redirects to the "word" page
	 * @param {Number} id
	 */
	$scope.editWord = function (id){
		$location.path("word/"+id);
	};
	
});