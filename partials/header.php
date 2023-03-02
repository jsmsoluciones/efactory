<header>
    <img src="/imgs/logo.png" alt="Efactory Coffee" width=100px height=100px />
    <nav>
        <ul>
            <li>
                <a href="/">Nosotros</a>
            </li>
            <li>
                <a href="/store">Tienda</a>
            </li>
            <li>
                <a href="#">Contacto</a>
            </li>
            <?php
            if (isset($_SESSION['usuario'])) {
                echo "<li><a href='/admin/'>Dashboard</a></li>";
                echo "<li><a href='/logout'>Salir</a></li>";
            } else {
                echo "<li><a href='/login'>login</a></li>";
            }
            ?>
            <li>
                <a href="#">
                    <Image src="/imgs/search.svg" alt="buscar" width=20px height=20px />
                </a>
            </li>
            <li>
                <a href="/">
                    <Image src="/imgs/car.svg" alt="shop car" width=20px height=20px />
                </a>
            </li>
        </ul>
    </nav>
</header>
<?php if (isset($_SESSION['usuario'])) { ?>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <span class="navbar-text">
                <?php print_r($_SESSION['usuario']) ?>
            </span>
            <a class="btn btn-sm btn-outline-secondary mx-2" href="#">Categorías</a>
            <a class="btn btn-sm btn-outline-secondary" href="#">Produtos</a>
            <a class="btn btn-sm btn-outline-secondary mx-2" href="#">Usuarios</a>
        </form>
    </nav>
<?php  } ?>