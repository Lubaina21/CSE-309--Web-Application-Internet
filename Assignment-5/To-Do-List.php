<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['Task'];

    echo $task;

    $link = mysqli_connect("localhost", "root", "", "to-do");

    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM to_do WHERE task='$task'";

    $result = mysqli_query($link, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                // Process retrieved tasks here
                $taskText = htmlspecialchars($row['task']);
                echo "<li>" . $taskText . "</li>";
            }
            echo "</ul>";
            mysqli_free_result($result);
        } else {
            echo "No task found!";
        }
    } else {
        echo "Something is wrong. " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
