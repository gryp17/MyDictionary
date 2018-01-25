app.controller("wordController", function ($scope, $rootScope, $routeParams, $location, WordHttpService){
	
	//if the "id" parameter is set then we are editing the word (otherwise we are inserting new word)
	if(angular.isDefined($routeParams.id)){
		
		WordHttpService.getWord($routeParams.id).then(function (response){
			if(response.data.status === 1 && response.data.data){
				$scope.word = response.data.data;
			}else{
				$location.path("list");
			}
		}).catch(function (e){
			console.log(e);
			$location.path("list");
		});
		
	}else{
		$scope.word = {};
	}
	
	/**
	 * Deletes the opened word and redirects back to the words list page
	 */
	$scope.deleteWord = function (){
		WordHttpService.deleteWord($routeParams.id).then(function (){
			
			//remove the word from the words list manually (instead of reloading the entire words list again)
			$rootScope.words = $rootScope.words.filter(function (word){
				return word.id !== parseInt($routeParams.id);
			});
			
			$location.path("list");
		}).catch(function (e){
			console.log(e);
			$location.path("list");
		});
	};
	
	/**
	 * Removes the error class from the clicked element
	 * @param {Object} $event
	 */
	$scope.clearError = function ($event){
		$($event.currentTarget).removeClass("error");
	};
	
	/**
	 * Adds/updates the word data
	 */
	$scope.saveWord = function (){
		if($routeParams.id){
			WordHttpService.updateWord($scope.word).then(handleSaveWordResponse);
		}else{
			WordHttpService.addWord($scope.word).then(handleSaveWordResponse);
		}
	};
	
	/**
	 * Callback function that handles the add/update word responses
	 * @param {Object} response
	 */
	function handleSaveWordResponse (response){
		if(response.data.status === 1){
			$scope.word = response.data.data;
			
			//on update update the word record in the $rootScope.words array
			if($routeParams.id){
				$rootScope.words = $rootScope.words.map(function (word){
					if(word.id === $scope.word.id){
						word = $scope.word;
					}
					
					return word;
				});
			}
			else{
				$rootScope.words.push($scope.word);
			}
			
			$location.path("list");
			
		}else{
			
			if(response.data.error && response.data.error.field){
				$("#"+response.data.error.field+"-input").addClass("error");
			}else{
				console.log(response.data.error);
			}

		}
	}
	
});