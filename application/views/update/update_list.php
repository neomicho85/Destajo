<!DOCTYPE html>
<html lang="en" class="update-container">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de actualizaciones</title>


    <link href="<?php echo base_url(); ?>css/vendor/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/vendor/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/vendor/todc-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2.min.js"></script>

  </head>
  <body class="update-container">



      <!-- Lista de updates nuevos -->
        <div class="update-container">
            <div class="update-inner">
                <h4>Listado de actualizaciones</h4>
            <div class="card card-lg">
                <div class="clearfix">
                    <p class="pull-left">
                        Informaci&oacute;n:
                        <strong>Total: </strong><span><?php echo count($new_update_list); ?></span>
                        <strong>Correctas: </strong><span class"update-ok">0</span>
                        <strong>Fallidas: </strong><span class"update-fail">0</span>
                    </p>
                    <p class="pull-right">
                        <button type="button" class="btn btn-primary" id="btn-update">Actualizar!</button>
                    </p>
                </div>

                <ol class="update-list">
                    <?php
                    $update_count = count($new_update_list);
                    $update_url = './do_update';
                    for ($i=0; $i < $update_count; $i++)
                    {
                        echo "<li><span class='list-name'>" . $new_update_list[$i] . "</span><span title='waiting' class='list-loader'></span></li>";
                    }
                    ?>
                </ol>

            </div>
        </div>

      </div>



    <script src="<?php echo base_url(); ?>js/vendor/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/jquery-migrate-1.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/alertify.js"></script>

    <script type="text/javascript">

      $(function() {

        $('#btn-update').click(function(event) {

          event.preventDefault();

          exeFile(nextFile());

          });

        });


          // Ejecutar fichero de actualizacion
          function exeFile(file)
          {
             if (file == "") return;

             var r = $.ajax({
                        url: <?php echo '"' . $update_url . '"' ?>,
                        cache: false,
                        type: 'post',
                        dataType: 'json',
                        data: {fichero: file},
                        beforeSend: function(xhr) {
                          console.log('sending...' + file);
                        }
                      });
              // Done
              r.done(function(response) {

                // Marcar fichero segun el estado title | status
                var listName = $('.list-name');
                var uok = $('.update-ok');
                for(var i=0; i<listName.length; i++)
                {
                  if ($(listName[i]).text() == file)
                  {
                    var loader = $(listName[i])
                                  .parents('li')
                                  .addClass('ok')
                                  .find('.list-loader')
                                  .attr('title', response.title)
                                  .text(' (Actualizado)');
                    uok.html( parseInt(uok.html()) + 1 );
                    break;
                  }
                }

                exeFile(nextFile());
              });

              // Fail
              r.fail(function(xhr, status, error){

                // Marcar fichero segun el estado title | status
                var listName = $('.list-name');
                var ufail = $('.update-fail');
                for(var i=0; i<listName.length; i++)
                {
                  if ($(listName[i]).text() == file)
                  {
                    var loader = $(listName[i])
                                  .parents('li')
                                  .addClass('fail')
                                  .find('.list-loader')
                                  .attr('title', "error: " + error, " status: " + status)
                                  .text(' (No actualizado)');
                    ufail.html( parseInt(ufail.html()) + 1 );
                    break;
                  }
                }

                console.log("error: " + error);
              });

              // Always
              r.always(function(xhr, status, error) {

              	// Sumar las "done" como completadas
              	var updated = $("#updated");
              	var listLoader = $('.list-loader');
              	var contador = 0;

              	for(var i=0,j=listLoader.length; i<j; i++){
					if ($(listLoader[i]).text() == "done") contador++;
				};

				updated.text(contador);

              });

          }

          // Obtener el proximo fichero a ser actualizado
          function nextFile()
          {

            // Obtener elementos que no se han actualizados
            var listName = $('.list-name'),
                listLoader = $('.list-loader'),
                loaderText = "",
                currentFile = "";

            for(var i=0; i<=listLoader.length; i++)
            {
              loaderText = $(listLoader[i]).attr('title');
              if (loaderText == "waiting")
              {
                currentFile = $(listLoader[i]).parents('li').find('.list-name').text();
                break;
              }
            }

            return currentFile;

          }

    </script>

  </body>
</html>