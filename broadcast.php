<?php
SESSION_START();
include "isLogin.php";
include "dbconn.php";
include "sql.php";
$sql = new sql();
$user = $sql->listUser();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link href="assets/css/broadcast.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <?php
            include './assets/js/scriptbefore.html';
            include './assets/css/css.html';
        ?>
    <title>Menu Notifications</title>
</head>

<body>

    <?php
    include './templates/header.html';

    ?>
    <h4 style="text-align: end;">Welcome back <strong><?php echo $_SESSION['username'] ?></strong></h4>
    <div id="page_broadcast">
        <h1 style="color: white;">Centre de Notifications</h1>
        <!-- <a href="liste_client.php">Accueill</a> | <a href="logout.php">Logout</a>
		<hr> -->
        <div class="container-fluid align-items-center">
            <div class="row col-12 align-content-center align-items-center" id="envoiNotification">
                <div class="col-4 align-content-center">
                    <form method="post" class="row g-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div id="topCreationNotifications" class="row g-3 col-12 d-flex justify-content-center">
                            <div class="form col-12 align-self-center">
                                <textarea name="msg" class="form-control" placeholder="Ecrivez votre message ici" id="floatingTextarea2" cols="5" style="height: 100px; color: grey; margin-bottom: 40px"></textarea>
                                <div class="dropdown justify-content-center">
                                    <select name="time" class="btn btn-secondary dropdown-toggle col-5" style="margin-right: 20px; margin-bottom: 20px" aria-label="Default select example">
                                        <option selected>Choisissez l'envoi</option>
                                        <option value="1">Maintenant</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select name="loops" class="btn btn-secondary dropdown-toggle col-5" style="margin-left: 20px; margin-bottom: 20px" aria-label="Default select example">
                                        <option selected>Combiens de fois</option>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                        ?>
                                            <option value="<?php echo $i ?>">
                                                <?php echo $i ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <select name="loop_every" class="btn btn-secondary dropdown-toggle col-5 " style="margin-right: 20px; margin-bottom: 20px" aria-label="Default select example">
                                        <option selected>Repeter dans ...</option>
                                        <?php
                                        for ($i = 1; $i <= 60; $i++) {
                                        ?>
                                            <option value="<?php echo $i ?>">
                                                <?php echo $i . " minutes" ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <select name="user" class="btn btn-secondary dropdown-toggle col-5" style="margin-left: 20px; margin-bottom: 20px" aria-label="Default select example">
                                        <option selected>Envoyer a ...</option>
                                        <?php
                                        foreach ($user[1] as $key) {
                                        ?>
                                            <option value="<?php echo $key['username'] ?>">
                                                <?php echo $key['username'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input class="btn btn-primary" name="submit" type="submit" value="Envoyer">
                            </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div id="notifications" class="col-8">
                    <?php
                    if (isset($_POST['submit'])) {
                        if (isset($_POST['msg']) and isset($_POST['time']) and isset($_POST['loops']) and isset($_POST['loop_every']) and isset($_POST['user'])) {
                            $msg = $_POST['msg'];
                            $time = date('Y-m-d H:i:s');
                            $loop = $_POST['loops'];
                            $loop_every = $_POST['loop_every'];
                            $user = $_POST['user'];
                            /*save Notification*/
                            $save = $sql->saveNotif($msg, $time, $loop, $loop_every, $user);
                            if ($save[0] == true) {
                                echo '* Notification enregistrée';
                            } else {
                                echo 'ereur dans l\enregistrement : ' . $save[1];
                            }
                        } else {
                            echo '* completez le parametre manquant';
                        }
                    }

                    // function archive(){
                    //     if (isset($_POST["id"])) {
                    //         $connect = new PDO('mysql:host=localhost;dbname=notifikasi', 'root', '');
                    //         $query = "
                    //                          INSERT INTO backup (SELECT * FROM notif WHERE id=id)
                    //                          ";
                    //         $statement = $connect->prepare($query);
                    //         $statement->execute(
                    //             array(
                    //                 ':id' => $_POST['id']
                    //             )
                    //         );
                    //     }}
                    ?>
                    <br>
                    <table id="tableau" class="table table-dark table-borderless align-items-center">
                        <thead class="col-12 sticky-top">
                            <tr>
                                <td class="board col-1" style="color: white; background: rgb(61, 152, 255)">No</td>
                                <td class="board col-3" style="color: white; background: rgb(61, 152, 255)">Next
                                    Schedule</td>
                                <td class="board col-6" style="color: white; background: rgb(61, 152, 255)">Message</td>
                                <td class="board col-1" style="color: white; background: rgb(61, 152, 255)">Remains</td>
                                <td class="board col-2" style="color: white; background: rgb(61, 152, 255)">User</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $a = 1;
                            $list = $sql->listNotif();
                            foreach ($list[1] as $key) {
                            ?>
                                <tr>
                                    <td class="board col-1">
                                        <?php echo $a ?>
                                    </td>
                                    <td class="board col-3">
                                        <?php echo $key['notif_time'] ?>
                                    </td>
                                    <td class="board col-6">
                                        <?php echo $key['notif_msg'] ?>
                                    </td>
                                    <td class="board col-1">
                                        <?php echo $key['notif_loop']; ?>
                                    </td>
                                    <td class="board col-2">
                                        <?php echo $key['username'] ?>
                                    </td>
                                </tr>
                            <?php
                                $a++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './assets/js/script.html';

    ?>
    <script src="mynotif.js"></script>
</body>

</html>