<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>discEval</title>
</head>
<body>
    <form action="webdisc-eval.php" method="post">
        <label>lobby</label>
        <input type="text" name="lobby" maxlength="8"><br>
        <label>type</label>
        <input type="text" name="type" maxlength="5"><br>
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
$lobby = filter_input(INPUT_POST, "lobby", FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, "data", FILTER_SANITIZE_STRING);
$token = filter_input(INPUT_POST, "token", FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);

if ($token == $servertoken) {
    if ($type == 'false') {
        $lobbypath = ('lobbys/public/'.$lobby.'/');
    } else {
        $lobbypath = ('lobbys/private/'.$lobby.'/');
    }

$uppeddata = ($data.$date); //String this user data

    file_put_contents($lobbypath.'disc.txt', $uppeddata);

} else {
    echo "Token Failed";
}
?>