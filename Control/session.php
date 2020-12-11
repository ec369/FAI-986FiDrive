
<?php
include_once "abmusuario.php";

class session {
	
	public function __construct() {
		session_start();
	     }
	
	public function iniciar($nombreUsuario,$psw) {
		
		$_SESSION['usnombre']=$nombreUsuario;
		$_SESSION['usclave']=$psw;
		
	
	}
		
	public function validar() {
		$resp=false;
		$usuario=new abmusuario();
	
		$lista=$usuario->buscarlogin($_SESSION);
		//echo print_r($lista);

		if ($lista!=null) {
			$resp=true;
		}
		return $resp;
	}

	public function validar2() {
		$resp=false;
		
		$varsesion=$_SESSION['usnombre'];
	
		if ($varsesion==null || $varsesion =''){
  
			$resp=false;
		}else{
			$resp=true;
		}
		return $resp;
	}
	
	public function activa() {
		$resp=false;
		if (session_status()===PHP_SESSION_ACTIVE) {
			$resp=true;
		}
		return $resp;
	}
	
	public function getUsuario() {
		if ($this->validar() && $this->activa()) {
			$usuario=new abmusuario();
		$lista=	$usuario->buscar($_SESSION);
		

		$usuarioLog=$lista[0];
			}
			return $usuarioLog;
	}

	public function getusuario2() {
		if ($this->validar() && $this->activa()) {
			$usuario=new abmusuario();
		$lista=	$usuario->buscarlogin($_SESSION);
				
			}
			return $lista;
	}

	public function getrol() {
		if ($this->validar() && $this->activa()) {
			$usuariorol=new abmusuariorol();
		$lista=$usuariorol->buscar($_SESSION);
				
			}
			return $lista;
	}
	 
	//  public function getRol() {
	//  	if ($this->getUsuario()!==null) {
	// 		$objTransUsRol=new abmusuario();
	//  		$usuarioLog=$this->getUsuario();
	//  		$param=array();
	//  		$param['idusuario']=$usuarioLog->getIdUsuario();
	 	
	//  		$lista=$objTransUsRol->buscar($param);
	//  		$objRol=$lista[0];
	//  		$param1=array();
	//  		//$param1['idrol']=$objRol->getIdRol();
	//  		//$objTransRol=new AbmRol();
	//  		//$lista=$objTransRol->buscar($param1);
	//  		$objRol=$lista[0];
	 		
	//  	}
	//  	return $objRol;
	//  	}
	 	
	 	public function cerrar() {
	 		
	 		if ($this->activa()) {
	 			unset($_SESSION['usnombre']);
	 			unset($_SESSION['usclave']);
	 			session_destroy();
	 		}
	 	}
	 }

