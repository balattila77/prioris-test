<?php
    require_once __DIR__ . '/vendor/autoload.php';

    include 'header.php';
    use App\User;

    $user = new User($db);

    if (!$user->checkAdminUser()) {
        $user->createAdminUser();
    } 
?>
    <h1>Prioris tesztfeladat</h1>
    <p>
        User: admin<br>
        Pwd: admin
    </p>
    
<?php
    include 'footer.php';
?>
