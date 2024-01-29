<?php


if ($connection->connect_error) {
    die("Connection impossible: " . $connection->connect_error);
}

$query = "SELECT * FROM `Footer` WHERE 1;";
$result = $connection->query($query);

$credit = "SELECT `Texte` FROM `Footer` WHERE 1;";
$resultcredit = $connection->query($credit);

if (!$result || !$resultcredit) {
    die("Erreur dans la requête : " . $connection->error);
}
echo "<footer role='contentinfo' class='footer'>";
echo "<div class='row'>";
echo "<ul class='FooterLienSociaux'>";
while ($row = $result->fetch_assoc()) {
    echo "<li class='FooterLienSociauxListes'>";
    echo "<a href='" . $row["Redirection"] . "' target='_blank' title='" . $row["Alt"] . "' >";
    echo "<img class='ImageDuLienSociaux img-responsive lazy' src='" . $row["Image"] . "'>";
    echo "</a>";
}
echo "</li>";
echo "</ul>";
while ($row = $resultcredit->fetch_assoc()) {
    echo "<p>" . $row["Texte"] . "</p>";
}
echo "</div>";
echo "</footer>";


$result->close();
$connection->close();
?>



<a href="#top" class="deretourenhaut" title="RetourEnHaut">
    <img src="./IMAGES/flechehaut.svg" alt="RetourEnHaut" class="RetourEnHautImage img-responsive lazy" />
</a>
<a href="./index.php#projets" class="retourmenuPop" title="RetourMenu">
    <p alt="RetourMenu" class="RetourMenuTexte">RETOUR</p>
</a>
<script src="./JS/index.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        let lazyLoadInstance = new LazyLoad();
        lazyLoadInstance.update();
    });
</script>