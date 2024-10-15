<?php
    include ('cabecera.php');
?>
    <!-- End Navbar -->

      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Projects table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de Inicio</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha Prevista</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Dias Transcurridos</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Porcentaje Completado</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Importancia</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Eliminar Proyecto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach ($_SESSION["proyectos"] as $proyecto) {
                            echo ("<tr>
                                      <td>
                                          <h6 class='mb-0 text-sm'>{$proyecto['nombre']}</h6>
                                      </td>
                                      <td>
                                        <p class='text-sm font-weight-bold mb-0'>{$proyecto['fechaInicio']}</p>
                                      </td>
                                      <td>
                                        <p class='text-sm font-weight-bold mb-0'>{$proyecto['fechaFinPrevista']}</p>
                                      </td>
                                      <td class='align-middle'>
                                        <p class='text-center text-sm font-weight-bold mb-0'>{$proyecto['diasTranscurridos']}</p>
                                      </td>
                                        <td class='align-middle text-center'>
                                            <div class='d-flex align-items-center justify-content-center'>
                                                <span class='me-2 text-xs font-weight-bold'>{$proyecto['porcentajeCompletado']}</span>
                                                <div>
                                                    <div class='progress'>
                                                        <div class='progress-bar bg-gradient-info' role='progressbar'
                                                         aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: {$proyecto['porcentajeCompletado']};'></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class='align-middle'>
                                        <p class='text-center me-2 text-xs font-weight-bold'>{$proyecto['importancia']}</p>
                                        </td>
                                        <td class='align-middle d-flex justify-content-center align-items-center '>
                                            <!--Botón para eliminar proyecto-->
                                            <a href='controlador.php?accion=borrarProyecto&posicion{$proyecto['id']}'>
                                            <i class='fa-solid fa-square-minus'></i></a>
                                        </td>
                                    </tr>");
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      include('pie.php');
      ?>