<?php



if ($connection->connect_error) {
    die("Connection impossible: " . $connection->connect_error);
}


$result = $connection->query($query);

if (!$result) {
    die("Erreur dans la requête : " . $connection->error);
}

echo "<div class='TextsHeader-box row'>";
echo "<div class='TextsHeader'>";
while ($row = $result->fetch_assoc()) {
    echo "<h1 class='TitleHome'>";
    echo "<span>" . $row["Titre"] . "</span>";
    echo "</h1>";
    echo "<p>" . $row["Metier"] . "</p>";

    echo "<a href='" . $row["RediBouton"] . "' class='AllButtons'>" . $row["MessageBouton"] . "</a>";
}
echo "</div>";
echo "</header>";
$result->close();
$connection->close();
?>