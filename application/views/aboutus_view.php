<html>
	<head>
		<?php $this->load->helper('url');?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login Form</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"/>
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
		<link rel="stylesheet" href="/BookRialto/style/style.css">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li class="nav-logo"><a class="portrait" href="#"><img src = "/BookRialto/image/icon.png"/></a></li>
					<li class="active homepos"><a href="<?php echo site_url("home/index"); ?>">Home</a></li>
					<li class="homepos"><a href="#">About Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class = "nav-search">
						<form action= "" method = "GET" class="navbar-form navbar-left navbar-input-group" role="search">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control homepos" placeholder="Search this site"/>
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default homepos searchbtn">
											<span class="glyphicon glyphicon-search"></span>
										</button>
									</span>
								</div>
							</div>
						</form>
					</li>
					<li class="homepos"><a href="<?php echo site_url('reg_user');?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li class="homepos"><a href="<?php echo site_url('login');?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
			</div>
		</nav>
		<div class="main">
		<div class="head1">
		<p>MISSION </p>
		</div>
		<div class="head2">
		<p>VISION </p>
		</div>
		<div class="head3">
		<p>GOAL</p>
		</div>
		</div>
		<div class="mydiv">
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>Spred knowledge among everyone and enhance the power of wisdom.<br></h4>
      </div>
      <div class="item">
        <h4>Share your knowledge to the rest of the world hidden in the linesof the books . <br/>Make books available to everyone and keep your library running with you anywhere you go.<br></h4>
      </div>
      <div class="item">
        <h4>Increase the habbit of reading book, being able 
		to store and read books online and also <strong>share</strong> with others</h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
		
	</body>
</html>