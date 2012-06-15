<?php
        require_once("userCake/models/config.php");
        if(isset($_POST))
        {
            
            $password = $_POST["password"];
            $password_new = $_POST["passwordc"];
            $password_confirm = $_POST["passwordcheck"];

            //Perform some validation
            //Feel free to edit / change as required
            $msj="";
            if(trim($password) == "")
            {
                    $msj = "Escriba clave";
            }
            else if(trim($password_new) == "")
            {
                    $msj = "Escriba nueva clave";
            }
            else if($password_new != $password_confirm)
            {
                    $msj= "La clave nueva no coincide con la confirmada";
            }
            
            //End data validation
            if($msj=="")
            {
                //Confirm the hash's match before updating a users password
                $entered_pass = generateHash($password,$loggedInUser->hash_pw);

                //Also prevent updating if someone attempts to update with the same password
                $entered_pass_new = generateHash($password_new,$loggedInUser->hash_pw);

                if($entered_pass != $loggedInUser->hash_pw)
                {
                        //No match
                        $msj= "La clave de usuario es incorrecta";
                }
                else if($entered_pass_new == $loggedInUser->hash_pw)
                {
                        //Don't update, this fool is trying to update with the same password ¬¬
                        $msj= "La clave nueva es igual que la actual";
                }
                else
                {
                        //This function will create the new hash and update the hash_pw property.
                        $loggedInUser->updatePassword($password_new);
                } 
            }
            
                
        }
        $msj="Datos actualizados correctamente";
                    
header('Location: index.php?cuerpo=account.php&msj='.$msj);        
?>