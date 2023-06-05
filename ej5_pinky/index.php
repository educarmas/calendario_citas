<?php
$servername = "mysql"; // Nombre/IP del servidor
$database = "full_calendar"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = "12345"; // Contraseña del usuario
// Creamos la conexión
$con = mysqli_connect($servername, $username, $password, $database);
// Comprobamos la conexión
$sth = $con->query('SELECT * FROM eventos');
foreach($sth as $fila) {

}
// if (!$con) {
//     die("La conexión ha fallado: " . mysqli_connect_error());
// }
// //echo "Conexión satisfactoria";
// mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
  <!-- Bootstrap min css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>FullCalendar</title>
</head>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  <script src="assets/js/locale/es.js"></script>
  
<style>
    .Disponible{
        background-color: green;
        color: white;
        border-radius: 5px black solid;
    }

    .NoDisponible{
      background-color: red;
      color:white;
      border-radius: 5px black solid;
    }

  </style>
  
  <script language="JavaScript">
    $(document).ready(function() {
      $('#calendar').fullCalendar({
        events: [
            <?php 
            foreach($sth as $fila) {
            ?>
            {
                id:"<?php echo $fila['id'];?>",
                title:"<?php echo $fila["title"];?>",
                apellidos:"<?php echo $fila["apellidos"];?>",
                email:"<?php echo $fila["email"];?>",
                telefono:"<?php echo $fila["telefono"];?>",
                empresa:"<?php echo $fila["empresa"];?>",
                start:"<?php echo $fila["start"];?>",
                hora:"<?php echo $fila["hora"];?>",
                motivo:"<?php echo $fila["motivo"];?>",
                className:"<?php echo $fila["className"];?>",
                editable:"<?php echo $fila["editable"];?>",
            },
            <?php
                }
            ?>
        ],
        dayClick: function(date, jsEvent, view) {
              $("#exampleModal").modal("show");
              $("#fecha").val(date.format());
            }
        
      });
    });
  </script>
<body>
  <div class="row">
      <div class="col-sm-1">

      </div>
      <div class="col-sm-10">
          <div id="calendar"></div>
      </div>
      <div class="col-sm-1">
        
      </div>
  </div>



    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <form action="registrar.php" method="POST">
                  <label for="">Fecha</label>
                  <input type="text" class="type" id="fecha" name="start"><br/>
                  <input type="text" placeholder="Nombre" name="title"></br>
                  <input type="text" placeholder="Apellidos" name="apellidos"></br>
                  <input type="text" placeholder="email" name="email"></br>
                 
                  <input type="text"placeholder="Telefono" name="telefono"></br>
                 
                  <input type="text" placeholder="Empresa" name="empresa"></br>
                  
                  <label for="hour" class="col-sm-2 control-label">Cita</label>
									<select class="form-control" id="color" name="hora">
										<option  value="Seleccionar">Seleccionar</option>
										<option  value="09:30">09:30</option>
										<option  value="10:00">10:00</option>
										<option  value="10:30">10:30</option>
										<option  value="11:00">11:00</option>
										<option  value="11:30">11:30</option>
										<option  value="12:00">12:00</option>
										<option  value="12:30">12:30</option>
										<option  value="13:00">13:00</option>
										<option  value="13:30">13:30</option>
										<option  value="14:00">14:00</option>
										<option  value="14:30">14:30</option>
										<option  value="15:00">15:00</option>
										<option  value="15:30">15:30</option>
										<option  value="16:00">16:00</option>
										<option  value="16:30">16:30</option>
										<option  value="17:00">17:00</option>
									</select>

                  <input type="text" placeholder="Motivo de la cita" name="motivo"></br>
                  <input type="text" placeholder="Notas adicionales"></br>
                  
                  
                  <label for="">Color</label>
                  <input type="color" name="className">
              
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit"class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
