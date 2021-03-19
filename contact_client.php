<html>

<head>
    <meta name="description" content="Logiciel de gestion de process Montauban">
    <meta charset="utf-8">
    <title>Montauban Developpement</title>
    <?php
            // Fichier scriptbefore qui regroupe tous les script qui doit etre chargé avant la page
            include './assets/js/scriptbefore.html';
            // Fichier css.html qui regroupe tous les css
            include './assets/css/css.html';
        ?>
</head>

<body>
    <?php
        // templates qui regroupe les pages visible
        include './templates/header.html';
        include './templates/contact_client.html';
    ?>
    <?php
        // Fichier script qui regroupe tous les script qui doivent etre chargé après le chargement de la page
        include './assets/js/script.html';
    ?>
    <script src="mynotif.js"></script>
</body>

</html>