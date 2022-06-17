<?php
    //
    session_start();

    //Flash message helper
    //EXAMPLE - flash('register_success', 'You are now registered');
    //DISPLAY IN VIEW -  echo flash('register_success' );
    function flash($nomcomplete = '', $message = '', $class = 'alert alert-success'){
        if(!empty($nomcomplete)){
            if(!empty($message) && empty($_SESSION[$nomcomplete])){

                if(!empty($_SESSION[$nomcomplete])){
                    unset($_SESSION[$nomcomplete]);
                }

                if(!empty($_SESSION[$nomcomplete . '_class'])){
                    unset($_SESSION[$nomcomplete. '_class']);
                }

                $_SESSION[$nomcomplete] = $message;
                $_SESSION[$nomcomplete. '_class'] = $class;
            }elseif(empty($message) && !empty($_SESSION[$nomcomplete])){
                $class = !empty($_SESSION[$nomcomplete . '_class']) ? $_SESSION[$nomcomplete . '_class'] : '';
                echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$nomcomplete] . '</div>';
                unset($_SESSION[$nomcomplete]);
                unset($_SESSION[$nomcomplete. '_class']);
            }
        }
    }

    //Check if logged in

    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
          return true;
        }else{
          return false;
        }
    }
