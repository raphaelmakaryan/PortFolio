<?php


if ($connection->connect_error) {
    die("Connection impossible: " . $connection->connect_error);
}


$result = $connection->query($query);

if (!$result) {
    die("Erreur dans la requête : " . $connection->error);
}

echo "<header class='header' role='banner'>";
echo "<div class='row'>";
echo "<nav class='nav' role='navigation'>";
echo "<ul class='nav'>";
while ($row = $result->fetch_assoc()) {
    echo "<li class='NavTitles'>";
    echo "<a href='" . $row["Redirection"] . "' class='NavLien'>";
    echo $row["Nom"];
    echo "</a>";
    echo "</li>";
}
echo "</ul>";
echo "</nav>";
echo "</div>";
echo "</div>";

$result->close();

$connection->close();
?>