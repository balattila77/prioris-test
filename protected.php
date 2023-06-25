<?php
    include 'header.php';
    require_once 'middleware.php';
    authenticate();
?>
    <h1>Prioris tesztfeladat - protected</h1>
    <a class="btn btn-primary" href="logout.php">Log Out</a>
    

<?php
    include 'footer.php';
?>