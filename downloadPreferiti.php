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

    $id_utente = mysqli_real_escape_string($conn, $_SESSION['id_utente']);
    $query_selezione_preferiti_utente = "SELECT nomePiatto, id_ricetta
                                        FROM (UTENTI JOIN PREFERISCONO ON UTENTI.id_utente = PREFERISCONO.utente) 
                                        JOIN RICETTE ON PREFERISCONO.ricetta = RICETTE.id_ricetta 
                                        WHERE UTENTI.id_utente = '".$id_utente."'";

    $res = mysqli_query($conn, $query_selezione_preferiti_utente);
    
    if($res)
    {   
        $rows = array();
        //fin quando ci sono elementi, estraggo dal database
        while($row = mysqli_fetch_assoc($res))
        {
            $rows[]=$row;
        }

        echo json_encode($rows);
    }
    else if(!$res)
    {
        echo 'ERRORE estrazione preferiti';
    }

    
    mysqli_close($conn);
?>