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

    
    $id_ricetta =mysqli_real_escape_string($conn, $_GET['q']);
    $id_utente = mysqli_real_escape_string($conn, $_SESSION['id_utente']);
    $query_rimuovi_preferito = "DELETE FROM PREFERISCONO WHERE utente = '".$id_utente."' AND ricetta ='".$id_ricetta."'";

    $res_query_rimuovi_preferito = mysqli_query($conn, $query_rimuovi_preferito);

    if($res_query_rimuovi_preferito)
    {
        echo 'Ricetta rimossa con SUCCESSO';
    }

    if(!$res_query_rimuovi_preferito)
    {
        echo 'ERRORE durante la rimozione';
    }

    mysqli_close($conn);

?>