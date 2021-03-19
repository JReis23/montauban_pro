<?php

//// Event on click in calendar

//insert.php

// $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

// if (isset($_POST["submit"])) {
//     $query = "
//  INSERT INTO events 
//  (title, start_event, end_event) 
//  VALUES (:title, :start_event, :end_event)
//  ";
//     $statement = $connect->prepare($query);
//     $statement->execute(
//         array(
//             ':title'  => $_POST['title'],
//             ':start_event' => $_POST['start'],
//             ':end_event' => $_POST['end']
//         )
//     );
// }


//Event with input

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $start_event = $_POST['start_event'];
    $end_event = $_POST['end_event'];
    $color = $_POST['color'];

    $dbconnect = mysqli_connect('localhost', 'root', '', 'testing');

    $sql = mysqli_query($dbconnect, "INSERT into events(title, start_event, end_event, color) VALUES('$title', '$start_event', '$end_event', '$color')");

    
    }

?>