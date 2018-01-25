app.factory("WordHttpService", function ($http){
	return {
		getWords: function (){
			return $http({
				method: "GET",
				url: "API/Word/getAll"
			});
		},
		getWord: function (id){
			return $http({
				method: "POST",
				url: "API/Word/getWord",
				data: {
					id: id
				}
			});
		},
		addWord: function (word){
			return $http({
				method: "POST",
				url: "API/Word/addWord",
				data: word
			});
		},
		updateWord: function (word){
			return $http({
				method: "POST",
				url: "API/Word/updateWord",
				data: word
			});
		},
		deleteWord: function (id){
			return $http({
				method: "POST",
				url: "API/Word/deleteWord",
				data: {
					id: id
				}
			});
		}
	};
});