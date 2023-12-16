<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $projectId = $_GET['id'];

    function infoProjet($projectId)
    {
        if ($connection->connect_error) {
            die("Connection impossible: " . $connection->connect_error);
        }

        $query = "SELECT * FROM `Projets` WHERE ID = $projectId";
        $result = $connection->query($query);

        if ($result) {
            $projectInfo = $result->fetch_assoc();
            echo "<section class='APropos'>";
            echo "<div class='row'>";
            echo "<h2>" . $projectInfo["TitreProjet"] . "</h2>";
            echo "<div class='DivAPropos'>";
            echo "<div class='AProposText'>";
            echo "<p>" . $projectInfo["DescProjet"] . "</p>";
            echo "</div>";
            echo "<div class='AProposPourImage'>";
            echo "<img class='AProposImage img-responsive lazy' src='" . $projectInfo["ImageAccProjet"] . "'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
            $result->close();
        }
        $connection->close();
    }
    function galerieProjet($projectId)
    {
        if ($connection->connect_error) {
            die("Connection impossible: " . $connection->connect_error);
        }

        $query = "SELECT * FROM `GalerieProjets` WHERE ID = $projectId";
        $result = $connection->query($query);

        if ($result && $result->num_rows > 0) {
            $projectInfo = $result->fetch_assoc();
            if (!empty($projectInfo["Image"])) {
                echo "<section class='Projets'>";
                echo "<div class='row'>";
                echo "<h2>Images :</h2>";
                echo "<div class='LargeListBoxes'>";
                $images = explode(",", $projectInfo["Image"]);
                foreach ($images as $image) {
                    echo "<div class='AProject'>";
                    echo "<div class='ProjectPresimage-box'>";
                    echo "<img src='" . trim($image) . "' class='ProjectPresimage img-responsive lazy' alt='' data-pagespeed-url-hash='123456789' onload='pagespeed.CriticalImages.checkImageForCriticality(this);'>";
                    echo "</div>";
                    echo "</div>";
                }

                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</section>";
            }
            $result->close();
        }
        $connection->close();
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./IMAGES/logo.png" />
    <meta name="description" content="Portfolio - MAKARYAN Raphael - Développeur Web & Mobile">
    <title>Portfolio - MAKARYAN Raphael</title>
    <link rel="stylesheet" href="./STYLE/style.css">
</head>
<main role="main">
    <?php
    include "./headerProjets.php";
    infoProjet($projectId);
    ?>
</main>

<?php
galerieProjet($projectId);
include "./footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.4/dist/lazyload.min.js"></script>