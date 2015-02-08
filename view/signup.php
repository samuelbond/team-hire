<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sign Up</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="view/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="view/css/font-awesome.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="view/css/style-40.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>
	<!-- Body -->
	<body>

	
			<br />
			<h1 class="text-center">Team Hire Blog</h1>
			<br />

            <?php

                if(isset($error))
                {
                    echo '<div class="row">
                <div class="col-md-6 col-md-push-3">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> '.$error.'.
                    </div>
                </div>
                </div>';
                }

            if(isset($success))
            {
                echo '<div class="row">
                <div class="col-md-6 col-md-push-3">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> '.$success.'.
                    </div>
                </div>
                </div>';
            }


            if(isset($message))
            {
                echo '<div class="row">
                <div class="col-md-6 col-md-push-3">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Heads up!</strong> '.$message.'.
                    </div>
                </div>
                </div>';
            }

            ?>



			<!-- Form -->
			<form method="post" action="signup">
				<!-- Ui-40 -->
				<div class="ui-40">

					<div class="ui-head bg-lblue">
						<!-- Heading -->
						<h2>SIGNUP</h2>
					</div>
					<!-- Ui-block -->
                    <div class="ui-block bg-white">
                        <div class="ui-icon">
                            <i class="fa fa-user lblue"></i>
                        </div>
                        <div class="ui-input">
                            <input type="text" name="fname" class="form-control" placeholder="Your Name" required="required" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
					<div class="ui-block bg-white">
						<!-- Icon -->
						<div class="ui-icon">
							<i class="fa fa-envelope lblue"></i>
						</div>
						<!-- Input box -->
						<div class="ui-input">
							<input type="email" name="email" class="form-control" placeholder="Email" required="required" />
						</div>
					</div>
                    <div class="clearfix"></div>
					<div class="ui-block bg-white">
						<div class="ui-icon">
							<i class="fa fa-unlock-alt lblue"></i>
						</div>
						<div class="ui-input">
							<input type="password" name="password" class="form-control" placeholder="Your Password" required="required" />
						</div>
					</div>
                    <div class="clearfix"></div>
                    <div class="ui-block bg-white">
                        <!-- Icon -->
                        <div class="ui-icon">
                            <i class="fa fa-print lblue"></i>
                        </div>
                        <!-- Input box -->
                        <div class="ui-input">
                            <textarea name="profile" class="form-control" placeholder="Your Profile" required="required" rows="1"></textarea>
                        </div>
                    </div>
					<div class="clearfix"></div>
					<!-- Footer -->
					<div class="ui-foot bg-lblue">
						<!-- Buttons -->
						<button type="submit" class="ui-button">REGISTER</button> 
					</div>
				</div>
			</form>
			
		

		<!-- Bootstrap javascript links --->
		<!-- Jquery file -->
		<script src="view/js/jquery-2.1.1.min.js"></script>
		<!-- Bottstrap min js file -->
		<script src="view/js/bootstrap.min.js"></script>
		<!-- placeholder file -->
		<script src="view/js/placeholders.js"></script>
		<!-- Html file -->
		<script src="view/js/html5shiv.js"></script>
		<!-- Respond file-->
		<script src="view/js/respond.min.js"></script>
	
	</body>
</html>