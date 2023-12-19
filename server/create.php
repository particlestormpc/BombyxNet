<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Create FS Game</title>

<!-- FS -->
<style type="text/css">
<!--
@import url(FS.css);
-->
</style>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body>
<a name="top"></a>
<div class="background" align="center">
<div class="pagelayout" align="center">
  <div class="fixedTopLeft"><?php include("FS-Icon96.html"); ?></div>
<!-- <?php include("logo192.html"); ?> -->
<img src="images/FlamingoShutdown-BlackText.png" alt="Flamingo Shutdown" width="75%" border="0" pad="0" align="center" /><br>
  <div class="fixedTopRight"><?php include("FS-Discord.html"); ?></div>
<br>

  <div class="style1" align="center"><img src="images/createlobby.png" alt="Create a Lobby" width="438" height="41" border="0" pad="0" align="center" /><br>
</div>

  <div class="singleColumnWhite">
  <div class="style5columnM" align="center">

  
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

$newlobby = randomString(6);
$userid = 0;

    if (isset($_POST['CreatePublic_x'])) {
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
                echo "Public Lobby Locked. Please Try Again.";
            }
    }
    if (isset($_POST['CreatePrivate_x'])) {
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
                echo "Private Lobby Locked. Please Try Again.";
            }
    }
?>


<form method="post">

    <div class="style5columnL" align="center">
    <input type="image" name="CreatePublic" alt="Create Public" label="Create Public"  src="images/EchoButton-GreyAngled-Public.png" width="50%">
    <br>
    <input type="hidden" name="CreatePublicUE">
    <input type="hidden" name="CreateHomeUE">
    <input type="hidden" name="Token">
    <input type="image" name="CreatePublic" alt="Create Public" label="Create Public"  src="images/WANTED-Georgie-FlamingoShutdown320x414.png" width="50%"><br>
    <i>Listed in <a href="activegames.php">Active Games</a> Directory</i><br>
    </div>

   	<div class="style5columnR" align="center">
    <input type="image" name="CreatePrivate" alt="Create Private" label="Create Private" src="images/EchoButton-GreyAngled-Private.png" width="50%">
    <input type="hidden" name="Token">
    <br>
    <input type="image" name="CreatePrivate" alt="Create Private" label="Create Private" src="images/4xAnime-george-smokingLOCKED320x414.png" width="50%"><br>
    <i>Unlisted - Share Code Manually</i><br>
    </div>

    </form>
    <br>
  <br></div>
  <b>Join <a href="https://discord.gg/vPWjNxx6Kd" target="_blank">Discord</a> for Voice Chat</b><br>
  <div class="smText"><i>VOIP & P2P Servers Soon</i>
</div>
</div>

<div class="copyrightBG"><div align="center" class="copyrightText"><a href="http://www.particlestorm.org"><img src="images/particlestormIconLogoWhite60x46a.png" /><br>© Particle Storm Digital Productions</a></div></div>  
<br>
</body>
</html>

