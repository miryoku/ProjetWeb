<?php 
session_unset();
session_destroy();

header("Location: welcome");
exit();