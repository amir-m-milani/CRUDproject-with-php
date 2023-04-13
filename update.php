<?php
require "users/users.php";
include "partials/header.php";

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}
$userId = $_GET['id'];
$user = get_users_byId($userId);
if (!$user) {
    include "partials/not_found.php";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user = update_user($_POST, $userId);

    if (!empty($_FILES["picture"]["name"])) {
        uploadImage($_FILES, $user);
    }


    header("Location: index.php");
}

include "_form.php";
include "partials/footer.php";
