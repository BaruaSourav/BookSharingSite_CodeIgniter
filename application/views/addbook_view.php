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
					<li class="homepos"><a href="<?php echo site_url("home/about_us");?>">About Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class = "nav-search homepos">
						<form action= "" method = "GET">
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
			<?php
				if(isset($success_msg))
					echo $success_msg;
				?>
			<p class = "head-of-add">Add your book below</p>
			<div class = "book-add-form jumbotron">
				<div class = "form-signin">
					<?php   
						$attributes = array("id" => "registraform", "name" => "registraform");
						echo form_open_multipart("reg_book/index", $attributes);
					?>
					<input class="form-control" id="reg_bookname" name="reg_bookname" placeholder="Book Name" type="text" value="<?php echo set_value('reg_bookname'); ?>"/>
					<span class="text-danger" style = "font-size:5px;"><?php echo form_error('reg_bookname'); ?> </span></br>
					<input class="form-control" id="reg_authorname" name="reg_authorname" placeholder="Author Name" type="text" value="<?php echo set_value('reg_authorname'); ?>" />
					<span class="text-danger"><?php echo form_error('reg_authorname'); ?></span></br>
					<div class="input-group">                                            
							<input class="form-control" id="reg_category" name="reg_category" placeholder="Category" type="text" value="<?php echo set_value('reg_category'); ?>"/>
							
							<div class="input-group-btn">
								<button type="button" class="btn btn-primary dropdown-toggle bt-size" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul id="lists" class="dropdown-menu">
									<li>Romance</li>
									<li>Fiction</li>
									<li>Ideolgy</li>
									<li>Thriller</li>
									<li>Other</li>
								</ul>
							</div>
						</div>
						<span class="text-danger"><?php echo form_error('reg_category'); ?></span>
						</br>
						<!--  pdf and cover img upload korbar jonno      -->
						<label>PDF File Upload</label>
						<input id="pdfupload" name="pdfupload"type="file"></br>
						<?php if (isset($pdferror)):?>
						<span><?php echo $pdferror;?></span>
						<?php endif; ?>

						<!-- <label>Cover Image Upload</label>
						<input id="coverupload" name="coverupload" type="file"></br>
						<?php if (isset($covererror)):?>
						<span class= "alert alert-danger"><?php echo $covererror;?></span>
						<?php endif; ?> -->
						<label for="comment">Description:</label>
						<textarea class="form-control" rows="5" name="comment"></textarea><br>
						<label class = "add-book-pa">Do you want to make this book Lendable to others ?</label><br>
						<input type='radio' name='lendable' value="1" <?php echo set_radio('lendable', '1', TRUE); ?> />Yes
						<input type='radio' name='lendable'  value="0"<?php echo set_radio('lendable', '0');?>/>No<br>
						<label class = "add-book-pa">Do you want to make this book Buyable to others ?</label><br>
						<input type='radio' name='buyable' value="1" <?php echo set_radio('buyable', '1', TRUE); ?> />Yes
						<input type='radio' name='buyable' value="0"<?php echo set_radio('buyable', '0'); ?>/>No</br>
						<div class="form-actions">
							<a id="btn_back" href = "<?php echo site_url('user_dash/index'); ?>" name="btn_back"  class="btn btn-info">Back</a>
							<input id="btn_confirm" name="btn_confirm" type="submit" class="btn btn-info" value="Confirm" />
						</div>
					<?php echo form_close();?>
				</div>
			</div>		
		</div>
	</body>
	<script>
		$('#lists li').on('click', function(){
			$('#reg_category').val($(this).text());
		});
	</script>
</html>