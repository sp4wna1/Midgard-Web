<?php
define('SQL_HOST', getenv('SERVERCONFIG_SQL_HOST'));
define('SQL_PORT', getenv('SERVERCONFIG_SQL_PORT'));
define('SQL_USER', getenv('SERVERCONFIG_SQL_USER'));
define('SQL_PASS', getenv('SERVERCONFIG_SQL_PASS'));
define('SQL_DATABASE', getenv('SERVERCONFIG_SQL_DATABASE'));

Website::setDatabaseDriver(Database::DB_MYSQL);
Website::getDBHandle()->setDatabaseHost(Website::getServerConfig()->getValue(SQL_HOST));
Website::getDBHandle()->setDatabasePort(Website::getServerConfig()->getValue(SQL_PORT));
Website::getDBHandle()->setDatabaseName(Website::getServerConfig()->getValue(SQL_DATABASE));
Website::getDBHandle()->setDatabaseUsername(Website::getServerConfig()->getValue(SQL_USER));
Website::getDBHandle()->setDatabasePassword(Website::getServerConfig()->getValue(SQL_PASS));
Website::updatePasswordEncryption();

$SQL = Website::getDBHandle();
