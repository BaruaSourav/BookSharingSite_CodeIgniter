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
<body class = "body-background-img">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="nav-logo"><a class="portrait" href="<?php echo site_url("home/index");?>"><img src = "/BookRialto/image/icon.png"/></a></li>
				<li class="active homepos"><a href="<?php echo site_url("home/index");?>">Home</a></li>
				<li class="homepos"><a href="<?php echo site_url("home/about_us");?>">About Us</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class = "nav-search homepos">
					<form action= "" method = "GET">
						<div class="input-group">
							<input type="text" class="form-control homepos" placeholder="Search this site">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default homepos searchbtn">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</span>
						</div>
					</form>
				</li>
				<li class="homepos"><a href="<?php echo site_url('reg_user');?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li class="homepos"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</nav>



	<div class = "container centerdiv">
		<div class="col-sm-4 col-md-5 col-md-offset-2">
			<div class="account-wall">
				<div class = "form-signin">

				<?php

				 if(isset($message)){
					echo '<div class="alert alert-success text-center">A user named <b>'. $message .'</b> is created,<br> Login to get access</div>';
				}
				if(isset($error)){
					echo $error;
				}
					?>
					<legend><h3 class="text-left form-title"><b>Login</b></h3></legend>
				<?php 
					$attributes = array("id" => "loginform", "name" => "loginform");
					echo form_open("login/index", $attributes);?>
					<input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" /></br>
                    <span class="text-danger"><?php echo form_error('txt_username'); ?></span></br>
					<input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" /></br>
                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span></br>
					<input id="btn_login" name="btn_login" type="submit" class="btn btn-lg btn-primary btn-block" value="Login" /></br>
					<a href="<?php echo site_url('reg_user');?>"  class="regfont" ><b><u>Not a member yet?Register here..</u></b></a>
					<?php echo form_close(); ?>
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
 




	 $(function(){
			$(".search").keyup(function() //class name of input
			{ 
				var searchid = $(this).val();
				var dataString = 'search='+ searchid; // search in post method
				if(searchid !='')
				{
					$.ajax({
					type: "POST",
					url: "<?php echo site_url('search_book/ajaxSearch') ?>",
					data: dataString,
					cache: false,
					success: function(html)
					{
					$("#result").html(html).show();
					}
					});
				}
				return false;    
			});

			jQuery("body").on("click",'#result',function(ev){ 
				var $clicked = $(ev.target);
				var $name = $clicked.find('.name').html();
				var decoded = $("<div/>").html($name).text();
				$('#searchid').val(decoded);
			});
			jQuery("body").on("click",document, function(ev) { 
				var $clicked = $(ev.target);
				if (! $clicked.hasClass("search")){
				jQuery("#result").fadeOut(); 
				}
			});
			$('#searchid').click(function(){
				jQuery("#result").fadeIn();
			});
		});
</script>
</html>