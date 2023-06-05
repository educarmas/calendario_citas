<?php
//echo "estas en el arcivo registrar.php";
//var_dump($_POST);

$title=$_POST["title"];
$apellidos=$_POST["apellidos"];
$email=$_POST["email"];
$telefono=$_POST["telefono"];
$empresa=$_POST["empresa"];
$start=$_POST["start"];
$hora=$_POST["hora"];
$motivo=$_POST["motivo"];
$color=$_POST["className"];
$editable=$_POST["editable"];

//var_dump($nombre,$apellidos,$hora,$color);
$datos=array(
    "title"=>$title,
	"apellidos"=>$apellidos,
	"email" =>$email,
	"telefono" =>$telefono,
	"empresa" =>$empresa,
    "start"=>$start,
    "hora"=>$hora,
	"motivo" =>$motivo,
	"className" =>$className,
	"editable"=>$editable
);
//echo "hola";
//echo $datos['apellidos'];
//var_dump($datos);

try {
    $conection = new PDO('mysql:host=mysql;dbname=full_calendar', 'root', '12345');
    $cadena_consulta = "INSERT INTO eventos (`title`, `apellidos`, `email`, `telefono`, `empresa`, `start`, `hora`, `motivo`, `className`, `editable`) VALUES (:title, :apellidos, :email, :telefono, :empresa, :start, :hora, :motivo, :className, :editable)";
    $consulta = $conection->prepare($cadena_consulta);

    // Sustituye $datos con los valores reales que deseas insertar en la base de datos
   /*  $datos = array(
        'nombre' => 'John',
        'apellidos' => 'Doe',
        'email' => 'johndoe@example.com',
        'telefono' => '123456789',
        'empresa' => 'ACME Corp',
        'start' => '2023-06-01',
        'hora' => '10:00',
        'motivo' => 'Reunión',
        'className' => 'clase-css',
        'editable' => true
    ); */

    $consulta->bindParam(':title', $datos['title']);
    $consulta->bindParam(':apellidos', $datos['apellidos']);
    $consulta->bindParam(':email', $datos['email']);
    $consulta->bindParam(':telefono', $datos['telefono']);
    $consulta->bindParam(':empresa', $datos['empresa']);
    $consulta->bindParam(':start', $datos['start']);
    $consulta->bindParam(':hora', $datos['hora']);
    $consulta->bindParam(':motivo', $datos['motivo']);
    $consulta->bindParam(':className', $datos['className']);
    $consulta->bindParam(':editable', $datos['editable']);

    $consulta->execute();

    //echo "Conectado";
} catch (PDOException $e) {
    //echo "No conectado";
    //echo $e->getMessage();
}

header("location:http://localhost:9905/index.php");
/* try{
    $conection=new PDO('mysql:host=mysql;dbname=full_calendar', 'root', '12345');
    $cadena_consulta="insert into 'eventos'(`nombre`, `apellidos`, `email`, `telefono`, `empresa`,`start`,`hora`, `motivo`, `className`, `editable`)  values ($datos['nombre'], $datos['apellidos'], $datos['email'], $datos['telefono'], $datos['empresa'], $datos['start'], $datos['hora'], $datos['motivo'], $datos['className'], $datos['editable'])";
    $consulta=$conection->prepare($cadena_consulta);
    $consulta->execute();

    echo "Conectado";

}catch(PDOException $e){
    echo "No conectado";
    echo $e->getMessage();
} 
 */