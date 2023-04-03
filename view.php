<?php
require "users.php";
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
?>

<div class="container">
    <table class="table">
        <tr>
            <th>Name</th>
            <td><?php echo $user['id']; ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?php echo $user['username']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?php echo $user['phone']; ?></td>
        </tr>
        <tr>
            <th>Website</th>
            <td><a href="http://www.<?php echo $user['website']; ?>" target="_blank"><?php echo $user['website']; ?></a></td>
        </tr>
    </table>
</div>

<?php include "partials/footer.php"; ?>