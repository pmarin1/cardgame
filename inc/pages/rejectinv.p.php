<?php 
    if(isset($_POST['invid'])){
        $deleteInvite = Config::$g_con->prepare("DELETE FROM invites WHERE id = ?");
        $deleteInvite->execute([$_POST['invid']]);
    }
?>