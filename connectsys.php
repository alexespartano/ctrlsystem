<?php
/*Desarrollado por Alejandro Romero Aldrete*/
 $details  = json_decode( getenv( "VCAP_SERVICES" ), true );
    $dsn      = $details [ "user-provided" ][0][ "credentials" ][ "dsn" ];
 $conn_string = $driver . $dsn;     # Non-SSL
    $db2 = db2_pconnect( $conn_string, "", "" );
?> 
