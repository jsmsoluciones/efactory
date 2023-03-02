<?php
include './config/database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $smtp = $connection->prepare($sql);
    $smtp->execute();
    $user = $smtp->fetchAll(PDO::FETCH_ASSOC);
    if (empty($user)) {
        header('Location: /login.php?err=not_found');
    } else {
        $hasEqual = 0;
        $changePass = 0;
        $pass = $user[0]['password'];
        if ($pass == 'admin') {
            $changePass = 1;
            if ($pass == $password) {
                $hasEqual = 1;
            }
        }
        if ($hasEqual == 0) {
            header('Location: /login.php?err=not_pass');
        } else {
            $_SESSION['usuario'] = $email;
            if ($changePass == 1) {
                setcookie('flash', 'Cambiar contraseña', time() + 24 * 60 * 60);
            }
            header('Location: /admin');
        }
    }
} else {
    if (isset($_SESSION['usuario'])) {
        header('Location: /admin/ ');
    }
    $messageError = '';
    switch (isset($_GET['err'])) {
        case 'not_found':
            $messageError = 'El usuario no existe';
            break;
        case 'not_pass':
            $messageError = 'Contraseña errada';
            break;
        default:
            $messageError = '';
    }
}
include('./partials/head.php');
include('./partials/header.php')
?>

<main class="container mb-4 mt-4">
    <?php
    if ($messageError != '') {
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