<?php 
if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $q = Config::$g_con->prepare("SELECT * FROM `users` WHERE `username` = ? ");
    $q->execute(array($user));
            
    if($q->rowCount() != 0) 
    {
      echo "An account is already registered with this username!";
      return;
    }

    $addAccount = Config::$g_con->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $addAccount->execute([$user, $pass]);
    echo 'success';
}
?>