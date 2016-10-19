<html>
	<head>
		<?php $this->load->helper('url');?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Book Details</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"/>
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"/>
		<link rel="stylesheet" href="/BookRialto/style/style.css"/>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top navcolor" >
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li class="nav-logo"><a class="portrait" href="<?php echo site_url("home/index");?>"><img src = "/BookRialto/image/icon.png"/></a></li>
					<li class="active homepos"><a href="<?php echo site_url("home/index");?>">Home</a></li>
					<li class="homepos"><a href="#">About Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class = "nav-search homepos">
						<form action= "<?php  echo site_url('search_book/ajaxSearch');?>" method = "POST">
						<div class="form-group">
						<!-- dropdown starts -->
								<div class="input-group">
									<input type="text" class="form-control homepos search" id="searchid" placeholder="Search by book title"/>
									<div id="result">
										<br>
									</div>
									<!-- dropdown search-->
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default homepos searchbtn">
											<span class="glyphicon glyphicon-search"></span>
										</button>
									</span>
								</div>
							</div>
						</form>
						<li class="dropdown homepos">
							<a href="#" class="dropdown-toggle profile-image " data-toggle="dropdown">
							<?php 
								if($user->imageLink=='') : ?>
								<img src="/BookRialto/defaults/user-default.png" class="img-circle special-img glowing-border"/>
							<?php else: ?>
								<img src="/BookRialto/userdp/<?php echo $user->imageLink; ?>" class="img-circle special-img "/>


							<?php endif; ?>
								<!--<span class="glyphicon glyphicon-chevron-down"></span>-->
							</a>
							<ul class="dropdown-menu ">
								<li>
									<div class="navbar-login">
										<div class="row">
											<div class="col-lg-4">
												<p class="text-center">
													<?php 
								if($user->imageLink=='') : ?>
										<span>
										<img src="/BookRialto/defaults/user-default.png" class="drop-img"/>
										</span>
								<?php else: ?>
										<span>
										<img src="/BookRialto/userdp/<?php echo $user->imageLink; ?>" class="drop-img"/>
										</span>

								<?php endif; ?>


													
												</p>
											</div>
											<div class="col-lg-8">
												<p class="text-left ">Hi <strong><?php echo $user->firstName; ?></strong></p>
												<p class="text-left">
													<a href="#" class="btn btn-primary btn-block btn-sm">View Profile</a>
												</p>
											</div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="navbar-login navbar-login-session">
										<div class="row">
											<div class="col-lg-12">
												<p>
													<a href="<?php echo site_url('login/logout');?>" class="btn btn-danger btn-block">Logout</a>
												</p>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</li>
					</li>
				</ul>
			</div>
		</nav>
		<div class = "container">
			<div class = "users-book jumbotron">
			 
				<?php 
								if($book->coverImg=='') : ?>
								<img id ="users-book-profile" src="/BookRialto/defaults/noCover.png" class = "pro-img"/>
							<?php else: ?>
								<img id ="users-book-profile" src="/BookRialto/bookcover/<?php echo $book->coverImg; ?>" class = "pro-img"/>
				
				<?php endif; ?>
				
			</div>
			<div id = "users-book-profile-details">
				<p class="text-center" style = "font-size:20px;"><?php echo $book->bookName; ?></p>
					<p style = "position:relative;font-size:20px;left:90px;"><?php echo $book->authorName; ?></p>
					<p style = "position:relative;font-size:20px;left:65px;"><?php echo $book->ownerID; ?></p>
					<p style = "position:relative;font-size:20px;left:35px;"><?php echo $book->category; ?></p>
					<p style = "position:relative;font-size:20px;left:35px;"><font color="#3366FF"><?php echo date('F d, Y', strtotime($book->uploadDate));?></font></p>
					<a href = "<?php echo site_url("user_dash")?>"  class = "btn btn-danger">Back</a>
			</div>
			<div id = "frames">
				<iframe id = "show_pdf" scrolling="no" width="770" height= "500" src="<?php echo $source; ?>"  />
			</div>
		</div>
	</body>
</html>