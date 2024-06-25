<?php
session_start();
session_unset();
session_destroy();
header("Location: WebForm.html?source=logout");
exit();
?>
