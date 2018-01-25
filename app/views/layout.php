<!DOCTYPE html>
<html ng-app="my-dictionary">
	<head>
		<title>My Dictionary</title>

		<base href="/MyDictionary/" />

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link href="client/img/favicon.ico" rel="icon"/>
		<link href="client/libs/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="client/css/common.css" rel="stylesheet" type="text/css"/>
		<link href="client/css/list.css" rel="stylesheet" type="text/css"/>
		<link href="client/css/word.css" rel="stylesheet" type="text/css"/>

		<script type="text/javascript" src="client/libs/jquery.min.js"></script>
		<script type="text/javascript" src="client/libs/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="client/libs/angular.min.js"></script>
		<script type="text/javascript" src="client/libs/angular-route.min.js"></script>

	</head>
	<body class="ng-cloak" ng-cloak>

		<div id="main-wrapper" class="container-fluid col-md-8">
			<div class="row no-gutters">
				<div id="header" class="col-12">
					My Dictionary
				</div>
				
				<div id="view-wrapper" class="col-12">
					<section ng-view="" autoscroll="true">
					</section>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="app/app.js"></script>
		<script type="text/javascript" src="app/config.js"></script>
		<script type="text/javascript" src="app/services/word-http-service.js"></script>
		<script type="text/javascript" src="app/controllers/list-controller.js"></script>
		<script type="text/javascript" src="app/controllers/word-controller.js"></script>

	</body>
</html>
