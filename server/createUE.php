<html>
<head>
    <meta charset="utf-8" />
    <title>Create FS Game</title>
</head>
<body>
<form action="createUE.php" method="post">
    <input type="text" name="createpublicue">
    <input type="text" name="token" maxlength="256">
    </form>
</body>
</html>
 
<?php
function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
}
    return $str;
}
include 'servertoken.php';

$newlobby = randomString(6);
$userid = 0;

$createpublicue = filter_input(INPUT_POST, "createpublicue", FILTER_SANITIZE_STRING);
$token = filter_input(INPUT_POST, "token", FILTER_SANITIZE_STRING);
if ($token == $servertoken) {
if ($createpublicue == 1) {
            if (!is_dir('lobbys/public/'.$newlobby)) {
            mkdir(('lobbys/public/'.$newlobby)); 
            file_put_contents('lobbys/public/'.$newlobby.'/currentuser.txt', $userid);
            file_put_contents('lobbys/public/'.$newlobby.'/userlist.txt', '');
            file_put_contents('lobbys/public/'.$newlobby.'/ruleset.txt', '');
            file_put_contents('lobbys/public/'.$newlobby.'/0.txt', '0');
            echo "<div class=style1><div class=style1><img src=images/EchoButton-GreyAngled-Success.png><br>";
            echo "<h1><b>",$newlobby,"</b></h1><div class=smText>Public Lobby Code</div></div></div>";
            file_put_contents('latestpub.txt', $newlobby);
        }
           else {
                echo "Lobby Locked. Please Try Again.";
            }
    }
}
?>