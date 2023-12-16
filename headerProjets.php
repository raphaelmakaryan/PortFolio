<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $projectId = $_GET['id'];



    if ($connection->connect_error) {
        die("Connection impossible: " . $connection->connect_error);
    }


    $result = $connection->query($query);

  
    $resultProjet = $connection->query($projet);

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
    while ($row = $resultProjet->fetch_assoc()) {
        echo "<div class='TextsHeader-box row'>";
        echo "<div class='TextsHeader' style='left:36%'>";
        echo "<h1 class='TitleHome projet'>";
        echo "<span>" . $row["TitreProjet"] . "</span>";
        echo "</h1>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "</header>";

    $result->close();

    $connection->close();
}
?>
