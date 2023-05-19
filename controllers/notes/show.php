<?php


$config = require "config.php";
$db = new Database($config["database"], "root", "");


$heading = "Note:";
$currentUserId = 1;

$id = $_GET["id"];

$note = $db->query("select * from notes where id = :id" , [ 
     "id" => $id
    ])->findOrFail();



// Redirect to 403 because of not authorized.

authorize($note["user_id"] === $currentUserId);



//dd($note);

require "views/notes/show.view.php";