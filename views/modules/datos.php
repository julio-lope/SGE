<?php
//$conexion = new mysqli("node57014-systemsgev2.jl.serv.net.mx", "root", "RHBtgn83817", "systemsgev2");
$conexion = new mysqli("localhost", "root", "", "systemsgev2");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
}else{
$opcion = $_POST['opcion'];
if ($opcion==='0') {
  $sql="vacio";
}
elseif ($opcion === '1') {
  $sql = "SELECT id_seccion, seccion
    from seccion";
} elseif ($opcion === '2') {
  $sql = "SELECT *
    from jerarquia";
} elseif ($opcion === '3') {
  $sql = "SELECT id_municipio, municipio
    from municipio";
} elseif ($opcion === '4') {
  $sql = "SELECT id_colonia, colonia
    from colonia";
}

if ($sql!="vacio") {
 $result = mysqli_query($conexion, $sql);

$cadena = "<div class='input-group mb-3'>
  <div class='input-group-prepend'>
    <label class='input-group-text dimp' class='input-group-text' for='inputGroupSelect01'>Elija</label>
  </div>
  <select class='custom-select cimp' id='lista2' name='lista2' onchange='ShowSelected();'>
  <option value='0'>Seleccione una Opción</option>";

while ($ver = mysqli_fetch_row($result)) {
  $cadena = $cadena . '<option value=' . $ver[0] . '>' . utf8_encode($ver[1]) . '</option>';
}



echo  $cadena . "</select></div>"; 
}else{

}

}
/*$opcion = $_POST['opcion'];
if ($opcion=='0') {
  $res="hola";
}elseif ($opcion=='1') {
  $res="no";
}elseif ($opcion=='2') {
  $res="no 2";
}elseif ($opcion=='3') {
  $res="no 3";
}elseif ($opcion=='4') {
  $res="no 4";
}
$cadena="<div><label>Prueba</label>
<select class='custom-select' id='lista2' name='lista2'> ";
$cadena=$cadena. '<option value=' . $res . '>' . utf8_encode($res) . '</option>';

echo  $cadena . "</select></div>" ;*/
?>