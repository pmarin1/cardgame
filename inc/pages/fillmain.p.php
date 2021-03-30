<?php 
    include_once 'inc/config.inc.php';

    if(isset($_POST['action']) && $_POST['action'] == "friends"){
        $q1 = Config::$g_con->prepare("SELECT * FROM `friends` WHERE `userid` = ". $_SESSION['accid'] . "");
        $q1->execute();
        //$q2 = Config::$g_con->prepare("SELECT * FROM `users` WHERE `id` = ". $row['friendid'] . "");
        //$q2->execute();
            
        $results1 = $q1->fetchAll(PDO::FETCH_ASSOC);
        $json2 = json_encode($results1);
        echo $json2;
    }

    if(isset($_POST['action']) && $_POST['action'] == "invtable"){
        $qinv = Config::$g_con->prepare("SELECT * FROM `invites` WHERE `sendby` = '". $_SESSION['user'] . "'");
        $qinv->execute();
        $results2 = $qinv2->fetchAll(PDO::FETCH_ASSOC);
        $json3 = json_encode($results2);
        echo $json3;
    }
?>