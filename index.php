<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Управление таблицами и базами данных</title>
    </head>
    <body>
        <?php
        /*Создать новую таблицу через php.
Сделать страницу, где будет выводиться список таблиц текущей базы данных. В каждую таблицу можно зайти и увидеть название и тип поля.
Добавить возможность удалить поле, изменить его тип или название.*/
        
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
        
        
        
        /*$q = $dbh->prepare("DESCRIBE ?");
        $q->execute(array($table));
        $table_fields = $q->fetchAll(PDO::FETCH_COLUMN);
        var_dump($table_fields);*/

        
        
        
        
        //$std = $db->prepare("DESCRIBE table_name");
        //$std->execute();
        //$rowsd = $std->fetch();
        //$rowsd = $std->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($rowsd);
        
        
        /*CREATE DATABASE db_name;// cоздание новой базы данных
        CREATE TABLE `students` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(50) NULL,
`estimation`float NOT NULL,
`budget` tinyint(4) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;// создание новой таблицы
    SHOW TABLES;//показать таблицы
DESCRIBE table_name;*/
        ?>
        <h2>Доступные таблицы текущей базы данныx:</h2>
        <?php foreach( $tables as $value ){
            foreach( $value as $val1 => $val2 ){
                echo '<a href="tableInfo.php?val2='. $val2 .'">'. $val2 . '</a>';
            }
        } ?>
        
    </body>
</html>
