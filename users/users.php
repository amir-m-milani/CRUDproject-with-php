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
