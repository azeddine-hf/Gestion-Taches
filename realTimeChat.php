<?php include('./include/security.php');
$pageTitle = 'Chat';
include './include/head-link.php';
include('./include/connect.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Real Time Data Display</title>
  </head>
  <body onload = "chats();">
    <script type="text/javascript">
      function chats(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
          document.getElementById("chats").innerHTML = this.responseText;
        }
        xhttp.open("GET", "chatup.php.php");
        xhttp.send();
      }

      setInterval(function(){
        chats();
      }, 1);
    </script>
    <div id="chats">

    </div>
  </body>
</html>