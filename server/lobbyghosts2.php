<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>lobbyGhosts</title>
</head>
<body>
    <form action="lobbyghosts2.php" method="post">
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

$range = file_get_contents($lobbypath.'currentuser.txt'); //Load count

$reporttmp = '';

for ($x = 1; $x <= $range; $x++) {
    if ($x != $id) {
        $currentreport = file_get_contents(($lobbypath.$x).'.txt');
        $reporttmp = "{$reporttmp}\n{$currentreport}";
    }
}
$manipulatedreport = explode("\n", $reporttmp); //Make Array

$finalreport = implode("\n", $manipulatedreport); //Restore local string prior to file output

    file_put_contents($lobbypath.$id.'frame.txt', $finalreport);

} else {
    echo "Token Failed";
}
?>