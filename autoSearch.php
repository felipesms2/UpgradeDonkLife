<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<title>Autocomplete search using PHP, MySQLi, Ajax and jQuery</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/autoSearch.css">



</head>

<body>
<div class="container">

	<h1 class="text-center gst20">Auto Complete Search using jQuery</h1>
	<div class="row justify-content-center gst20">
		<div class="col-sm-6">
			<form id="registrationForm" method="POST" action="">
				<div class="input-gpfrm input-gpfrm-lg">
				  	<input type="text" id="placeLive" name="placeLive" class="form-control" placeholder="Search Name" aria-describedby="basic-addon2">
					  <ul class="list-gpfrm" id="searchPlaceResult"></ul>
				</div>
			</form>
		</div>
	</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script src="./js/personalFunctions.js"></script>


</body>

</html>
