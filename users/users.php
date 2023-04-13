<?php

function get_users()
{
    return json_decode(file_get_contents(__DIR__ . "./users.json"), true);
}

function get_users_byId($id)
{
    $users = get_users();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function creat_user($data)
{
    $users = get_users();
    $user['id'] = rand(1000, 2000);
    $user = array_merge($user, $data);
    array_push($users, $user);
    file_put_contents(__DIR__ . "/users.json", json_encode($users, JSON_PRETTY_PRINT));

    if (!empty($_FILES["picture"]["name"])) {
        uploadImage($_FILES, $user);
    }


    header("Location: index.php");
}

function update_user($data, $id)
{
    $theUser = [];
    $users = get_users();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $theUser = array_merge($user, $data);
        }
    }

    file_put_contents(__DIR__ . "/users.json", json_encode($users, JSON_PRETTY_PRINT));
    return $theUser;
}

function delete_user($id)
{
}


function uploadImage($file, $user)
{
    if (!is_dir(dirname(__DIR__) . "/images")) {
        mkdir(dirname(__DIR__) . "/images");
    }
    //get file extension
    $extension = explode("/", $file['picture']['type'])[1];
    move_uploaded_file($file['picture']['tmp_name'], dirname(__DIR__) . "/images/{$user['id']}.$extension");
    $user["extension"] = $extension;
    update_user($user, $user['id']);
}
