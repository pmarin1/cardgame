<?php
    include_once("inc/config.inc.php");
    
    if(!Config::init()->isLogged()){
        header("Location: " . Config::$_PAGE_URL . "login");
    }
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
    <title>CardGame — Dashboard</title>
  </head>
  <body>
  <!-- Modal Invite -->
  <div id="modals">
    
  </div>
  <main>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="#">CardGame</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Friends</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Create a match</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container">
            <div class="mt-3">
                <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <ul>
                        <li>Played matches: 0</li>
                        <li>Won mathces: 0</li>
                        <li>Friends in total: 0/100</li>
                    </ul>
                </div>
            </div>
            <hr/>
            <h4>Invites</h4>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">From</th>
                  <th scope="col">To</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody id="invitestable">

              </tbody>
            </table>
            <hr/>
            <h4>Friends</h4>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Username</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="friends">

              </tbody>
            </table>
            <hr/>
            <h4>Add friends</h4>
            <form method="POST" id="addfriend">
                <div id="alert"></div>
                <input class="form-control" id="fname" placeholder="Your friend's nickname">
                <button type="submit" class="btn btn-primary mt-2">Send request</button>
            </form>
        </div>
	</main>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>var usersess = "<?php echo $_SESSION['user']; ?>";</script>
	<script src="js/fillMain.js"></script>
	<script src="js/account/addfriend.js"></script>
  </body>
</html>