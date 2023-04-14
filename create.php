<?php
include "partials/header.php";
require "users/users.php";

$user = [
    'id' => "",
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => ""
];
include "_form.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    creat_user($_POST);
    header("Location: index.php");
}

include "partials/footer.php";
