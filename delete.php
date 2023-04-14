<?php
include "partials/header.php";
require "users/users.php";

if (!isset($_POST)) {
    include "partials/not_found.php";
    exit;
}
$userId = $_POST['delete'];
$user = get_users_byId($userId);
if (!$user) {
    include "partials/not_found.php";
    exit;
}

delete_user($userId);
header("Location: index.php");

include "partials/footer.php";
