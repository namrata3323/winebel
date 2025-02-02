<?php 
include_once('connect.php');
$db->rpcheckLogin();
$page = USER_PROFILE;

$where = " id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND isDelete=0";
$ctable_r = $db->rpgetData("user","*",$where);
$ctable_d = @mysqli_fetch_array($ctable_r);

?>
<html>
<head>
	<title><?php echo USER_PROFILE_TITLE."| ".SITENAME; ?></title>
	<?php include_once('include_css.php') ?>
</head>
<body class="dashboard-page bg-primary-1">
<main class="main-wrapper">
	<?php include_once('include_header.php'); ?>
	<section>
		<div class="container">
			<div class="d-flex dashboard">
				<?php include_once('include_sidebar.php'); ?>
 				<div class="dashboard-content">
					<div class="row">
						<div class="col-lg-8 p-3 p-md-5">
							<div class="card border-0 rounded-0 h-100">
								<div class="card-body">
									<a href="javascript:;" class="sidebar-toggle d-block d-md-none">
										<i class="ti-more"></i>
									</a>
									<h3 class="h3 mb-5 pb-3 border-bottom">
										<i class="ti-user"></i>
										<?php echo USER_PROFILE; ?>
									</h3>
									<form name="profile-form" id="profile-form" method="post" enctype="multipart/form-data" action="<?php echo SITEURL.'process-update-profile/'; ?>">
										
										<div class="form-group row no-gutters">
											<label for="name" class="col-sm-4 col-form-label"><?php echo USERNAME; ?></label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="<?php echo USERNAME; ?>" name="name" id="name" value="<?php echo $ctable_d['name']; ?>">
												<i class="ti-user"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label for="email" class="col-sm-4 col-form-label"><?php echo EMAIL; ?></label>
											<div class="col-sm-8">
												<input type="email" class="form-control" placeholder="<?php echo EMAIL; ?>" name="email" id="email" value="<?php echo $ctable_d['email']; ?>">
												<i class="ti-email"></i>
											</div>
										</div>
										<div class="form-group row no-gutters justify-content-end">
											<div class="col-sm-8">
												<button type="submit" name="submit" id="submit" class="btn btn-primary-1 btn-lg btn-block rounded-pill px-5"><?php echo UPDATE_PROFILE; ?></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-4 right sidebar d-none d-lg-block">
							<h4 class="h4">
								<?php echo PROFILE_SIDEBAR_TITLE; ?>
							</h4>
							<p><?php echo PROFILE_SIDEBAR_DESCRIPTION; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- CDN -->
<?php include_once('include_js.php') ?>
<script type="text/javascript">
	$("#profile-form").validate({
		ignore : [],
		rules: 
		{
			name:{required : true},
			email:{required : true,email: true}
		},
		messages: {
			name:{required:"<?php echo PLEASE_ENTER_USERNAME; ?>"},
			email:{required:"<?php echo PLEASE_ENTER_EMAIL; ?>", email : "<?php echo PLEASE_ENTER_VALID_EMAIL; ?>"}
		},
		errorPlacement: function (error, element) 
		{
			error.insertAfter(element);
		}
	});
</script>
</body>
</html>