
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
                    $foto = $_GET['foto'];
                    $latitud = $_GET['latitud'];
                    $longitud = $_GET['longitud'];
                }
                //echo "<h1>{$nombre}</h1>";                   
                                            
                
                 
                  echo "                                                     
                  
                    <div class='text-left' style='margin:50px;'>
                      <img src='{$foto}' class='rounded' alt='Foto de {$nombre} {$apellido}' title='Foto de {$nombre} {$apellido}'>
                    </div>
                    <div style='margin:50px;'>

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
                    </div>


                    <div id='gmap' style='width:100%;height:400px;'>Cargando mapa...</div>
                    <script type='text/javascript' src='https://maps.google.com/maps/api/js?key=AIzaSyAT4kzxuq0u3jlUxjh5mlawcgDtAkwZA9k'></script> 
                    <script type='text/javascript'>
                       function init_map() {
                          var options = {
                             zoom: 14,
                             center: new google.maps.LatLng({$latitud}, {$longitud}),
                             mapTypeId: google.maps.MapTypeId.ROADMAP
                          };
                          map = new google.maps.Map($('#gmap')[0], options);
                          marker = new google.maps.Marker({
                             map: map,
                             position: new google.maps.LatLng({$latitud}, {$longitud})
                          });                        
                          
                       }
                       google.maps.event.addDomListener(window, 'load', init_map);
                    </script> 





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




