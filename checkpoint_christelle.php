<html>

<head>
    <meta name="description" content="Logiciel de gestion de process Montauban">
    <meta charset="utf-8">
    <title>Montauban Developpement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <?php
            include './assets/js/scriptbefore.html';
            include './assets/css/css.html';
        ?>
</head>

<body>

<?php
        include './templates/header.html';

?>
<div class="container">
    <div class="row">

        <table class="table table-hover text-center table-sortable">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Checks</th>
                    <th scope="col">ID Projet</th>
                    <th scope="col">Date</th>
                    <th scope="col">Client</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Envoi de devis</td>
                    <td><a href="liste_projet.php">0001</a></td>
                    <td>01/01/2021</td>
                    <td><a href="infos_client.php">0001</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>RDV</td>
                    <td>0002</td>
                    <td>01/01/2021</td>
                    <td>0002</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Contact Client</td>
                    <td>0003</td>
                    <td>01/01/2021</td>
                    <td>0003</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<?php
        // Fichier script qui regroupe tous les script qui doivent etre chargé après le chargement de la page
        include './assets/js/script.html';
    ?>

</body>
</html>