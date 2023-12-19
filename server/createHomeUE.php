<html>
<head>
    <meta charset="utf-8" />
    <title>Create Home Lobby</title>
</head>
<body>
<form action="createHomeUE.php" method="post">
    <label>createhomeue</label>
    <input type="text" name="createhomeue"><br>
    <label>name</label>
    <input type="text" name="name"><br>
    <label>token</label>
    <input type="text" name="token" maxlength="256"><br>
    <input type="submit" name="submit" value="submit">
   </form>
</body>
</html>

 <?php
include 'servertoken.php';
$createhomeue = filter_input(INPUT_POST, "createhomeue", FILTER_SANITIZE_STRING);
$newlobby = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$token = filter_input(INPUT_POST, "token", FILTER_SANITIZE_STRING);
$userid = 0;

if ($token == $servertoken) {
            if (!is_dir('lobbys/public/'.$newlobby)) {
            mkdir(('lobbys/public/'.$newlobby)); 
            file_put_contents('lobbys/public/'.$newlobby.'/currentuser.txt', $userid);
            file_put_contents('lobbys/public/'.$newlobby.'/userlist.txt', '');
             file_put_contents('lobbys/public/'.$newlobby.'/ruleset.txt', '');
           file_put_contents('lobbys/public/'.$newlobby.'/0.txt', '0');
            echo "<div class=style1><div class=style1><img src=images/EchoButton-GreyAngled-Success.png><br>";
            echo "<h1><b>",$newlobby,"</b></h1><div class=smText>Public Home Lobby Code</div></div></div>";
            file_put_contents('latestpub.txt', $newlobby);
        }
           else {
                echo "Lobby Locked. Please Try Again.";
            }
    }
?>
