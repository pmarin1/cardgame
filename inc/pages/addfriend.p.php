<?php 
include_once("inc/config.inc.php");
if(isset($_POST['friend']) && $_POST['friend'] != '') {
    $user = $_POST['friend'];
    $userid = Config::init()->getPlayerData($user, "id");

    $q = Config::$g_con->prepare("SELECT * FROM `friends` WHERE `userid` = ? AND `friendid` = ? ");
    $q->execute(array($_SESSION['accid'], $userid));
            
    if($q->rowCount() != 0) 
    {
      echo "You already have this friend in your list!";
      return;
    }

    $addFriendForUserId = Config::$g_con->prepare("INSERT INTO friends (friendid, userid, friend, user) VALUES (?,?,?,?)");
    $addFriendForUserId->execute([$userid, $_SESSION['accid'], $user, $_SESSION['user']]);
    $addFriendForFriendId = Config::$g_con->prepare("INSERT INTO friends (userid, friendid, user, friend) VALUES (?,?,?,?)");
    $addFriendForFriendId->execute([$userid, $_SESSION['accid'], $user, $_SESSION['user']]);
    echo 'success';
}
?>