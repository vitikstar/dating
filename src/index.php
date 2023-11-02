<?php
use app\db\DatabaseClass;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require '../vendor/autoload.php'; 

$userId = 1;

    try {
        $pdo = new DatabaseClass();
        $pdo->connect();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    if(isset($_GET["id"]) and !empty($_GET["id"])) {
        $id = (int)$_GET["id"];
        $sql = "SELECT 
                    SUM(CASE WHEN paid_to = $id THEN amount ELSE 0 END) -
                    SUM(CASE WHEN paid_by = $id THEN amount ELSE 0 END) as balance
                FROM transactions
                WHERE paid_to = $id OR paid_by = $id";

        $stmt = $pdo->getConnection()->prepare($sql);


        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($result, true);
    }

    $sql = "SELECT * FROM transactions";

        $stmt = $pdo->getConnection()->prepare($sql);


        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<ul>
    <?php foreach($row as $item): ?>
    <li><a href="?id=<?=$item['id']?>"><?=$item['id']?></a></li>
    <?php endforeach ?>
</ul>