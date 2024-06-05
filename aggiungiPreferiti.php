<?php
    session_start();
    if(!isset($_SESSION["email"]))
    {
        header("Location: index.html");
        exit;
    }
    $conn = mysqli_connect("Localhost", "root", "","hw1utentipreferisconoricette");

    if(!$conn)
    {
        die("Connessione fallita: " .mysqli_connect_error());
    }

    $piattoPreferito = mysqli_real_escape_string($conn, $_GET['q']) ;
    $email =mysqli_real_escape_string($conn, $_SESSION['email']) ;
    $id_utente =mysqli_real_escape_string($conn, $_SESSION['id_utente']);
    $query_insert_ricetta= "INSERT INTO RICETTE(nomePiatto) values ('".$piattoPreferito."')";
    $query_select_id_ricetta ="SELECT id_ricetta FROM RICETTE WHERE nomePiatto = '".$piattoPreferito."'";

    //SELEZIONO L'ID DELLA RICETTA
    $res_query_select_id_ricetta = mysqli_query($conn, $query_select_id_ricetta);
    //SE VA A BUON FINE LA SELECT
    if($res_query_select_id_ricetta)
    {
        $row = mysqli_fetch_assoc($res_query_select_id_ricetta); //sereve per accedere agli elementi ritornati dalla query
        $num_row=mysqli_num_rows($res_query_select_id_ricetta); // controlla il numero di righe
        //SE TROVA RISULTATI PRENDE L'ID DELLA RICETTA E INSERISCE IN 'PREFERISCONO'
        if($num_row>0)
        {
            //vuol dire che esiste gia una ricetta con quel nome
            echo 'RICETTA GIA ESISTENTE';
            $res_query_insert_preferiscono = mysqli_query($conn, "INSERT INTO PREFERISCONO VALUES('".$id_utente."', '".$row['id_ricetta']."')");
            if($res_query_insert_preferiscono)
            {
                echo 'INSERITO CORRETTAMENTE IN PREFERISCONO';
            }
            if(!$res_query_insert_preferiscono)
            {
                echo 'NON INSERITO CORRETTAMENTE IN PREFERISCONO';
            }
        }

        //SE NON TROVA RISULTATI AGGIUNGE LA NUOVA RICETTA ESTRAE L'ID DELLA RICETTA E INFINE INSERISCE IN 'PREFERISCONO'
        if($num_row==0)
        {
            echo 'RICETTA INESISTENTE';
            $res_insert_ricetta = mysqli_query($conn, $query_insert_ricetta);//inserisce una nuova ricetta
            {
                echo 'INSERIMENTO IN RICETTE DELLA NUOVA RICETTA AVVENUTO CON SUCCESSO';
                $res_query_select_id_ricetta = mysqli_query($conn, $query_select_id_ricetta); //SELEZIONA LA NUOVA RICETTA PER PRENDERE L'ID
                if($res_query_select_id_ricetta)
                {
                    echo 'SELEZIONE NUOVA RICETTA AVVENUTA CON SUCCESSO';
                    $row_nuovo_select_id_ricetta = mysqli_fetch_assoc($res_query_select_id_ricetta);//prendo le righe per accedere all'id_ricetta

                    $res_insert_preferiscono = mysqli_query($conn, "INSERT INTO PREFERISCONO VALUES('".$id_utente."', '".$row_nuovo_select_id_ricetta['id_ricetta']."')" ); //inserisce in 'PREFERISCONO'
                    if($res_insert_preferiscono)
                    {
                        echo 'INSERIMENTO AVVENUTO CON SUCCESSO';
                    }
                    if(!$res_insert_preferiscono)
                    {
                        echo 'INSERIMENTO FALLITO';
                    }
                }
                if(!$res_query_select_id_ricetta)
                {
                    echo 'SELEZIONE NUOVA RICETTA FALLITA';
                }
                

            }
            if(!$res_insert_ricetta)
            {
                echo 'INSERIMENTO IN RICETTE NON AVVENUTO CON SUCCESSO';
            }
        }
    }
    mysqli_close($conn);
?>