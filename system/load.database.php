<?php

// region SQL
define('SQL_HOST', getenv('SERVERCONFIG_SQL_HOST'));
define('SQL_PORT', getenv('SERVERCONFIG_SQL_PORT'));
define('SQL_USER', getenv('SERVERCONFIG_SQL_USER'));
define('SQL_PASS', getenv('SERVERCONFIG_SQL_PASS'));
define('SQL_DATABASE', getenv('SERVERCONFIG_SQL_DATABASE'));
define('SQL_ENCRYPTION', getenv('SERVERCONFIG_SQL_ENCRYPTION'));
// endregion

// region Server
define('SERVER_NAME', getenv('SERVERCONFIG_SERVER_NAME'));
define('SERVER_PORT', getenv('SERVERCONFIG_SERVER_PORT'));
// endregion

Website::setDatabaseDriver(Database::DB_MYSQL);
Website::getDBHandle()->setDatabaseHost(SQL_HOST);
Website::getDBHandle()->setDatabasePort(SQL_PORT);
Website::getDBHandle()->setDatabaseName(SQL_DATABASE);
Website::getDBHandle()->setDatabaseUsername(SQL_USER);
Website::getDBHandle()->setDatabasePassword(SQL_PASS);
Website::updatePasswordEncryption();

$SQL = Website::getDBHandle();
