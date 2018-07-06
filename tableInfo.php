<!--DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Управление таблицами и базами данных</title>
    </head>
    <body-->
        <?php
        require_once("connection.php");
        $tablename = $_GET['val'];
        $q = $dbh->prepare("DESCRIBE $tablename");
        $q->execute();
        $table_fields = $q->fetchAll(PDO::FETCH_COLUMN);
        //var_dump ($table_fields);
        $p = $dbh->prepare("SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ?");
        $p->execute(array($tablename));
        $fields_meta = $p->fetchAll(PDO::FETCH_COLUMN);
        //var_dump ($fields_meta);
        echo '<h3>Доступные поля таблицы ' . $tablename . ':</h3>';
        ?>

        <table>
            <tr>
            <?php foreach( $table_fields as $field ){
                echo '<th>'. $field . '</th>';
            } ?>
            </tr>
            <tr>
            <?php foreach( $fields_meta as $meta ){
                echo '<td>'. $meta . '</td>';
            } ?>
            </tr>
        </table>
    </body>
</html>
