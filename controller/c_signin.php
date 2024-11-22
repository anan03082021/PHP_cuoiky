<?php
    require('../model/m_user.php');

    session_start();

    if( isset( $_POST ) ){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $role = 1;
        
        $new_user = new User();
        
        $this_user = $new_user->signin_user($username, $password);

        if ($this_user == null)
        {
            
            $error = 'Sai mật khẩu hoặc tài khoản';

            header("Location: ../signin.php?valid=$error");
        }
        else
        {

            header("Location: ../index.php");
        }
        


    }



?>