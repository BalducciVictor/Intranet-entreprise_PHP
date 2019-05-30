<?php

require_once 'assets/config/bootstrap.php';


$manager = new CommentairesManager($db);

$eventId = $_GET['event'];
$userId = $_GET['user'];

$inputValue = $_POST['comment'];

$Comments = $manager->getList();
$lastComment = $Comments[count($Comments)-1]->id();


$commentaire = new Commentaires([
  'id' => $lastComment+1,
  'eventId' => $eventId,
  'content' => $inputValue,
  'userId' => $userId,
]);

$manager->add($commentaire);

header('Location: comment.php?event='.$eventId.'&user='.$userId);

?>