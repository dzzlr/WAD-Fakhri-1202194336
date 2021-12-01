    <?php
    session_start();
    $_SESSION = [];


    setcookie("id", "", time()-3600);
    setcookie("key", "", time()-3600);

    header("Location: Index.php")
    ?>