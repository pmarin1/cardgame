<?php 

    include_once 'inc/config.inc.php';
    $qinv = Config::$g_con->prepare("SELECT * FROM `invites` WHERE `sendby` = '". $_SESSION['user'] . "'");
    $qinv->execute();
    $results2 = $qinv->fetchAll(PDO::FETCH_ASSOC);
    $json3 = json_encode($results2);
    echo $json3;

?>