<?php
include './controllers/loginController.php';
include('./partials/encabezado.php');

session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: /admin/ ');
}

$messageError = 'Por favor, verifique sus credenciales.';
if (isset($_COOKIE['error_login'])) {
    $value = $_COOKIE['error_login'];
}
if ($value >= 4) {
    $messageError = 'Usuario bloqueado, favor esperar...';
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginCtrl = new LoginController();
    $result = $loginCtrl->getUser($email, $password);

    if (!$result) {
        if (isset($_COOKIE['error_login'])) {
            setcookie('error_login', $_COOKIE['error_login'] + 1, time() + 3600);
            $messageError = 'Por favor, verifique sus credenciales.';
            header('Location: /login ');
        } else {
            setcookie('error_login', 1, time() + 3600);
            header('Location: /login ');
        }
    } else {
        $_SESSION['usuario'] = $email;
        if ($password == 'admin') {
            setcookie('password', 1, time() + 3600);
        }
        header('Location: /admin');
    }
}

?>

<main class="container mb-4 mt-4">
    <?php
    if (isset($_COOKIE['error_login'])) {
        echo "
        <div class='alert alert-danger' role='alert'>
        $messageError
        </div>";
    }
    ?>
    <div class="card p-3 bg-light">
        <div class="d-flex d-flex justify-content-around">
            <h3>Inicio de sesión</h3>
        </div>
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            </div>
            <div class="d-flex d-flex justify-content-center">
                <input type="submit" value="Entrar" class="btn btn-lg from-control " style="background-color: var(--primary-color);">
                <a href="#" class="btn text-sm">Recordar contraseña</a>
            </div>
        </form>

    </div>
</main>

<?php include('./partials/footter.php') ?>