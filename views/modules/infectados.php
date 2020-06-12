<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        COVID-19
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>        
        <li class="active">Infectados</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <h1>
        COVID-19
        <small>| Lista de infectados</small>
      </h1>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- btn add-solicitud -->        

            <a href="index.php?route=infectados&generar=true" class="btn btn-primary">Sincronizar</a>      

            <a href="index.php?route=infectados&truncar=true" class="btn btn-danger">Limpiar datos</a>  

            <?php 
              if(isset($_GET['generar'])){
                $url = "https://randomuser.me/api/?results=1000";
                $table = "infected";
                InfectadosController::ctrInsertarDatosDesdeAPI($table, $url); 
                InfectadosController::ctrGenerarUrlCSV($url);   
                            
              }

              if(isset($_GET['truncar'])){
                $table = "infected";
                InfectadosController::ctrTruncarDatos($table);
              }
            ?>
          
          <!-- /btn add-solicitud -->
        </div>
        <div class="box-body">
          <!-- solicitudes datatable -->
          <table class="table table-bordered table-striped dt-responsive my-datatable" width="100%">
            <thead>
              <tr>
                <th>Foto</th>          
                <th>Nombre</th>
                <th>Apellido</th>                
                <th>Edad</th>
                <th>Signo Zodiacal</th>
                <th>Foto Signo</th>
                <th>Pais</th>        
                <th>Opciones</th>                        
              </tr>
            </thead>
            <tbody >

              <?php 

                

                $datos = InfectadosController::ctrMostrarInfectados();                 
               
                //var_dump($datos);

                foreach($datos as $data){                  
                
                  //var_dump($data["id"]);
                  echo "
                  
                  <tr>
                    <td><img style='height:30px;' src='{$data['pic_thumbnail']}'></td>
                    <td>{$data['firstname']}</td>
                    <td>{$data['lastname']}</td>
                    <td>{$data['age']}</td>
                    <td>{$data['signo_zodiacal']}</td>
                    <td><i class='{$data['simbolo_zodiacal']}'></i></td>
                    <td>{$data['country']}</td>                         

                    <td>
                      <a class='btn btn-info btnMostrarDetalles' id='{$data['id']}' dataNombre='{$data['firstname']}' dataApellido='{$data['lastname']}' dataTelefono='{$data['phone']}' dataCorreo='{$data['email']}' dataCalle='{$data['street']}' dataCasaNumero='{$data['hnumber']}' dataGenero='{$data['gender']}' dataNacionalidad='{$data['nationality']}' dataFoto='{$data['pic_large']}' dataLatitud='{$data['latitude']}' dataLongitud='{$data['longitude']}'>
                        <i class='fa fa-edit'> Mostrar</i>
                      </a>
                    </td>   
                  </tr>
                  
                  ";
                }

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


