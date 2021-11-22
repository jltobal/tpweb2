<?php

class AuthHelper
{
    function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {  //Abre sesion.
            session_start();
        }
        
    }

    public function login($user)
    {
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['USER_ROL'] = $user->id_rol_fk;
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    /*
    public function checkLoggedIn() {
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . LOGIN);
            die();
                    }
                }

      */              
    public function checkLoggedIn() {
       
        if(isset($_SESSION['USER_ID'])){ // si esta logueado
            if (time() - $_SESSION['LAST_ACTIVITY'] > 1800) { // expiro el timeout 1800/60=30 minutos
                session_destroy();
                header('Location: '. LOGIN);
              
                return true;
            die();
            }
            $_SESSION['LAST_ACTIVITY'] = time();
        }
        else {
            header('Location: '. LOGIN);
            return false;
            die();
          }
    }
    

    public function checkRol()
    {
        if (isset($_SESSION['USER_ROL'])) {
            if (($_SESSION['USER_ROL']) == 1) {
                return true;
            } else {
                return false;
            }
        } 
    }

    function logout()
    {
        session_destroy();
        header("Location: " . BASE_URL . 'home');
        die();
    }
}
