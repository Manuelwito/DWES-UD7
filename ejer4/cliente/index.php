<?php
 
      //La carpeta donde buscaremos los controladores  
      define ('CONTROLLERS_FOLDERS', "controllers/");

      //si no se indica un controlador, este es el controlador que se usará
      define('DEFAULT_CONTROLLER', "ciudades");

      //Si no se indica una acción, esta acción es la que se usará
      define("DEFAULT_ACTION", "muestraCiudades");


      //Obtenemos el controlador.
      //Si el usuario no lo introduce, seleccionamos el de por defecto.
      $controller = DEFAULT_CONTROLLER;
      if ( !empty( $_GET[ 'controller' ]))
      $controller = $_GET [ 'controller' ];
  
      $action = DEFAULT_ACTION;
      //Obtenemos la accion seleccionada
      //Si el usuario no la introduce, seleccionamos la de por defecto
      if( !empty ( $_GET[ 'action' ] ) )
              $action = $_GET[ 'action' ];


      //ya tenemos el controlador y la accion
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
        echo "fallo en el index del cliente ";
              echo 'Excepcion capturada: '. $e->getMessage(). "\n";
      }
      ?>