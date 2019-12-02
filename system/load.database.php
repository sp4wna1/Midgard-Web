<?php
define('SQL_HOST', getenv('SERVERCONFIG_SQL_HOST'));
define('SQL_PORT', getenv('SERVERCONFIG_SQL_PORT'));
define('SQL_USER', getenv('SERVERCONFIG_SQL_USER'));
define('SQL_PASS', getenv('SERVERCONFIG_SQL_PASS'));
define('SQL_DATABASE', getenv('SERVERCONFIG_SQL_DATABASE'));

Website::setDatabaseDriver(Database::DB_MYSQL);
if (Website::getServerConfig()->isSetKey(SQL_HOST)) {
    Website::getDBHandle()->setDatabaseHost(Website::getServerConfig()->getValue(SQL_HOST));
} else {
    new Error_Critic('#E-7', 'There is no key <b>' . SQL_HOST . '</b> in server config file.');
}

if (Website::getServerConfig()->isSetKey(SQL_PORT)) {
    Website::getDBHandle()->setDatabasePort(Website::getServerConfig()->getValue(SQL_PORT));
} else {
    new Error_Critic('#E-7', 'There is no key <b>' . SQL_PORT . '</b> in server config file.');
}

if (Website::getServerConfig()->isSetKey(SQL_DATABASE)) {
    Website::getDBHandle()->setDatabaseName(Website::getServerConfig()->getValue(SQL_DATABASE));
} else {
    new Error_Critic('#E-7', 'There is no key <b>' . SQL_DATABASE . '</b> in server config file.');
}

if (Website::getServerConfig()->isSetKey(SQL_USER)) {
    Website::getDBHandle()->setDatabaseUsername(Website::getServerConfig()->getValue(SQL_USER));
} else {
    new Error_Critic('#E-7', 'There is no key <b>' . SQL_USER . '</b> in server config file.');
}

if (Website::getServerConfig()->isSetKey(SQL_PASS)) {
    Website::getDBHandle()->setDatabasePassword(Website::getServerConfig()->getValue(SQL_PASS));
} else {
    new Error_Critic('#E-7', 'There is no key <b>' . SQL_PASS . '</b> in server config file.');
}

Website::updatePasswordEncryption();
$SQL = Website::getDBHandle();
