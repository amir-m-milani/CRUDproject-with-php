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

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_FILES['picture'])) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        //get file extension
        $fileType = explode("/", $_FILES['picture']['type']);
        $extension = $fileType[1];
        move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . "/images/$userId.$extension");
        update_user($_POST, $userId);
    }

    header("Location: index.php");
    // echo "<pre>";
    // var_dump($fileType);
    // echo "</pre>";
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update user :<b><?php echo $user['name'] ?></b></h3>
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?php echo $user['name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?php echo $user['username'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?php echo $user['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input name="website" value="<?php echo $user['website'] ?>" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label>Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>
                <button class="btn btn-success mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>