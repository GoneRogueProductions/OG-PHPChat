<?php
 
session_start();
 
if(isset($_GET['logout'])){    
     
    //Simple exit message
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("log2.html", $logout_message, FILE_APPEND | LOCK_EX);
     
    session_destroy();
    header("Location: index.php"); //Redirect the user
}
 
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
 
function loginForm(){
    echo
    '<div id="loginform">
    <h1>Please enter your name to continue!</h1>
    <form action="chat2.php" method="post">
      <label for="name">Name &mdash;</label>
      <input type="text" name="name" id="name" />
      <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
  </div>';
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
 
      <title>PHPChat</title>
      <style>
          .button {
         background-color: #2F02FF;
         border: none;
         border-radius: 12px;
         text-align: center;
         cursor: pointer;
         transition-duration: 0.4s;
         padding: 16px 16px;
         color: white;
         font-size: 20px;
        }
        .button:hover {
          background-color: white;
          color: black;
          border: 2px solid #2F02FF;
          box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .button span {
         cursor: pointer;
         display: inline-block;
         position: relative;
         transition: 0.5s;
        }
        .button span:after {
          content: '\00bb';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }
        .button:hover span {
          padding-right: 25px;
        }
        .button:hover span:after {
          opacity: 1;
          right: 0;
        }
      </style>
      
      
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/site.webmanifest">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="msapplication-TileColor" content="#2d89ef">
      <meta name="theme-color" content="#ffffff">


        <meta name="description" content="PHPChat: A no-faff simple chatroom" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
      <a href="https://phpchat.ml">
         <img alt="Qries" src="logo.png" class="logo/" height="170" onclick="location.href='/index.php';">
      </a>
      <h1>Chatroom 2 (Secondary Chatroom)</h1>
    <?php
    if(!isset($_SESSION['name'])){
        loginForm();
    }
    else {
    ?>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            </div>
 
            <div id="chatbox">
            <?php
            if(file_exists("log2.html") && filesize("log2.html") > 0){
                $contents = file_get_contents("log2.html");          
                echo $contents;
            }
            ?>
            </div>
 
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>
        </div>
      
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post2.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
 
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "log2.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
                        }
                    });
                }
 
                setInterval (loadLog, 2500);
 
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "chat2.php?logout=true";
                    }
                });
            });
        </script>
    </body>
</html>
<?php
}
?>
<a href="https://phpchat.ml/privacy-policy.html"><br>Privacy Policy •</a>
    <a href="/chat.php">Main Chat <br><br></a>

<button class="button" align="center" onclick="location.href='/index.php';"><span>Go back home!</span></button>