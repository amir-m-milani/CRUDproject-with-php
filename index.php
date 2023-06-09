<?php
require "users/users.php";
include "partials/header.php";
$users = get_users();


?>
<div class="container p-3">

    <p>
        <a class="btn btn-success" href="create.php">Create User</a>
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td>
                        <?php if (isset($user['extension'])) : ?>
                            <img style="width: 60px;" src="<?php echo "images/{$user['id']}.{$user['extension']}"; ?>" alt="">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><a href="http://www.<?php echo $user['website']; ?>" target="_blank"><?php echo $user['website']; ?></a></td>
                    <td>
                        <a href="view.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-info">View</a>
                        <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="delete" value="<?php echo $user['id']; ?>">
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include "partials/footer.php" ?>