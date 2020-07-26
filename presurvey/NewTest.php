<?php
session_start();

$fichier = '../coordonnees/answers_'.$_GET["username"].'.txt';
if( file_exists ( $fichier))
  unlink( $fichier ) ;
  $fichier = '../coordonnees/coor_'.$_GET["username"].'.txt';
  if( file_exists ( $fichier))
    unlink( $fichier ) ;
    $fichier = '../coordonnees/test_clavier_coor_'.$_GET["username"].'.txt';
    if( file_exists ( $fichier))
      unlink( $fichier ) ;
      $fichier = '../coordonnees/test_clavier_input_'.$_GET["username"].'.txt';
      if( file_exists ( $fichier))
        unlink( $fichier ) ;
        $fichier = '../coordonnees/test_clavier_entry_'.$_GET["username"].'.txt';
        if( file_exists ( $fichier))
          unlink( $fichier ) ;
          $fichier = '../coordonnees/test_souris_'.$_GET["username"].'.txt';
          if( file_exists ( $fichier))
            unlink( $fichier ) ;




header('Location: souris.php?username='.$_GET['username'].'');
?>
