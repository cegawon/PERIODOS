<!DOCTYPE html>
<html lang="es">
<?php session_start();
//require('CONEXION.PHP');
?>
<head>

<script src="jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<link href = "//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel = "hoja de estilo" >  
<script src = "http://code.jquery.com/jquery-2.0.3.min.js" > </script>  
<script src = "//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js" > </script>

<!-- DATATABLE -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

 <meta charset="utf-8">
 <script type="text/javascript">
 </script>
</head>
<body>    
<?php
   
    
	$dtz = new DateTimeZone("America/Bogota");
    $dt = new DateTime("now", $dtz);
    $fecha = $dt->format("Y-m-d");	
    $hora = $dt->format("h:i:s");
	$anio = $dt->format("Y");
	$fecha_hora = $dt->format("Y-m-d h:i:s");
    
    $fecha1 = date("d-m-Y",strtotime($_POST['bitacora'])); 
    $fecha2 = date("d-m-Y",strtotime($fecha1."+ 14 days"));    
    $a = 1;
?>
        <div class="container text-center">
		<h1 style="margin-top:20px">GENERAR BITACORAS</h1>
		<hr>
    
       <form action="PERIODO2.PHP" method="post">
       <div  style="margin-left:350px" class="col-md-4">
       <div class="input-group mb-3 form-floating">
       <span class="input-group-text">Fecha de Ingreso</span>
       <input type="date" id="bitacora" name="bitacora" class="form-control"><br>
       </div>
       </div>
       <input type="submit" class="btn btn-primary" value="Generar" >                                   
       </form>
    <div class="row justify-content-md-center">		
    <div class="col-md-8">
    <table id="cesar" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">BITACORA</th>
                <th class="text-center">FECHA INICIAL</th>
                <th class="text-center">FECHA FINAL</th>                          
            </tr>
        </thead>
        <tbody>
              <tr>
                 <td class="text-center"><?php echo $a ?></td>
				 <td class="text-center"><?php echo $fecha1 ?></td>
				 <td class="text-center"><?php echo $fecha2 ?></td>
                 </tr>
                 <tr>
                 <?php
                 while ($a <= 11) 
                 {
                  $a = $a + 1;
                  $fecha1 = date("d-m-Y",strtotime($fecha2."+ 1 days"));
                  $fecha2 = date("d-m-Y",strtotime($fecha1."+ 14 days"));
                  ?>
                  <td class="text-center"><?php echo $a ?></td>
				  <td class="text-center"><?php echo $fecha1 ?></td>
				  <td class="text-center"><?php echo $fecha2 ?></td>
              </tr>
           <?php } ?>    
            
        </tbody>
        <tfoot>
         <tr>
             <th class="text-center">BITACORA</th>
             <th class="text-center">FECHA INICIAL</th>
             <th class="text-center">FECHA FINAL</th> 
         </tr>
        </tfoot>
        </table>
        </div>
        </div> 
        <script type="application/javascript">
           $(document).ready( function () {
           $('#cesar').DataTable();
           } );
       </script>
</body>
</html>