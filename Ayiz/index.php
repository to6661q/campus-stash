<!DOCTYPE html>
<html>

<head>
  <script language='JavaScript'>
    var txt = " AYIZ Academic System      ";
    var speed = 300;
    var refresh = null;

    function action() {
      document.title = txt;
      txt = txt.substring(1, txt.length) + txt.charAt(0);
      refresh = setTimeout("action()", speed);
    }
    action();
  </script>

  <link rel="shortcut icon" href="image/favicon.ico">
  <link rel="stylesheet" type="text/css" href="style/login.css">
  <link href="http://localhost:8080/ayiz/fontawesome5/css/fontawesome.css" type="text/css" rel="stylesheet">
</head>

<body>
  <div class="bg"></div>
  <form class="box" action="konten/loginproc.php" method="post">
    <h1 class="Glitch">Login</h1>
    <input type="text" name="username" placeholder="username" required="required">
    <input type="password" name="password" placeholder="Password" required="required">
    <input type="submit" value="Login">
  </form>

</body>

</html>