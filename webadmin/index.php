<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN | BERITA KITA</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="../dist/css/style.css">
</head>
<body>
<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default panel-login">
			<div class="panel-heading">
				<h3>LOGIN ADMINISTRATOR</h3>
			</div>
			<div class="panel-body">
        <?php if (isset($_GET['failed']) && $_GET['failed']==1) { ?>
          <div class="alert alert-danger">
            Username/Password Salah.
          </div>
        <?php } ?>
				<form action="cek_login.php" method="POST">
			   <div class="form-group">
					 <label>Username</label>
					 <div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-user"></i></span>
						  <input type="text" class="form-control" name="username" placeholder="Username">
					 </div>
				  </div>
					<div class="form-group">
						<label>Password</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-block btn-primary">LOGIN <i class="fa fa-sign-in"></i></button>
					</div>
				</form>
		  </div>
		</div>
	</div>
</div>
</body>
</html>