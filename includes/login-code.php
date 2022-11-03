<?php
include_once '../ado/database.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pwd = $_POST['pwd'];
    $sql = "select * from personRole where username=? and pwd=?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("ss", $user, $pwd);
    $statement->execute();
    $result = mysqli_stmt_get_result($statement);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['pwd'] = $row['pwd'];

            header('location: ../index.php?nom=' . $_SESSION['nom'] . '');
        }
    } else {
        session_start();
        $_SESSION['error-message'] = "Username or password incorrect!";
        header('location: ../login.php?username=' . $user . '');
    }
    if ($_SESSION['username'] == 'directeur') {
        header('location: ../affectation.php?nom=' . $_SESSION['nom'] . '');
    }

}
