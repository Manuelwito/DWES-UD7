<?php
 
      define ('CONTROLLERS_FOLDERS', "controllers/");
      define('DEFAULT_CONTROLLER', "ciudades");
      define("DEFAULT_ACTION", "filtraPoblacion");

      //Obtenemos el controlador.
      $controller = DEFAULT_CONTROLLER;
      if ( !empty( $_GET[ 'controller' ]))
      $controller = $_GET [ 'controller' ];
  
      $action = DEFAULT_ACTION;
      //Obtenemos la accion seleccionada
      if( !empty ( $_GET[ 'action' ] ) )
              $action = $_GET[ 'action' ];

      //formamos el nombre del fichero que contiene nuestro controlador
      $controller = CONTROLLERS_FOLDERS . $controller . '_controller.php';

      //si la variable $controller es un fichero lo requeriremos

      try{
              if ( is_file( $controller ))
              require_once($controller);
              else
                      throw new Exception("la accion no existe - 404 not found");      
              //Si la variable $action es una funcion la ejecutamos o detenemos el escript 
              if ( is_callable($action))
                      $action();
              else
                      throw new Exception("la accion no existe - 404 not found");
              } 
      catch (Exception $e){
           
              echo 'Excepcion capturada: '. $e->getMessage(). "\n";
      }
      ?>