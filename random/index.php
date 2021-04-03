<?php
function random( )
{
$character_set_array = array( );
$character_set_array[ ] = array( 'count' => 3, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' );
$character_set_array[ ] = array( 'count' => 2, 'characters' => '0123456789' );
$temp_array = array( );
foreach ( $character_set_array as $character_set )
{
for ( $i = 0; $i < $character_set[ 'count' ]; $i++ )
{
$temp_array[ ] = $character_set[ 'characters' ][ rand( 0, strlen( $character_set[ 'characters' ] ) - 1 ) ];
}
}
shuffle( $temp_array );
return implode( '', $temp_array );
}

function randompass( )
{
$character_set_array = array( );
$character_set_array[ ] = array( 'count' => 3, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' );
$character_set_array[ ] = array( 'count' => 4, 'characters' => '0123456789' );
$character_set_array[ ] = array( 'count' => 3, 'characters' => 'abcdefghijklmnopqrstuvwxyz' );
$character_set_array[ ] = array( 'count' => 2, 'characters' => '!@#$%^&*()' );
$temp_array = array( );
foreach ( $character_set_array as $character_set )
{
for ( $i = 0; $i < $character_set[ 'count' ]; $i++ )
{
$temp_array[ ] = $character_set[ 'characters' ][ rand( 0, strlen( $character_set[ 'characters' ] ) - 1 ) ];
}
}
shuffle( $temp_array );
return implode( '', $temp_array );
}


?>
Ma VPS-Cable: <?php echo random(); ?>
</br>
Password: <?php echo randompass(); ?>