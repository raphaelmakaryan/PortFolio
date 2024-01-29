<?php

session_start();



#region Projets

function projets()

{





    if ($connection->connect_error) {

        die("Connection impossible: " . $connection->connect_error);

    }



    $query = "SELECT * FROM `Projets`";

    $result = $connection->query($query);



    $imagesAcceuil = "SELECT * FROM `Projets`";

    $resultImg = $connection->query($imagesAcceuil);



    if (!$result) {

        die("Erreur dans la requête : " . $connection->error);

    }



    echo "<section class='Projets' id='projets'>";

    echo "<div class='row'>";

    echo "<h2>Mes projets</h2>";

    echo "<div class='LargeListBoxes'>";



    while ($row = $result->fetch_assoc()) {
        
        // if(strlen($row['ID']) > 3 ){
        //     echo strlen($row['ID']);
        // };

        echo "<div class='AProject'>";

        echo "<div class='TextOfProject'>";

        echo "<h3>" . $row["TitreHome"] . "</h3>";

        echo "<p>" . $row["DescHome"] . "</p>";
        
        echo "<h4>" . $row["sourceProjet"] . "</h4>";



        $langages = explode(", ", $row["LangHome"]);

        echo "<ul class='WhichProjectLanguage'>";

        foreach ($langages as $langage) {

            echo "<li>" . $langage . "</li>";

        }

        echo "</ul>";



        echo "<div class='LinkProjectPage'>";

        echo "<a class='LinkToPage' href='projet.php?id=" . $row['ID'] . "'>" . $row["MessageBouton"] . "<span>&rarr;</span></a>";

        echo "</div>";

        echo "</div>";



        if ($rowImg = $resultImg->fetch_assoc()) {

            echo "<div class='ProjectPresimage-box'>";
            
            if(!$rowImg["ImageHome"]){
                echo "<img class='ProjectPresimage img-responsive lazy' src='https://raphaelmakaryan.fr/IMAGES/wait.jpg'>";
            }else{
                echo"<img class='ProjectPresimage img-responsive lazy' src='" . $rowImg["ImageHome"] . "'>";
            }
            echo "</div>";

        }



        echo "</div>";

    }



    echo "</div>";

    echo "</div>";

    echo "</section>";







    $result->close();

    $connection->close();

}

#endregion Projets



#region Langages

function langage()

{

    $connection = new mysqli("109.234.160.244", "sc1umsk8002_raphportfolio", "BDDRaphPortfolio", "sc1umsk8002_portfolio");



    if ($connection->connect_error) {

        die("Connection impossible: " . $connection->connect_error);

    }



    $query = "SELECT * FROM `Langages`";

    $result = $connection->query($query);



    $texte = "SELECT `Texte` FROM `Langages`";

    $resultTexte = $connection->query($texte);



    if (!$result || !$resultTexte) {

        die("Erreur dans la requête : " . $connection->error);

    }



    echo "<section class='language' id='langages'>";

    echo "<div class='row'>";

    while ($row = $resultTexte->fetch_assoc()) {

        if ($row["Texte"] !== false && $row["Texte"] !== "") {

            echo "<h2>" . $row["Texte"] . "</h2>";

        }

    }

    echo "<div class='LanguagesDivImage'>";

    while ($row = $result->fetch_assoc()) {

        echo "<img class='LanguagesImages img-responsive lazy' src='" . $row["Image"] . "' alt='" . $row["Nom"] . "'>";

    }

    echo "</div>";

    echo "</div>";

    echo "</section>";

    $result->close();

    $connection->close();

}

#endregion Langages



#region Propos

function propos()

{

    $connection = new mysqli("109.234.160.244", "sc1umsk8002_raphportfolio", "BDDRaphPortfolio", "sc1umsk8002_portfolio");



    if ($connection->connect_error) {

        die("Connection impossible: " . $connection->connect_error);

    }



    $query = "SELECT * FROM `Propos`";

    $result = $connection->query($query);



    if (!$result) {

        die("Erreur dans la requête : " . $connection->error);

    }



    echo "<section class='APropos' id='a-propos'>";

    echo "<div class='row'>";

    while ($row = $result->fetch_assoc()) {

        echo "<h2>" . $row["Titre"] . "</h2>";

        echo "<div class='DivAPropos'>";

        echo "<div class='AProposText'>";

        echo "<p>" . $row["Description"] . "</p>";

        echo '<a href="'. $row["RedirectionBouton"] . '" class="AllButtons">'. $row["TexteBouton"] .'</a>';

        echo "</div>";

        echo "<div class='AProposPourImage'>";

        echo "<img class='AProposImage img-responsive lazy' src='" . $row["Image"] . "'>";

        // echo "<input type='button' onclick=\"location.href='" . $row["EmailBouton"] . "'\" value=\"" . $row["TexteBouton"] . "\">";

    }

    echo "</div>";

    echo "</section>";

    $result->close();

    $connection->close();

}

#endregion Propos



#region Contact

function contact()

{

    $connection = new mysqli("109.234.160.244", "sc1umsk8002_raphportfolio", "BDDRaphPortfolio", "sc1umsk8002_portfolio");



    if ($connection->connect_error) {

        die("Connection impossible: " . $connection->connect_error);

    }



    $query = "SELECT * FROM `Contact`";

    $result = $connection->query($query);



    if (!$result) {

        die("Erreur dans la requête : " . $connection->error);

    }

    echo "<section class='contact' id='contact'>";

    echo "<div class='row'>";

    while ($row = $result->fetch_assoc()) {

        echo "<h2>" . $row["Titre"] . "</h2>";

        echo "<div class='MeContacterInfo'>";

        echo "<p>" . $row["Description"] . "</p>";

        // echo "<input type='button' onclick=\"location.href='" . $row["EmailBouton"] . "'\" value=\"" . $row["TexteBouton"] . "\">";

        echo "<a href='mailto:" . $row["EmailBouton"] . "' class='AllButtons'>" . $row["TexteBouton"] . "</a>";

        echo "</div>";

    }

    echo "</div>";

    echo "</section>";

    $result->close();

    $connection->close();

}

#endregion Contact

?>



<html lang="fr">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="./IMAGES/logo.png">

    <meta name="description" content="Portfolio - MAKARYAN Raphael - Développeur Web & Mobile">

    <title>Portfolio - MAKARYAN Raphael</title>

    <link rel="stylesheet" href="./STYLE/style.css">

</head>



<body>

    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.4/dist/lazyload.min.js"></script>

    <main role="main">

        <?php

        include "./header.php";

        include "./acceuil.php";

        projets();

        langage();

        propos();

        contact();

        include "./footer.php";

        ?>

</body>



</html>