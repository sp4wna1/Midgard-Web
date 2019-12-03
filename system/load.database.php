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
define('SERVER_IP', getenv('SERVERCONFIG_SERVER_IP'));
define('SERVER_NAME', getenv('SERVERCONFIG_SERVER_NAME'));
define('SERVER_PORT', getenv('SERVERCONFIG_SERVER_PORT'));
define('SERVER_URL', getenv('SERVERCONFIG_SERVER_URL'));
define('SERVER_PROTECTION', getenv('SERVERCONFIG_SERVER_PROTECTION'));
define('SERVER_TIMEOUT', getenv('SERVERCONFIG_SERVER_TIMEOUT'));
define('SERVER_RATE_EXP', getenv('SERVERCONFIG_SERVER_RATE_EXP'));
define('SERVER_RATE_SKILL', getenv('SERVERCONFIG_SERVER_RATE_SKILL'));
define('SERVER_RATE_LOOT', getenv('SERVERCONFIG_SERVER_RATE_LOOT'));
define('SERVER_RATE_MAGIC', getenv('SERVERCONFIG_SERVER_RATE_MAGIC'));
define('SERVER_SEND_EMAIL', getenv('SERVERCONFIG_SERVER_SEND_EMAIL_REGISTER'));
// endregion

// region heroku
define('HEROKU_SENGRID_API', getenv('SERVERCONFIG_HEROKU_API'));
// endregion

Website::setDatabaseDriver(Database::DB_MYSQL);
Website::getDBHandle()->setDatabaseHost(SQL_HOST);
Website::getDBHandle()->setDatabasePort(SQL_PORT);
Website::getDBHandle()->setDatabaseName(SQL_DATABASE);
Website::getDBHandle()->setDatabaseUsername(SQL_USER);
Website::getDBHandle()->setDatabasePassword(SQL_PASS);
Website::updatePasswordEncryption();

$SQL = Website::getDBHandle();
