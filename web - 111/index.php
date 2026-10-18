<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>mywebsite</title>
        <link href="style/style.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <div id="container">
            <div id="header">
                <h1>PERTEMUAN 1 -- SISTEM PAKAR</h1>
            </div>
            
            <div id="sidebar">
                <h3>Navigasi</h3>
                <ul id="navmenu">
                    <li><a href="index.php" class="selected">Insert</a></li>
                    <li><a href="?module=lihat#pos">View</a></li>
                    <li><a href="?module=cari1#pos">Search</a></li>
                </ul>
            </div>

            <div id="page">
                <?php   if(isset($_GET['module']))
              			    include "konten/$_GET[module].php";
                        else
                            include "konten/home.php"; ?>
                <p>&nbsp;</p>
            </div>
            <div id="clear"></div>
            <div id="footer">
                <p>&copy;2019</p>
            </div>
        </div>
    </body>
</html>