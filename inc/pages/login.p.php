<?php 
if(Config::init()->isLogged()) header('Location: '. Config::$_PAGE_URL . '');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet" />
    <title>CardGame — Auth</title>
  </head>
  <body>
    <main>
		<div class="login-form">
			<form method="post" id="login" class="m-4">
				<center>
					<h2>Welcome, guest</h2>
					<p id="alertbox"></p>
				</center>
				<div class="input-group">
					<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control" id="username" placeholder="Type your username">
				</div>
				<div class="input-group">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Type your password">
				</div>
				<a href="/register">I dont have an account!</a><br>
				<button type="submit" class="btn btn-success mt-3">Log in</button>
			</form>
		</div>
	</main>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="js/account/login.js"></script>
  </body>
</html>