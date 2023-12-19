<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Remove User ID</title>
</head>
<body>
    <form action="removeid.php" method="post">
        <label>lobby</label>
        <input type="text" name="lobby" maxlength="8"><br>
        <label>type</label>
        <input type="text" name="type" maxlength="8"><br>
        <label>id</label>
        <input type="text" name="id" maxlength="4"><br>
        <label>token</label>
        <input type="text" name="token" maxlength="256"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php
include 'servertoken.php';
//if(isset($_POST["submit"])) {
$lobby = filter_input(INPUT_POST, "lobby", FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
$token = filter_input(INPUT_POST, "token", FILTER_SANITIZE_STRING);


if ($token == $servertoken) {
    if ($type == "true") {
        $lobbypath = ('lobbys/private/'.$lobby.'/');
    }
        else {
            $lobbypath = ('lobbys/public/'.$lobby.'/');
        }
    //$userlist = file_get_contents($lobbypath.'userlist.txt'); //Load existing multiuser List
    //$userlisted = "{$userlist}\n{$name}"; //Append this user at end
    $currentuser = file_get_contents($lobbypath.'currentuser.txt'); //Load existing multiuser List
    $currentuser = $currentuser - 1;
        if ($currentuser < 0) {
           $currentuser = 0;
       }
//    $currentuser = 1;
    file_put_contents($lobbypath.'currentuser.txt', $currentuser);
    //file_put_contents($lobbypath.'userlist.txt', $userlisted);

} else {
//    echo "
<br>
<br>";
    echo "Token Failed";
}
?>