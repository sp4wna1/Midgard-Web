<?php

ob_start();
$main_content = '';
include("pages/" . $subtopic . ".php");
$main_content .= ob_get_clean();