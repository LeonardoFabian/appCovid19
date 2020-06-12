
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        COVID-19
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>        
        <li class="active">Detalle</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <h1>
        COVID-19        
      </h1>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- titulo -->                 
          <h2>Datos del Infectado</h2>
          <!-- /titulo -->
        </div>
        <div class="box-body">
          <!-- solicitudes datatable -->
                <?php 

                
                if(isset($_GET['id'])){
                    
                    $id = $_GET['id'];
                    $nombre = $_GET['nombre'];
                    $apellido = $_GET['apellido'];
                    $telefono = $_GET['telefono'];
                    $correo = $_GET['correo'];
                    $calle = $_GET['calle'];
                    $numero = $_GET['numero'];
                    $genero = $_GET['genero'];
                    $nacionalidad = $_GET['nacionalidad'];
                }
                //echo "<h1>{$nombre}</h1>";                   
                                            
                
                 
                  echo "
                  
                    <div class='row'>
                        <img style='height:30px;' src='views/images/infectados/{$id}.jpg'>
                    </div>                  
                  

                    <form>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='name'>Nombre</label>
                                <p id='name' style='text-transform:uppercase'>{$nombre}</p>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='lastname'>Apellido</label>
                                <p id='lastname' style='text-transform:uppercase'>{$apellido}</p>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='phone'>Telefono</label>
                                <p id='phone' style='text-transform:uppercase'>{$telefono}</p>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='email'>Correo</label>
                                <p id='email' style='text-transform:uppercase'>{$correo}</p>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='address'>Dirección</label>
                                <p id='address' style='text-transform:uppercase'>{$calle} {$numero}</p>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='gender'>Genero</label>
                                <p id='gender' style='text-transform:uppercase'>{$genero}</p>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='nationality'>Nacionalidad</label>
                                <p id='nationality' style='text-transform:uppercase'>{$nacionalidad}</p>
                            </div>
                        </div>
                    </form>




                  ";
                

              ?>
               

            </tbody>
          </table>
          <!-- /solicitudes datatable -->
        </div>
        <!-- /.box-body -->
      <!--
        <div class="box-footer">
          Footer
        </div>
      -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




