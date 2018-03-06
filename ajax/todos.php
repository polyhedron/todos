<?php

$username = 'root';
$password = '';

try {

$dbh = new PDO('mysql:host=localhost;dbname=todos', $username, $password);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$stmt = $dbh->prepare("SELECT text FROM todos where userID = ?");


$todos = array();
if ($stmt->execute(array($_GET['userID']))) {

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $todos[] = $row['text'];
    }
}

echo json_encode($todos);