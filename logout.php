<?php

//aloittaa session
session_start();

//tyhjentהה session
unset($_SESSION['email']);

// session_destroy();

//menee index.php
header('Location: index.php');

?>