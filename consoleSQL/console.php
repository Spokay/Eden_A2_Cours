<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');
$databases = $conn->query("SHOW DATABASES")->fetch_all(MYSQLI_ASSOC);
if (isset($_GET['history'])){
    $history = explode(';',file_get_contents('historique.txt'));
    $queryLine = $history[$_GET['history']];
    $result = explode('|',$queryLine);
    $_POST['queryInput'] = $result[2];
    $_POST['bdd'] = $result[1];
}
if (!empty($_POST)){
    if (isset($_POST['deleteHistory'])){
        file_put_contents('historique.txt', '');
    }else{
        $query = $_POST['queryInput'];
        $selectedDB = $_POST['bdd'];
        $tables = $conn->query("SHOW TABLES FROM $selectedDB");
        $_SESSION['last_database'] = $selectedDB;
        $_SESSION['last_query'] = $query;
        $connected = mysqli_select_db($conn, $selectedDB);
        $res = $conn->query("$query");
        $rowsAffected = mysqli_affected_rows($conn);
        echo "<p>Query : $query </p>";
        echo "<p>Database : $selectedDB </p>";
        echo "<p>Tables in this database : ";
        while ($tab = $tables->fetch_assoc()){
            echo $tab['Tables_in_'.$selectedDB] . ' ';
        }
        echo '</p>';
        echo "<p>Affected row : $rowsAffected </p>";
        if ($rowsAffected <=0){
            echo "<strong class='fail'>Query failed </strong>";
            echo "<p class='error'>".mysqli_error($conn) . "</p>";
        }else{
            echo "<strong class='success'>Query successfull </strong>";
            $date = date("Y-m-d H:i:s", time());
            if ($id_history = fopen('historique.txt', 'a+')){
                fwrite($id_history, $date.'|'.$selectedDB.'|'.$query.';');
                fclose($id_history);
            }
            if (!is_bool($res)) {
                echo "<table class='table'>";
                echo "<thead class='thead-dark'>";
                $columns = $res->fetch_assoc();
                // mettre un if la requete est un SELECT
                foreach ($columns as $key => $val) {
                    echo "<th>$key</th>";
                }
                echo "</thead>";
                while ($donnees = $res->fetch_assoc()) {

                    echo "<tr>";
                    foreach ($donnees as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "<p>The result is a boolean</p>";
            }
        }
        if (isset($_GET['history'])){
            $_GET = [];
        }
    }

}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Console SQL</title>
    <style>

    </style>
</head>
<body>
    <form action="?realquery=true" method="post" class="query-form">
        <select name="bdd" id="bdd">
            <?php
            foreach ($databases as $val){
                if (isset($_SESSION['last_database']) && $val['Database'] === $_SESSION['last_database']){
                    echo "<option value='$val[Database]' selected>$val[Database]</option>";
                }else{
                    echo "<option value='$val[Database]'>$val[Database]</option>";
                }
            }
            ?>

        </select>
        <textarea name="queryInput" id="queryInput" cols="30" rows="10" placeholder="requête à éxecuter"><?php
            if (isset($_SESSION['last_query'])){
                echo $_SESSION['last_query'];
            } ?></textarea>
        <input type="submit" value="envoyer" class="btn">
    </form>
    <div class="history">
        <fieldset>
            <legend>History</legend>
            <ul style="list-style-type: none">
            <?php
            $history = explode(';',file_get_contents('historique.txt'));

            for($j = 0; $j < count($history); $j++){
                echo "<li><a href='?history=$j'>$history[$j]</a></li>";
            }
            ?>
            </ul>
            <form action="" method="post">
                <input type="submit" value="Delete queries history" name="deleteHistory" class="btn btn-delete">
            </form>
        </fieldset>
    </div>
</body>
</html>

<?php
mysqli_close($conn);