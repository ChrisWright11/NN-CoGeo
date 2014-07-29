<!DOCTYPE html>

<html>
	<head>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<!-- jquery -->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<!-- jquery UI-->
		<script src="//code.jquery.com/ui/1.11.0/jqueryui/1.11.0/jquery-ui.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
		<!-- background line: url("http://wallpaperscraft.com/image/mountain_peak_stars_sky_night_light_snow_46057_1920x1200.jpg?orig=1"); -->
		<style>
		
		
			body{
				text-align: center;
				background: #666;
				background-size: cover;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-repeat: no-repeat;
				background-position: position;
				
			}
			
			h1{
				text-align: center;
				color: white;
			}
			
			p{
				text-align: center;
				color: white;
			}
			
			h3{
				text-align: center;
				color: white;
			}
			.input-group{
				width: 500px;
				text-align: center;
			}
			
		</style>
		

	
	</head>

	<body>
		<header class = "navbar">
			<div class = "container">
				
		
				<nav class="navbar navbar-inverse" role="navigation">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#">CoGeo</a>
				    </div>
				
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="index.php">Home</a></li>
				        <li class="active"><a href="#">Add Spot</a></li>
				        <li><a href="places.php">See All</a></li>
				        
				      </ul>
				      
				      
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
			</div>
		</header>
	<div class="container">
		<h1> Add your spot!</h1>
		<p>
			 Enter the name of your spot below and then rate it on the feelings shown from 0 - 10;
		</p>
		<h3></h3>
	</br>
	</br>
	
	<form action = "dynamodbUploader.php" method = "post" name="name" id="name_1">
		<div class="input-group">
		  <span class="input-group-addon">Place Name</span>
		  <input id="name1" input type="text" class="form-control" name="name1" placeholder="Enter Here">
		</div>
	</form>

	</br>
	</br>	
	
	
	
	<form action = "dynamodbUploader.php" method = "post" name="feeling1" id="feeling_1">
	<br/>
		<h3>Feeling 1</h3>
		<br/>	
			<input id="feeling1" input type="range" name = "feeling1" min="0" max="10" value="5" step="1" onchange="showValue(this)"/>
		<p><span id="range">5</span></p>
		</br>
	<script type="text/javascript">


	function get_nextsibling(n) {
    	x=n.nextSibling;
 			while (x.nodeType!=1) {
    	x=x.nextSibling; }
 			return x; }

	function showValue(self) {
    	get_nextsibling(self).innerHTML=self.value; }
	</script>
	</form>
	
	<form action = "dynamodbUploader.php" method = "post" name="feeling2" id="feeling_2">
	<br/>
		<h3>Feeling 2</h3>
		<br/>	
			<input id="feeling2" input type="range" name = "feeling2" min="0" max="10" value="5" step="1" onchange="showValue(this)"/>
			<p><span id="range">5</span></p>
		</br>
	</form>
	
	<form action = "dynamodbUploader.php" method = "post" name="feeling3" id="feeling_3">
		<br/>
		<h3>Feeling 3</h3>
			<br/>	
			<input id="feeling3" input type="range" name = "feeling3" min="0" max="10" value="5" step="1" onchange="showValue(this)"/>
			<p><span id="range">5</span></p>
			</br>
	</form>
	
	<form action = "dynamodbUploader.php" method = "post" name="feeling4" id="feeling_4">
		<br/>
		<h3>Feeling 4</h3>
			<br/>	
			<input id="feeling4" input type="range" name = "feeling4" min="0" max="10" value="5" step="1" onchange="showValue(this)"/>
			<p><span id="range">5</span></p>
			</br>
	</form>
	
	<form action = "dynamodbUploader.php" method = "post" name="feeling5" id="feeling_5">
		<br/>
		<h3>Feeling 5</h3>
			<br/>	
			<input id="feeling5" input type="range" name = "feeling5" min="0" max="10" value="5" step="1" onchange="showValue(this)"/>
			<p><span id="range">5</span></p>
		</br>
	</form>
	
	<form action = "dynamodbUploader.php" method = "post" name="feeling6" id="feeling_6">
		<br/>
		<h3>Feeling 6</h3>
			<br/>	
			<input id="feeling6" input type="range" name = "feeling6" min="0" max="10" value="5" step="1" onchange="showValue(this)"/>
			<p><span id="range">5</span></p>
			</br>
	</form>
	
	
	<form action = "dynamodbUploader.php" method = "post" name="feeling7" id="feeling_7">
		<br/>
		<h3>Feeling 7</h3>
			<br/>	
			<input id="feeling7" input type="range" name = "feeling7" min="0" max="10" value="5" step="1" onchange="showValue(this)"/>
			<p><span id="range">5</span></p>
			</br>
	</form>
	
	

	</div>
	
	</br>
	</br>
	
   
	<div class="submit-btn">	
	</br>
		<!-- Indicates a successful or positive action -->
		<a href="#"><button type="button" class="btn btn-success btn-lg">Submit!</button></a>
	</br>
	</div>
	<br/><br/>
	
	<script type="text/javascript">
		
		var name1 = parseInt(document.getElementById("name1").value);
		var feeling1 = parseInt(document.getElementById("feeling1").value);
		var feeling2 = parseInt(document.getElementById("feeling2").value);
		var feeling3 = parseInt(document.getElementById("feeling3").value);
		var feeling4 = parseInt(document.getElementById("feeling4").value);
		var feeling5 = parseInt(document.getElementById("feeling5").value);
		var feeling6 = parseInt(document.getElementById("feeling6").value);
		var feeling7 = parseInt(document.getElementById("feeling7").value);


		
	</script>
	
	</body>
    
</html>