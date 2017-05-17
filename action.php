<?php

    $servername = "213.171.200.80";
    $username = "admin_website";
    $password = "K632j@fa&fq221";
    $dbname = "website";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $action = $_POST['action'];

    switch ($action) {
        case create:
            if (isset($_POST['name'])) {
                $name = htmlEntities($_POST['name']);
                $comment = htmlEntities($_POST['comment']);
                $section = htmlEntities($_POST['section']);

                $query = "INSERT INTO comments (section_id, comment, name, comment_date) VALUES ('$section', '$comment', '$name', NOW())";

                $result = $conn->query($query);
                $id = mysqli_insert_id($conn);
                echo $id;
            }
            break;

        case edit:
            if (isset($_POST['comment_id'])) {
                $comment_id = htmlEntities($_POST['comment_id']);
                $name = htmlEntities($_POST['name']);
                $comment = htmlEntities($_POST['comment']);

                $query = "UPDATE comments
                        SET name = '$name', comment= '$comment'
                        WHERE comment_id = '$comment_id'";
                $result = $conn->query($query);
            }
            break;

        case delete:
            if (isset($_POST['comment_id'])) {
                $comment_id = htmlEntities($_POST['comment_id']);

                $query = "DELETE from comments WHERE comment_id = '$comment_id'";
                $result = $conn->query($query);
            }
            break;

        case thumbs_update:
            if (isset($_POST['thumbs'])) {
                $section_id = htmlEntities($_POST['section_id']);
                $thumbs = htmlEntities($_POST['thumbs']);

                $query = "UPDATE sections SET thumbs = '$thumbs' WHERE section_id =  '$section_id'";
                $result = $conn->query($query);
            }
            break;
    }

    $conn->close();
?>
