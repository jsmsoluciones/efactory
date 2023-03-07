<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../partials/head.php');
include('../partials/header.php');
include('../controllers/categoryController.php');

$categoryCtrl = new CategoryController();
$categories = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryCtrl->add($_POST['name']);
}

$categories = $categoryCtrl->getAllCategories();
?>
<br>
<div class="container">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <h4 class="card-title">Categorías</h4>
        <button type='button' class='btn' style="background-color: var(--background-color); color:white" data-bs-toggle='modal' data-bs-target='#newModal'>
            Añadir</button>
    </div>
    <hr>
    <?php if (empty($categories)) { ?>
        <h3>Añade categorias a la base de datos</h3>
    <?php } else { ?>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                        <th scope="col "></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($categories as $category) { ?>
                        <tr class="">
                            <td scope="row"><?= $category['id'] ?></td>
                            <td><?= $category['nombre'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="/admin/editcategory?id=<?= $category['id'] ?>" role="button">Editar</a>
                                <a class="btn btn-danger" href="/admin/deletecategory?id=<?= $category['id'] ?>">Eliminar</a>
                            
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    <?php } ?>

</div>

<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Categoria</label>
                        <input type="text" class="form-control" name="name" placeholder="Nueva categoría" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="edit_name" class="col-form-label">Cambiar nombre:</label>
                        <input type="text" class="form-control" name="edit_name">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="id">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Cambiar</button>
            </div>
        </div>
    </div>
</div>

<script>
    const exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const recipient = button.getAttribute('data-bs-whatever')
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = `New message to ${recipient}`
        modalBodyInput.value = recipient
    })
</script>

<?php include('../partials/footter.php') ?>