<?php

// htmlspecialchars para que solo acepte caracteres normales 
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$pNum = htmlspecialchars($_POST['pNum']);
$location = htmlspecialchars($_POST['location']);
$job = htmlspecialchars($_POST['job']);
$comName = htmlspecialchars($_POST['experiencia']);
$description = htmlspecialchars($_POST['description']);
$degree = htmlspecialchars($_POST['degree']);
$institution = htmlspecialchars($_POST['institution']);
$completionYear = htmlspecialchars($_POST['completionYear']);
$skills = htmlspecialchars($_POST['skills']);
$language = htmlspecialchars($_POST['language']);

?>