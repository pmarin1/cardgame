include_once("inc/config.inc.php");

<?php 
    if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
        
        $q = Config::$g_con->prepare("SELECT * FROM `users` WHERE `username` = ? LIMIT 0,1");
        $q->execute(array($_POST['username']));
        if($q->rowCount() != 0) {
            $row = $q->fetch();
        }
        
        $login = Config::$g_con->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ? LIMIT 0,1");
        $login->execute(array($_POST['username'],$_POST['password']));
        
        if($login->rowCount() != 0) {
            $row = $login->fetch();
            $_SESSION['user'] = $row['username'];
            $_SESSION['accid'] = $row['id'];
            
            $insertData = Config::$g_con->prepare("UPDATE users SET online = ? WHERE id = ?");
            $insertData->execute([1, $row['id']]);

            header('Location: ' . Config::$_PAGE_URL . '');
    } else exit('invalid');
    } else {
        header('location:./');
    }
?>