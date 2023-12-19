<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Get User ID</title>
</head>
<body>
    <form action="getid.php" method="post">
        <label>name</label>
        <input type="text" name="name" maxlength="32"><br>
        <label>lobby</label>
        <input type="text" name="lobby" maxlength="8"><br>
        <label>type</label>
        <input type="text" name="type" maxlength="5"><br>
        <label>token</label>
        <input type="text" name="token" maxlength="256"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php
include 'servertoken.php';
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$lobby = filter_input(INPUT_POST, "lobby", FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
$token = filter_input(INPUT_POST, "token", FILTER_SANITIZE_STRING);

if ($token == $servertoken) {
    if ($type == "true") {
        $lobbypath = ('lobbys/private/'.$lobby.'/');
    }
        else {
            $lobbypath = ('lobbys/public/'.$lobby.'/');
        }

$userlist = file_get_contents($lobbypath.'userlist.txt'); //Load existing data
$userlisted = "{$userlist}\n{$name}"; //Append this user at end

$currentuser = file_get_contents($lobbypath.'currentuser.txt'); //Load existing data
$currentuser = $currentuser + 1; //Increment

    file_put_contents($lobbypath.'currentuser.txt', $currentuser);
    file_put_contents($lobbypath.'userlist.txt', $userlisted);

} else {
    echo "Token Failed";
}
?>