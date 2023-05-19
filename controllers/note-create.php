<?php

require "Validator.php";


$config = require "config.php";
$db = new Database($config["database"], "root", "");

$heading = "Create a note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    // $validator = new Validator  !!!!! NOT NEEDED because the function we use below is static.

    if (! Validator::string($_POST["body"], 1 , 1000)) {   // since this "string" method is a static (pure), there is no need to make an instance of this class.
        $errors["body"] = "A body is required";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body, user_id) VALUES(:body , :user_id)", [
            "body" => $_POST["body"],
            "user_id" => 1
        ]);
    }
}

require "views/note-create.view.php"; 