<html>
<head>
    <meta charset="utf-8" />
    <title>Create FS Game</title>
</head>
<body>
<form action="createPrivateUE.php" method="post">
   <label>createprivateue</label>
   <input type="text" name="createprivateue">
   <label>name</label>
   <input type="text" name="name">
   <label>token</label>
   <input type="text" name="token" maxlength="256"><br>
  <input type="submit" name="submit" value="submit">
   </form>
</body>
</html>

<?php
include 'servertoken.php';
$newlobby = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$token = filter_input(INPUT_POST, "token", FILTER_SANITIZE_STRING);
$userid = 0;

$createprivateue = filter_input(INPUT_POST, "createprivateue", FILTER_SANITIZE_STRING);
if ($token == $servertoken) {
if ($createprivateue == 1) {
            if (!is_dir('lobbys/private/'.$newlobby)) {
            mkdir(('lobbys/private/'.$newlobby)); 
            file_put_contents('lobbys/private/'.$newlobby.'/currentuser.txt', $userid);
            file_put_contents('lobbys/private/'.$newlobby.'/userlist.txt', '');
            file_put_contents('lobbys/private/'.$newlobby.'/ruleset.txt', '');
            file_put_contents('lobbys/private/'.$newlobby.'/0.txt', '0');
            echo "<div class=style1><div class=style1><img src=images/EchoButton-GreyAngled-Success.png><br>";
            echo "<h1><b>",$newlobby,"</b></h1><div class=smText>Private Lobby Code</div></div></div>";
        }
           else {
                echo "Lobby Locked. Please Try Again.";
            }
    }
}
?>
