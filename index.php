<!DOCTYPE html>
<html lang=en>
  <head>
    <title>PHPChat: A no-faff chat room</title>
    <meta charset="utf-8" />
    <meta name="description" content="PHPChat: A no-faff simple chatroom" />
    <link type="text/css" rel="stylesheet" href="/style.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://kit.fontawesome.com/049529442a.js" crossorigin="anonymous"></script>
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">
    <style>
      .chat1 {
        float: left;
        margin: 50px;
        font-family: TT;
      }
      .chat2 {
        float: right;
        margin: 50px;
        font-family: TT;
      }
      .pp {
        float: left;
        margin: 50px;
        font-family: TT;
      }
      .test {
        float: right;
        margin: 50px;
        font-family: TT;
      }
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
  </head>
  <body>
    <img class="logo" src="/logo.png" onclick="location.href='/index.php';">
    <div class="chat1">
      <b>Enter the 1st chatroom<br><br></b>
      <button type="submit" onclick="location.href='/chat.php';" class="button"><span>Click me to enter!</span></button>
    </div>
    <div class="chat2">
      <b>Enter the 2nd chatroom<br><br></b>
      <button type="submit" class="button" onclick="location.href='/chat2.php';"><span>Click me to enter!</span></button>
    </div>
    <div class="pp">
      <b>View our privacy policy<br><br></b>
      <button type="submit" class="button" onclick="location.href='/privacy-policy.html';"><span>Click me to be redirected!</span></button>
    </div>
    <div class="test">
      <b>Admin panel<br><br></b>
      <button type="submit" class="button" onclick="location.href='/admin.php';"><span>Click me to enter!</span></button>
  </body>
</html>