<div id="word-wrapper" ng-show="word">
	<div class="row justify-content-end">
		<div class="col-sm-3">
			<a href="list" class="btn btn-primary btn-block">
				Back to list
			</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			<label for="en-input">English:</label>
			<input id="en-input" type="text" class="form-control" placeholder="English" ng-model="word.en" ng-focus="clearError($event)"/>
		</div>
		<div class="col-sm-6">
			<label for="bg-input">Bulgarian:</label>
			<input id="bg-input" type="text" class="form-control" placeholder="Bulgarian" ng-model="word.bg" ng-focus="clearError($event)"/>
		</div>
	</div>
	
	<label for="note-input">Note:</label>
	<textarea id="note-input" class="form-control" placeholder="Note" ng-model="word.note" ng-focus="clearError($event)"></textarea>
		
	<div class="row justify-content-center">
		<div ng-if="word.id" class="col-sm-4 mt-2">
			<button class="btn btn-danger btn-block" ng-click="deleteWord()">
				Delete Word
			</button>
		</div>
		
		<div class="col-sm-4 mt-2" ng-class="{'offset-sm-4': word.id}">
			<button class="btn btn-success btn-block" ng-click="saveWord()">
				<span ng-if="word.id">Update</span>
				<span ng-if="!word.id">Add</span>
				Word
			</button>
		</div>
	</div>
	
</div>