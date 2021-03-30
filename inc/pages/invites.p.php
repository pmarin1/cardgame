<?php 
    include_once 'inc/config.inc.php';

    $q1 = Config::$g_con->prepare("SELECT * FROM `invites` WHERE `sendto` = ? ");
    $q1->execute([$_SESSION['user']]);
    $results1 = $q1->fetchAll(PDO::FETCH_ASSOC);
    $json2 = json_encode($results1);
    echo $json2;
?>