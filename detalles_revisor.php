

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del Revisor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            padding: 200px;
            background-color:white;
            background-size: cover;
            background-position: center;
            color: white; 
        }
        .container {
            max-width: 600px;
            margin: auto;
           
        }
        .card {
            margin-top: 20px;
        }
        .btn-back {
            margin-top: 20px;
            background-color: #000040;
        }

        
.card-header {
    background-color: #000040;
    color: #ffffff; 
    padding: 10px; 
}

    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            Detalles:
        </div>
        <div class="card-body">
            <?php
            include 'crud.php';

        
            $idRevisor = isset($_GET['id']) ? $_GET['id'] : null;

            if ($idRevisor) {
                $revisor = getRevisorById($idRevisor);

                if ($revisor) {
           
                    echo "<h4 class='card-title'>{$revisor['nombres']} {$revisor['apellidos']}</h4>";
                    echo "<p class='card-text'><strong>ID:</strong> {$revisor['id']}</p>";
                    echo "<p class='card-text'><strong>Grado Académico:</strong> {$revisor['grado_academico']}</p>";
                    echo "<p class='card-text'><strong>Cubículo:</strong> {$revisor['cubiculo']}</p>";
                    
                } else {
                    echo "<p class='card-text'>No se encontró ningún revisor con el ID proporcionado.</p>";
                }
            } else {
                echo "<p class='card-text'>ID de revisor no proporcionado en la URL.</p>";
            }
            ?>
        </div>
    </div>


    <a href="dashboard_admin.php" class="btn btn-primary btn-back">Regresar </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>