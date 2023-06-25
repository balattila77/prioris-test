<?php
    require_once __DIR__ . '/vendor/autoload.php';
    require 'header.php';    
    use App\User;

    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
        header('Location: protected.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $user = new User($db);
        $authenticated = $user->authenticateUser($username, $password); 
    
        if ($authenticated) {
            $_SESSION['authenticated'] = true;
            // Redirect to the protected page
            header('Location: protected.php');
            exit();
        } else {            
            header('Location: login.php?error=1');
            exit();
        }
    }


    $error = isset($_GET['error']) && $_GET['error'] === '1';

    



?>
    <h1>Prioris tesztfeladat - login</h1>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <?php if ($error) : ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid username or password. Please try again.
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="login.php">
                        <div class="mb-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require 'footer.php';
?>
