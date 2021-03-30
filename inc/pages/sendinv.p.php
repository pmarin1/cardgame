<?php 
    if(isset($_POST['sendby']) && isset($_POST['sendto'])){
        $sendInvite = Config::$g_con->prepare("INSERT INTO `invites` (`sendto`, `sendby`) VALUES (?,?)");
        $sendInvite->execute([$_POST['sendto'], $_POST['sendby']]);
    }
?>