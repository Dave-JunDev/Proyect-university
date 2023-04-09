
<?php
    
        Session_start();
        require_once "./../logic/database/connection.php";
      
        $usuario = $_SESSION['login_user'];
        $tipo_user = $_SESSION['tipe_u'];
        
        
        $id = $_GET['U'];
        
        if($tipo_user != 'E')
        {
            header('Location: ./Perfil.php');
        }
        
        $query = "Select * from Usuarios where Id = $id";
      
        $resultado = searchQuery($con,$query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Perfil candidato</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/691e44487d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./../css/candidatos.css">   
        <link rel="stylesheet" href="./../css/header.css">
        <link rel="stylesheet" href="./../css/footer.css">
        
    </head>
    <body>

        <nav class="navbar navbar-light bg-light">
        <div class="container-fluid" id="Nav">
            <a class="navbar-brand">
                <p> Bienvenido <?php echo  $usuario ?></p>
            </a>
            <form method="post" action="./../logic/services/logoutService.php" >
                <button class="btn btn-outline-success" type="submit" name="Exit">Exit</button>
            </form>
        </div>
    </nav>
        
        <?php 
                
            $query = "SELECT * FROM Usuarios u, carreras c WHERE u.Id = $id AND c.ID = u.id_carrera;";
            
            $resultado = searchQuery($con,$query);
            
            $info = mysqli_fetch_assoc($resultado);

            $id = $info['Id'];

            $currentDateTime = date('Y-m-d');
            
            $endDate = $info['Fecha_nac'];
            
            $date1 = date_create($info['Fecha_nac']);
            $date2 = date_create($currentDateTime);
            
            $diff=date_diff($date1,$date2);
            
            $query = "SELECT ad.tipo_trabajo, ad.tipo_jornada, ad.traslado, ad.lugar_residencia, ad.descp as descp_add, e.descp as descp_exp, e.descp_academica FROM additional_info_user ad INNER JOIN exp_usuario e ON e.id_usuario = ad.id_usuario where e.id_usuario = $id";
            
            $resultado = searchQuery($con,$query);
            
            $addInfo = mysqli_fetch_assoc($resultado);

        ?>
               
            <section class="info-user">
                <div class="info">
                    <form class="form-user" method="post" action="./../logic/services/guardarInfoUsersService.php">
                        
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="dual-circle-button" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                    <span class="small-circle"></span>
                                    <span class="large-circle"></span>
                                </button>
                                <label>Informacion personal</label>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="dual-circle-button" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <span class="small-circle"></span>
                                <span class="large-circle"></span>
                               </button>
                               <label>Formacion academica</label>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="dual-circle-button" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                                <span class="small-circle"></span>
                                <span class="large-circle"></span>
                                </button>
                                <label>Tu experiencia</label>
                            </li>
                        </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label>Nombres y apellidos</label>
                                    <input class="form-control" type="text" value="<?php echo $info['Nombres'] ,' ',  $info['PApellido'] ,' ', $info['SApellido'] ?>" name="nombre" disabled>
                                </div>
                                <div class="col">
                                    <label>Edad</label>
                                    <input class="form-control" type="number" value="<?php echo $diff->y ?>" name="edad">
                                </div>
                                <div class="col">
                                    <label>Lugar de residencia</label>
                                    <?php 
                        
                                    $sql = "SELECT id, nombre FROM paises ORDER BY nombre";
                            
                                    $resultado = searchQuery($con,$sql);

                                    echo '<select name="residencia" class="form-control mb-3">';
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                
                                        if ($addInfo['lugar_residencia'] === $fila['id'])
                                        { 
                                           echo '<option value="' . $fila['id'] . '" name="residencia" selected >' . $fila['nombre'] . '</option>';
                                        }
                                        else
                                        {
                                            echo '<option value="' . $fila['id'] . '" name="residencia" >' . $fila['nombre'] . '</option>';
                                        }
                                    }
                                    echo '</select>';
                    
                    
                                    ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" >Celular</label>
                                    <input class="form-control" type="text" value="<?php echo $info['Telef'] ?>" name="telef">
                                </div>
                                <div class="col">
                                    <label class="form-label">Correo electronico</label>
                                    <input  class="form-control" type="email" value="<?php echo $info['Email'] ?>" name="email">
                                </div>
                                <div class="col">
                                    <label class="form-label">Remoto / presencial</label> 
                                    <select name="tipo_job" class="form-control">
                                        <option value="1" <?php if($addInfo['tipo_trabajo'] === '1'){echo 'selected';} ?>>Remoto</option>
                                        <option value="2" <?php if($addInfo['tipo_trabajo'] === '2'){echo 'selected';} ?>>Presencial</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Jornada media / completa</label>
                                    <select name="tipo_jornada" class="form-control">
                                        <option value="1" <?php if($addInfo['tipo_jornada'] === '1'){echo 'selected';} ?>>Medio tiempo</option>
                                        <option value="2" <?php if($addInfo['tipo_jornada'] === '2'){echo 'selected';} ?>>Tiempo completo</option>
                                        <option value="3" <?php if($addInfo['tipo_jornada'] === '3'){echo 'selected';} ?>>Por horas</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Disponibilidad de trasladarse a otro pais</label>
                                    <select name="tipo_traslado" class="form-control">
                                        <option value="1" <?php if($addInfo['traslado'] === '1'){echo 'selected';} ?> >Si</option>
                                        <option value="2" <?php if($addInfo['traslado'] === '2'){echo 'selected';} ?> >No</option>
                                    </select>                           
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <label>¿Cómo te describirías?</label>
                                <textarea class="form-control" placeholder="" id="text-infop" name="descp_personal" ><?php echo $addInfo['descp_add']?></textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        
                        <div class="container">
                            <div class="row">
                          <label>Formacion academica</label>
                        
                        <?php 
                        
                            $sql = "SELECT ID, descp FROM carreras ORDER BY descp";
                            
                            $resultado = searchQuery($con,$sql);

                            echo '<select name="carrera" class="form-control mb-3">';
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                
                                if ($info['id_carrera'] === $fila['ID'])
                                { 
                                    echo '<option value="' . $fila['ID'] . '" name="carrera" selected >' . $fila['descp'] . '</option>';
                                }
                                else
                                {
                                    echo '<option value="' . $fila['ID'] . '" name="carrera" >' . $fila['descp'] . '</option>';
                                }
                            }
                            echo '</select>';
                    

                        ?>
                            </div>
                        </div>    

                        <div class="container">
                        <div class="row">
                            <label>Ingresa tu formacion academica aqui</label>
                            <textarea placeholder="" class="form-control" id="text-fomacion" name="descp_formacion"><?php echo $addInfo['descp_academica'] ?></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                             <div class="container">
                                <div class="row">
                                <label>Ingresa toda tu experiencia aqui</label>
                                <textarea placeholder="" class="form-control" id="text-fomacion" name="decp_exp"><?php echo $addInfo['descp_exp'] ?></textarea>
                              </div>
                        </div>
                            <div class="container-buttons">
                                <!--<input type="submit" value="Guardar" class="btn btn-info" name="GuardarInfUser">
                                <input type="submit" value="Eliminar"  class="btn btn-danger" name="Eliminar_u">-->
                            </div>
                        </div>
                    </div>
                    
                    </form>
                </div>
            </section>
               
    
        <?php include('./footer.php') ?>
        
         <?php
        include('./../logic/services/modalError.php');
        $Failed = $_GET['E'];
          
        if($Failed != null)
        {
            if($Failed === 'T'){ 
                ModalError('Se actualizo la informacion','La informacion se almaceno de manera correcta.');
            }
            else
            {
                ModalError('Se produjo en un error',$Failed);
            }
        }

    ?>
    
        
        <script src="./../js/controlModal.js"></script>
    </body>
</html>