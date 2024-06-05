<?php
    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $conn = mysqli_connect("Localhost", "root", "","hw1utentipreferisconoricette");

        if(!$conn)
        {
            die("Connessione fallita: " .mysqli_connect_error());
        }

        $email = mysqli_real_escape_string($conn, $_POST['email']);//evito sql injection
        $password = mysqli_real_escape_string($conn, $_POST['password']); //evito sql injection

        $query = "SELECT id_utente, email, password, username FROM utenti WHERE email = '".$email."'"; //se nella query avessi inserito la password, la query avrebbe restituito 0 righe dato che avrei confrontato la password inserita dall'utente con quella hashata

        $res = mysqli_query($conn, $query); //avvio la connessione ed eseguo la query
        if($res)
        {
            $num_row=mysqli_num_rows($res);
            $row = mysqli_fetch_assoc($res);
            if($num_row==0)
            {
                echo "<div><h2 >Account inesistente </br> <a href=\"Registrazione.php\">Registrati</a></h2></div>";                
            }
            if($num_row==1)
            {
                if(($_POST['email'] == $row['email']) && (password_verify($_POST['password'], $row['password']))) //verifico che la password inserita 
                {
                    //avvio la sessione
                    session_start();
                    //imposto la variabile di sessione
                    $_SESSION['id_utente'] = $row['id_utente'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['username']=$row['username'];
                    //reiderizza alla home
                    header("Location: HomeDB.php");
                    exit;
                }
           
                else
                {
                    echo "email o password errati";
                    $errore = true;
                    header("Location: errore.html");
                }
            }
        }
        mysqli_free_result($res);
        mysqli_close($conn);
    }
?>