<?php

	unset($_SESSION['user']);
	session_destroy();
        header("Location: ../usuario/home_usuario.php");
?>