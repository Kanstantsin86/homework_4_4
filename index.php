<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Управление таблицами и базами данных</title>
    </head>
    <body>
        <?php
        require_once("connection.php");
        $user='newuser';
        $pass='newpass';
        $table = 'address_book';
        
        $cdb = $dbh->exec("CREATE DATABASE IF NOT EXISTS `$db`;
                    CREATE USER '$user'@'$host' IDENTIFIED BY '$pass';
                    GRANT ALL PRIVILEGES ON `$db`.* TO '$user'@'$host';
                    FLUSH PRIVILEGES;");
        
        $ct = $dbh->exec("CREATE TABLE IF NOT EXISTS $table (
                            `id` int NOT NULL AUTO_INCREMENT,
                            `name` varchar(50) NULL,
                            `address` varchar(100) NULL,
                            `phone` tinyint(15) NOT NULL DEFAULT '0',
                            PRIMARY KEY (`id`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
        
        $st = $dbh->prepare("SHOW TABLES");
        $st->execute();
        $tables = $st->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($tables);
        ?>
        <h2>Доступные таблицы текущей базы данныx:</h2>
        <?php foreach( $tables as $value ){
            foreach( $value as $key => $val ){
                echo '<a href="tableInfo.php?val='. $val .'">'. $val . '</a>';
            }
        } ?>
    </body>
</html>
