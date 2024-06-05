<?php
//controllo che tutti i campi del form sono stati compilati
if(isset($_POST["nome"])&&isset($_POST["cognome"])&&isset($_POST["email"])&&isset($_POST["username"])&&isset($_POST["password"]))
{
    //avvio la connesione con il database
   $conn = mysqli_connect("Localhost", "root", "", "hw1utentipreferisconoricette");

   //se la connessione è fallita chiude con l'errore
   if(!$conn)
        {
            die("Connessione fallita: " .mysqli_connect_error());
        }


        //prendo tutti i campi inseriti nel form ed eseguoo 'escape_string' per evitare sql ijection
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cognome=mysqli_real_escape_string($conn, $_POST['cognome']);
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $username=mysqli_real_escape_string($conn, $_POST['username']);
        $password= mysqli_real_escape_string($conn, $_POST['password']);

        //eseguo una codifica hash per la password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        //VALIDAZIONE LATO SERVER
        $errori=0;

        //1) Validazione USERNAME
        $query_username = "SELECT username FROM utenti WHERE username = '$username'";
        $risultato_username = mysqli_query($conn, $query_username);
        if(mysqli_num_rows($risultato_username)>0)
        {
            echo "<h1>Username già in uso</h1>";
            $errori=$errori+1;
        }

        //2) Validazione EMAIL
        $query_email = "SELECT email FROM utenti WHERE email = '$email'";
        $risultato_email = mysqli_query($conn, $query_email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "<h1>Indirizzo email non valido!</h1>";
            $errori=$errori+1;
        }
        if(mysqli_num_rows($risultato_email)>0)
        {
            echo "<h1>Email già in uso...</h1>";
            $errori=$errori+1;
        }

        //3) Validazione PASSWORD
        if(strlen($password) < 8)
        {
            echo "<h2>La password deve contenere almeno 8 caratteri</h2>";
            $errori=$errori+1;
        }
        if(!preg_match("/^[a-zA-Z0-9_!@#$%^&*()-+=]+$/", $password))
        {
            echo "<h2>la password deve contenere almeno un carattere speciale</h2>";
            $errori=$errori+1;
        }

        //SE NON CI SONO ERRORI avvio la sessione
        if($errori==0)
        {
            session_start();
            $query= "INSERT INTO utenti(email, nome, cognome, username, password) VALUES('".$email."','".$nome."', '".$cognome."','".$username."', '".$hashed_password."')";
            
            $res=mysqli_query($conn, $query);
        
            
            if($res)
            {
                //imposto la variabile di sessione
                echo "<h2>Utente registrato correttamente</h2>";
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['email']= $_POST['email']; //settata perche devo poter accedere alla email che è primary key del database
                
                //reiderizza al'index per effettuare l'accesso'
                 header("Location: index.html");                          
                exit;
            }
            
            else
            {
                echo"<h2>Errore durante la registrazione</h2>";
                $errore = true;
            }
        
            mysqli_free_result($res);
            mysqli_close($conn);
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTRAZIONE</title>
        <link rel="stylesheet" href="reg.css">
        <script src="registrazioneValidation.js" defer></script>
    </head>
    <body>
        <section>
        <div id="box_registrazione">
            <h2>REGISTRAZIONE</h2>
            <form id="form_registrazione" method='post'>
                <p>Nome</p>
                <input type="text" name='nome'>
                <div id='nome' class='hidden'>Errore nel campo nome</div>

                <p>Cognome</p>
                <input type="text" name='cognome'>
                <div id='cognome' class='hidden' >Errore nel campo cognome</div>

                <p>Email</p>
                <input type="email" name='email'>
                <div id='email' class='hidden' >Errore nel campo email</div>

                <p>Username</p>
                <input type="text" name='username'>
                <div id='username' class='hidden' >Errore nel campo username</div>

                <p>Password</p>
                <input type="password" name='password'>
                <div>
                <input id='invia' type="submit">
                <div id='password' class='hidden'>Errore nel campo password</div>
                </div>

                <p>Hai già un account? <a href="index.html">Accedi</a></p>
                
            </form>
        </div>
        </section>
        
        
    </body>
</html>