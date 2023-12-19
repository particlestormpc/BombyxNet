<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ghostEval</title>
</head>
<body>
    <form action="webghost-eval.php" method="post">
        <label>name</label>
        <input type="text" name="name" maxlength="32"><br>
        <label>lobby</label>
        <input type="text" name="lobby" maxlength="8"><br>
        <label>type</label>
        <input type="text" name="type" maxlength="5"><br>
        <label>webid</label>
        <input type="text" name="webid" maxlength="4"><br>
        <label>data</label>
        <input type="text" name="data" maxlength="1024"><br>
        <label>token</label>
        <input type="text" name="token" maxlength="256"><br>
        <label>date</label>
        <input type="text" name="date" maxlength="32"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php
include 'servertoken.php';
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$lobby = filter_input(INPUT_POST, "lobby", FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
$webid = filter_input(INPUT_POST, "webid", FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, "data", FILTER_SANITIZE_STRING);
$token = filter_input(INPUT_POST, "token", FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
if ($token == $servertoken) {
    if ($type == 'false') {
        $lobbypath = ('lobbys/public/'.$lobby.'/');
    } else {
        $lobbypath = ('lobbys/private/'.$lobby.'/');
    }

$uppeddata = ($name.$data.$date.$webid.';'); //String this user data

    file_put_contents($lobbypath.$webid.'.txt', $uppeddata);

} else {
    echo "Token Failed";
}
?>