<?php


$config = require "config.php";
$db = new Database($config["database"], "root", "");


$heading = "My Notes!";

$notes = $db->query("select * from notes where user_id = 1")->get();

//dd($notes);

require "views/notes/index.view.php";