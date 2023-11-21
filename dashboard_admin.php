<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<style>
        body {
            background-color:#ffffff; 
        }

        .container {
            text-align: center; 
            margin-top:50px; 
           
        }
        .nav {
            text-align: center; 
            margin-top:50px; 
            background-color:#000040 ;
        }

        h2 {
            color: white; 
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
            font-size: 54px;   
        }

        .container, .modal-content {
            text-align: center; 
            margin-top: 5px; 
        }
        .table {
            width: 90%; 
            margin: 10px auto; 
        }
        .table th, .table td {
            text-align: center;
          
        }
        .table thead {
            background-color: #ffffff !important;
            color: white; 
        }


        .table tbody tr:nth-child() {
            background-color: #804000; 
        }
   
        form {
            margin-top: 20px; 
            margin-right: 20px; 
            text-align: left;
        }

        input[type="submit"] {
            background-color: #4CAF50; 
            color: white; 
            padding: 10px 20px; 
            font-size: 16px; 
            border: none; 
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .conte{ 
            text-align: center; 
            margin-top:50px; 
            background-color: #000040;
        
        }
        
        .navbar {
            background-color: #000040; 
        }

        .navbar-text {
            color: white; 
        }

        

    </style>

<body>

<?php

include 'database.php';
$database = new Database();

$datosAdmin = $database->obtenerNombreAdmin();
$nombreAdmin = $datosAdmin['Nombres'];
$rolAdmin = $datosAdmin['Rol'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_revisor'])) {
    header("Location: formu.html");
    exit();
    }
?>

<nav class="navbar">
    <div class="container">
       
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="Logo" height="40">
        </a>

        <span class="navbar-text">
            Programación Web
        </span>

        <!-- Bienvenida y nombre del administrador -->
        <div class="ml-auto">
            <span class="navbar-text">Bienvenido, <?php echo $rolAdmin . ' ' . $nombreAdmin; ?></span>
        </div>
    </div>
</nav>


<!-- Incluye Bootstrap JS y jQuery al final del cuerpo del documento -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




<div class="conte">
    <h2> Revisores</h2>
</div>
    

<div class="container">
   
    <form method="post">
    <input type="submit" name="agregar_revisor" value="Agregar Nuevo Revisor">
    </form>



    <!-- Tabla de revisores -->
    <table class="table mt-3">
    <thead>
    <tr>
        <th>ID</th>
        <th>Grado Académico</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Cubículo</th>
        <th>Detalles</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    </thead>
    <tbody>
        <?php
        include 'crud.php';
     
        $revisores = getRevisores(); 
        foreach ($revisores as $revisor) {
            echo "<tr>";
            echo "<td>{$revisor['id']}</td>";
            echo "<td>{$revisor['grado_academico']}</td>";
            echo "<td>{$revisor['nombres']}</td>";
            echo "<td>{$revisor['apellidos']}</td>";
            echo "<td>{$revisor['cubiculo']}</td>";
            echo "<td><a href='detalles_revisor.php?id={$revisor['id']}'><img src='img/ojo.png' alt='Detalles' width='40' height='auto'></a></td>";
            echo "<td><a href='#' class='btn btn-primary btn-edit' data-toggle='modal' data-target='#editRevisorModal' data-id='{$revisor['id']}' data-grado='{$revisor['grado_academico']}' data-nombres='{$revisor['nombres']}' data-apellidos='{$revisor['apellidos']}' data-cubiculo='{$revisor['cubiculo']}'><img src='img/editar.png' alt='Editar' width='40' height='auto'></a></td>";

            echo "<td><a href='#' class='btn btn-danger btn-delete' data-toggle='modal' data-target='#confirmDeleteModal' data-id='{$revisor['id']}'><img src='img/eliminar.png' alt='Eliminar' width='40' height='auto'></a></td>";


            echo "</tr>";
        }?>
    </tbody>
    </table>  
</div>

 

<!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este revisor?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal para editar revisor -->
<div class="modal fade" id="editRevisorModal" tabindex="-1" aria-labelledby="editRevisorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRevisorModalLabel">Editar Revisor</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
 <!-- Formulario para editar revisor -->
<form id="editRevisorForm" method="post" action="editar_revisor.php">
    <input type="hidden" id="editRevisorId" name="id">
    <div class="mb-3">
        <label for="editGrado" class="form-label">Nuevo Grado Académico:</label>
        <input type="text" class="form-control" id="editGrado" name="grado" required>
    </div>
    <div class="mb-3">
        <label for="editNombres" class="form-label">Nuevos Nombres:</label>
        <input type="text" class="form-control" id="editNombres" name="nombres" required>
    </div>
    <div class="mb-3">
        <label for="editApellidos" class="form-label">Nuevos Apellidos:</label>
        <input type="text" class="form-control" id="editApellidos" name="apellidos" required>
    </div>
    <div class="mb-3">
        <label for="editCubiculo" class="form-label">Nuevo Cubículo:</label>
        <input type="text" class="form-control" id="editCubiculo" name="cubiculo" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
    
    $('.btn-edit').click(function () {
       
        var id = $(this).data('id');
        var grado = $(this).data('grado');
        var nombres = $(this).data('nombres');
        var apellidos = $(this).data('apellidos');
        var cubiculo = $(this).data('cubiculo');

        // Asignar los valores a los campos del formulario modal de edición
        $('#editRevisorModal #editRevisorId').val(id);
        $('#editRevisorModal #editGrado').val(grado);
        $('#editRevisorModal #editNombres').val(nombres);
        $('#editRevisorModal #editApellidos').val(apellidos);
        $('#editRevisorModal #editCubiculo').val(cubiculo);

        // Mostrar el formulario modal de edición
        $('#editRevisorModal').modal('show');
    });

    // Manejar el envío del formulario de edición a través de AJAX
    $('#editRevisorForm').submit(function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'editar_revisor.php',
            data: $('#editRevisorForm').serialize(),
            success: function (response) {
                alert(response);
                $('#editRevisorModal').modal('hide');
                location.reload();
            }
        });
    });
});

        $(document).ready(function () {
            $('.btn-delete').click(function () {
                var id = $(this).data('id');
                $('#confirmDeleteBtn').data('id', id);
                $('#confirmDeleteModal').modal('show');
            });

            $('#confirmDeleteBtn').click(function () {
                var id = $(this).data('id');

                $.ajax({
    type: 'POST',
    url: 'eliminar_revisor.php',
    data: { id: id },
    success: function (response) {
        if (response === 'success') {
           
            $('tr[data-id="' + id + '"]').remove();

            // Cerrar el modal de confirmación
            $('#confirmDeleteModal').modal('hide');
            location.reload()
        } else {
            alert('Error al intentar eliminar el revisor.');
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
    }
});

            });
        });
    </script>
</body>
</html>