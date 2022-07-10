<?php
include_once('../../database/db.php');
include_once('../../app/controller/sessions.php');


$idSession = intval($_SESSION['id']);
$getFollowedId = intval($_GET['followedid']);      // <== CELUI là est juste : $_GET['user']
// $getFollowedId = intval($_GET['followedid']);
var_dump($idSession);
var_dump($getFollowedId);                    // <== CELUI là est juste : $_GET['user']


if ($getFollowedId != $idSession)
{
    $alreadyFollow = $DB->query("SELECT * FROM followers WHERE member_id = '".$idSession."' AND follower_member_id = '".$getFollowedId."'");
    $result = $alreadyFollow->num_rows;
    
    if ($result == 0)
    {
        $addFollow = $DB->query("INSERT INTO followers (`member_id`, `follower_member_id`) VALUES ($idSession, $getFollowedId)");
    }
    elseif ($result == 1)
    {
        $deleteFollow = $DB->query("DELETE FROM followers WHERE member_id = '".$idSession."' AND follower_member_id = '".$getFollowedId."'");
    }
    header('Location:'.$_SERVER['HTTP_REFERER']);
}
?>
