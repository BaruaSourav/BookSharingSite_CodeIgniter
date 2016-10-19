
<!-- Tushar :dashboard_view.php-->
<html>
	<head>
		<?php $this->load->helper('url');?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User DashBoard</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"/>
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
		<!--<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.8.0.min.js"); ?>"></script>-->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"/>
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/BookRialto/style/style.css"/>
	</head>

	
	<body>
		<?php $this->load->view("header_view");?>


		<div class = "container-fluid">
			<div class = "jumbotron user-profile">
				<?php 
								if($user->imageLink=='') : ?>
								<img src="/BookRialto/defaults/user-default.png" class = "pro-img"/>
							<?php else: ?>
								<img src="/BookRialto/userdp/<?php echo $user->imageLink; ?>" class = "pro-img"/>
				
				<?php endif; ?>
				<?php $this->load->model('book_model'); ?>


				<div class = "pro-details">
					<p class="text-center label-primary" style = "font-size:20px; color:#E1E8ED;"><b><?php echo $user->firstName.' '; echo $user->lastName ?></b></p>
					<p class="text-center" style = "font-size:15px; color:#6699CC">@<?php echo $user->userName; ?></p>
					<p class=" text-center" style = "font-size:15px;">Number of Book(s): <font color="#3366FF"><?php echo sizeof($books);?></font></p>
					<p class="text-center" style = "font-size:15px;" >Member Since: <font color="#3366FF"><?php echo date('F d, Y', strtotime($user->memberSince));?></font></p>
					<a class="btn btn-success" href = "<?php echo site_url('user_dash/add_book');?>" style = "position:relative; left:100px;">Add Book</a>
				</div>
			</div>
            <div class = "search-bar">
                <h1 class = "rialto-header" style ="color:#006666;">My Rialto</h1>
               <!-- the form starts here-->

                <?php   
                    $attributes = array("id" => "bookform", "name" => "bookform");
                    echo form_open("reg_book/index", $attributes);
                ?>
                    <div class = "dropdown-bar">
                        <div class="input-group">                                            
                                <input class="form-control" id="reg_search_category" name="reg_search_category" placeholder="Category" type="text" value="<?php echo set_value('reg_search_category'); ?>"/>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary dropdown-toggle search-bt-size" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul id="search_lists" class="dropdown-menu">
                                        <li>Romance</li>
                                        <li>Fiction</li>
                                        <li>Ideolgy</li>
                                        <li>Thriller</li>
                                        <li>Other</li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                    <div class = "text-bar">
                        <input class="form-control" id="search-box" name="search-box" placeholder="Search" type="text" value="<?php echo set_value('search-box'); ?>"/>
                    </div>
                    <div class = "search-btn">
                        <input type = "submit" name = "submits"  class="btn btn-success" value = "Search" class="form-control"/>
                    </div>
                <?php echo form_close(); ?>
            </div>
			<div class = "gallary">
			<!-- Shuru -->
			<?php if(empty($books)): ?>
				<div class = "well well-lg">
					<h3 class = "text-center" style = "color:red;"><b>No Books</b></h3>
				</div>

			<?php else:
					foreach ($books as $book):?>
				<div class = "img-gal">
					<a href="#">
						<span class="glyphicon glyphicon-pencil edit-icon"></span>
					</a>
					<a href="#crossModal" data-href="<?php echo site_url('user_dash/delete_book/'.$book->bookID)?>" data-toggle="modal" data-target="#crossModal">
						<span class="glyphicon glyphicon-remove cross-icon"></span>
					</a>
					
					<?php if ($book->coverImg =='') :?>
							<img class = "img-size" src = "<?php echo base_url('defaults/noCover.png'); ?>">
								<a href = "#" data-href="" data-toggle = "modal" data-target = "#myPosterModal">
									<span class="glyphicon glyphicon-pencil edit-icon-img"></span>
								</a>
							</img>
						<?php else:?>
							<img class = "img-size" src = "<?php echo base_url('bookcover/'.$book->coverImg); ?>">
								<a href = "#" data-href="" data-toggle = "modal" data-target = "#myPosterModal">
									<span class="glyphicon glyphicon-pencil edit-icon-img"></span>
								</a>
							</img>
						<?php endif;?>


					
					
					<div class = "descrip">
						<p class = "title"><b> <?php echo $book->bookName; ?> </b>
							<span></span>
						</p>
						<p class = "author"><b><?php echo $book->authorName; ?></b>
							<span></span>
						</p>
						<p class = "des">
							<div class = "deslimit">
								<span><?php echo $book->description; ?></span>
							</div>
						</p>
						<?php if ($book->isLendable== 0) :?>
							<span class="label label-warning lendable" data-toggle="tooltip" title="The Book is not Lendable">Not Lendable</span>
						<?php elseif($book->isLendable== 1) :?>
							<span class="label label-success lendable" data-toggle="tooltip" title="The Book is Lendable">Lendable</span>
						<?php endif;?>

						<?php if ($book->isPurchasable== 0) :?>
							<span class="label label-warning buyable" data-toggle="tooltip" title="The Book is not Buyable">Not Buyable</span>
						<?php elseif($book->isPurchasable== 1) :?>
							<span class="label label-success buyable" data-toggle="tooltip" title="The Book is Buyable">Buyable</span>
						<?php endif;?>

						<a href="<?php echo site_url('user_dash/load_bookDetails/'.$book->bookID) ;?>" class="btn btn-primary btn-xs small-btn">See details</a>
						
					</div>
				</div>
				
				<br>
			<?php endforeach; 
					endif;?>
				<!-- ekhan porjonto -->
				
			</div>
		</div>
		<div class = "container">
			<div class="modal fade" id="crossModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
					 <div class="modal-content">
						  <div class="modal-header">
							   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							   <h4 class="modal-title" id="myModalLabel"><b>Confirm Delete</b></h4>
						  </div>
						  <div class="modal-body">
						   		<p class="text-center confm"> <b>Are Your Sure ?</b> </p>
						  </div>
						  <div class="modal-footer">
							  	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							  	<a class="btn btn-danger btn-ok">Delete</a>
						  </div>
					 </div>
				</div>
   			</div>
		</div>
		<div class = "container"><!-- Modal Of Edit poster-->
		   <div class="modal fade" id="myPosterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title text-center" id="myModalLabel"><b>Upload Cover Image for this book</b></h4>
						</div>
					    <div class="modal-body">

							<div class = "form-signin">
								<?php   
									$attributes = array("id" => "registraform", "name" => "registraform");
									echo form_open_multipart("reg_user/index", $attributes);
								?>
								<input id="fileupload" type="file">
								<?php echo form_close();?>
							</div>
					    </div>
					    <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<a id="btn_confirm" href = "#" name="btn_confirm" type="submit" class="btn btn-info">Confirm</a>
					    </div>
					</div>
				</div>
		   </div>
		</div>
	</body>	
	<script>
	 	$('#crossModal').on('show.bs.modal', function(e) {
	 		$(this).find('.confm').innerHtml=$(e.relatedTarget).data('href');

            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
       $("a[data-target=#myPosterModal]").click(function(e) {
			e.preventDefault();
			var target = $(this).attr("href");

			// load the url and show modal on success
			$("#myPosterModal.modal-body").load(target, function() { 
				 $("#myPosterModal").modal("show"); 
			});
		});
	 </script>
	 
	 <script>
        $('#lists li').on('click', function(){
            $('#reg_category').val($(this).text());
        });
        $('#search_lists li').on('click', function(){
            $('#reg_search_category').val($(this).text());
        });
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