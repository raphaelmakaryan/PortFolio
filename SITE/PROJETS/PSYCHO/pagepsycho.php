<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="favicon" type="image/png" href="../../logo.png" />
  <meta name="description" content="Portfolio - MAKARYAN Raphael - Développeur Web & Mobile">
  <title>Portfolio - MAKARYAN Raphael</title>
  <link rel="stylesheet" href="../../CSS/cssprojets.css">
</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.4/dist/lazyload.min.js"></script>

  <?php
  // if (strpos($_SERVER['REQUEST_URI'], '/Portfolio/SITE/PROJETS/PSYCHO/pagepsycho.php') !== false) {
  //   $new_url = str_replace('Portfolio/SITE/PROJETS/PSYCHO/pagepsycho.php', 'psychoshop', $_SERVER['REQUEST_URI']);
  //   header('Location: ' . $new_url);
  //   exit;
  // }
  ?>


  <main role="main">



    <?php
    include "header.php";
    include "informations.php";
    include "gallerie.php";
    include "footer.php";
    ?>