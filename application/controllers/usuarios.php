<?php
/**
 * Usuarios controller
 *
 * Controller for application usuarios.
 * 
 * @uses       none
 * @package    Usuarios
 * @subpackage Controller
 */
/**
 * Incluir librerias 
 */
require_once ($config['models']."/usuarios.php");

/**
 * Settings iniciales 
 */
$obj= new usuariosModel();
$datos= $obj->initUserData();

debug($datos, 'datos');
/**
 * Inicializacion de variables 
 */
$usuario='';
$content='';
$route=route('usuarios', 'select');     

/**
 * Parametrizar 
 */

/**
 * Procesar 
 */
// $link=connectDBServer($config);

$db= new dbConnect($config);
	switch($route['action'])
	{
	    case 'delete':
	        if (isset($_POST['usuario']))
	        {
	            // Procesar formulario de insert            
	            if ($_POST['delete']=='Si')
	                usuariosModel::procesarDelete($config['usersUploadDirectory']."/images", $config,$db);
	            header("Location: ?controller=usuarios&action=select"); 
	            break;
	        }
	        else
	        {
	            $usuarios= usuariosModel::readUsersById($db, $_GET['usuario']);
	            $viewVar=array('usuarios'=>$usuarios,'helper'=>$config['helpers']);     
	        }
	    break;    
	    case 'update':       
	        if (isset($_POST['usuario']))
	        {
	            // Procesar formulario de insert            
	            usuariosModel::procesarUpdate($config['usersUploadDirectory']."/images", $config, $db);
	            header("Location: ?controller=usuarios&action=select"); 
	            break;
	        }
	        else
	        {
	            $datos= usuariosModel::readUserData($db, $config['usersUploadDirectory']."/images");
	        }        
	    case 'insert':
	        // Si POST          
	        if (isset($_POST['usuario']))
	        {
	            // Procesar formulario de insert
	            usuariosModel::procesar($config['usersUploadDirectory']."/images", $config, $db);
	            header("Location: ?controller=usuarios&action=select");            
	        }
	        else
	        {
	            //Mostrar formulario
	            $viewVar=array('usuario'=>'','datos'=>$datos,'db'=>$db,'helper'=>$config['helpers']);           
	        }                             
	    break;
	    case 'select':
	    default:   
	        $usuarios= usuariosModel::readUsers($db);
	        $viewVar=array('usuarios'=>$usuarios,'helper'=>$config['helpers']);
	    break;
	}
	
/**
 * Mostrar 
 */
$content=view($viewVar, $config['views'].'/'.$route['controller'].'/'.$route['action'].'.phtml');
$db->disconnectDBServer();
?>