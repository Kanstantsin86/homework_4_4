<!--DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Управление таблицами и базами данных</title>
    </head>
    <body-->
        <?php
        require_once("connection.php");
        $tablename = $_GET['val2'];
        //echo $tablename;
        $q = $dbh->prepare("DESCRIBE $tablename");
        $q->execute();
        $table_fields = $q->fetchAll(PDO::FETCH_COLUMN);
        //echo $table_fields;
        echo '<h3>Доступные поля таблицы ' . $tablename . ':</h3>';
        ?>

<table>
    <tr>
        <?php foreach( $table_fields as $field2 ){
                echo '<th>'. $field2 . '</th>';
        } ?>
    <tr>
    <tr>
        
    </tr>
</table>
    <!--/body>
</html-->