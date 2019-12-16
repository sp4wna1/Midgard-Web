<?php
// Comment if you want to show scripts erros
error_reporting(E_ALL ^ E_STRICT ^ E_NOTICE);

// region INIT
include_once('./system/load.init.php');
//endregion

//region DATABASE
include_once('./system/load.database.php');
//endregion

//region LOGIN
include_once('./system/load.login.php');
//endregion

//region COMPAT
include_once('./system/load.compat.php');
//endregion

//region LOAD
include_once('./system/load.page.php');
//endregion

//region LAYOUT
include_once('./system/load.layout.php');
//endregion


// TRUE = Queries on HTML
define('DEBUG_DATABASE', false);

if (DEBUG_DATABASE) Website::getDBHandle()->setPrintQueries(true);
