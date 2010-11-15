<?php
// load a database connection
//
// @author 		Joseph Mastey <joseph.mastey@gmail.com>
// @author		$Author$
// @version		$Id$
// @copyright	Copyright (c) JRM Ventures LLC, 2010-
//

require_once("local.php");
require_once("interaction.php");

if(!isset($use_default_connection) || !$use_default_connection) {
  print_error("Current settings:\n");
  foreach($db_config_array as $key => $value) {
    print_error(sprintf("%-10s: %s\n", $key, $value));
  }

  if(!user_yesno("Use these settings?")) {
     verify_choices( $db_config_array );
  }
}

$db_conn = mysql_connect($db_config_array['host'], $db_config_array['username'], $db_config_array['password']);
if(!$db_conn) {
	throw new Exception("Failed to connect to database as $dbConfig->username");
}

if(!mysql_select_db($db_config_array['dbname'], $db_conn)) {
	throw new Exception("Couldn't select database {$db_config_array['dbname']}.");
}

function start_db_transaction() {
    _autocommit(0);
    mysql_query("start transaction") or die(mysql_error());
}

function commit_db_transaction() {
    mysql_query("commit") or die(mysql_error());
    _autocommit(1);
}

function rollback_db_transaction() {
    mysql_query("rollback") or die(mysql_error());
    _autocommit(1);
}

function _autocommit( $value ) {
    mysql_query("set @@autocommit = $value") or die(mysql_error());
}
