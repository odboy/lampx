<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo "hello LAMPX 5.6"; ?></title>
    </head>
    <body>

    <div>
        <div>
            <h3>Environment</h3>
            <hr>
            <div>
                <ul>
                    <li><?= apache_get_version(); ?></li>
                    <li>PHP <?= phpversion(); ?></li>
                    <li>
                        <?php
                        $link = mysqli_connect("mysql", "root", "LampxPass", null);

                        /* check connection */
                        if (mysqli_connect_errno()) {
                            printf("MySQL connecttion failed: %s", mysqli_connect_error());
                        } else {
                            /* print server version */
                            printf("MySQL Server %s", mysqli_get_server_info($link));
                        }
                        /* close connection */
                        mysqli_close($link);
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <h3>Quick Links</h3>
            <hr>
            <div>
                <ul>
                    <li><a href="http://localhost/phpinfo.php">phpinfo()</a></li>
                    <li><a href="http://localhost:8080">phpMyAdmin</a></li>
                    <li><a href="http://localhost/test_db.php">Test DB Connection</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>