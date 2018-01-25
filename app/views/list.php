<div id="list-wrapper" ng-show="words">

	<div id="toolbar" class="row no-gutters">
		<div class="col-sm-6">
			<input type="text" class="form-control" placeholder="Search" ng-model="searchValue"/>
		</div>
		
		<div class="col-sm-6 col-lg-3 offset-lg-3">
			<a id="add-word-button" href="word" class="btn btn-success btn-block">
				Add Word
			</a>
		</div>
	</div>

	<table class="table table-hover">
		<thead class="thead-light">
			<tr>
				<td title="Order by this field" ng-click="setOrder('en')" ng-class="{'active': orderField === 'en'}">
					English
					<img ng-class="{'reverse': orderReverse}" src="client/img/arrow.png"/>
				</td>
				<td title="Order by this field" ng-click="setOrder('bg')" ng-class="{'active': orderField === 'bg'}">
					Bulgarian
					<img ng-class="{'reverse': orderReverse}" src="client/img/arrow.png"/>
				</td>
				<td class="d-none d-sm-block">
					Note
				</td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="word in words| filter:searchValue | orderBy:orderField:orderReverse | limitTo:limit:offset track by word.id" title="Edit definition for {{word.en}}" ng-click="editWord(word.id)">
				<td>
					{{word.en}}
				</td>
				<td>
					{{word.bg}}
				</td>
				<td class="d-none d-sm-block">
					{{word.note}}
				</td>
			</tr>
		</tbody>
	</table>

	<div class="row no-gutters justify-content-center pagination-wrapper">
		
		<div class="col-6 col-sm-3">
			<button class="btn btn-dark btn-block" ng-click="previousPage()" ng-disabled="offset === 0">
				<img src="client/img/big-arrow-white.png"/>
			</button>
		</div>
		
		<div class="col-6 col-sm-3">
			<button class="btn btn-dark btn-block" ng-click="nextPage()" ng-disabled="!hasMorePages()">
				<img src="client/img/big-arrow-white.png"/>
			</button>
		</div>
		
	</div>
	
</div>