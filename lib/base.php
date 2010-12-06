<?php
// Requisite checks + loading for magento plugin creation support. Not a
// functional module on its own - relies on additional scripts for real
// work.
//
// @author 		Joseph Mastey <joseph.mastey@gmail.com>
// @author		$Author$
// @version		$Id$
// @copyright	Copyright (c) JRM Ventures LLC, 2010-
//

if(!isset($_SERVER['argc'])) {
	throw new Exception("You don't appear to be on command line. Go away.");
}

// helpdoc system
if(isset($_SERVER['argv'][1]) && 0 == strcmp($_SERVER['argv'][1], "--help")) {
    if(function_exists("putdocs")) {
        putdocs();
        print "\n";
    } else {
        print "No docs available for this function. Yell at the developer. Sorry.\n";
    }

    exit;
}

require_once(dirname(__FILE__)."/functions.php");
$support_dir    = dirname(__FILE__)."/../data";
require_once("$support_dir/defaults.php");

// @throws Exception we're not inside of magento
$magento        = find_magento();
$magento_init   = false;

function init_magento($store_code = 'default', $scope_code = 'store') {
    global $magento, $magento_init;

    if($magento_init) { return; }
    $magento_init = true;

    chdir("$magento");
    require_once("$magento/app/Mage.php");

    Mage::app()->init($store_code, $scope_code);
}

function find_magento() {
    $path           = trim(`pwd`);
    while(false !== strpos($path, "/") && $path != "/") {
        $target         = "$path/LICENSE.txt";
        if(file_exists($target)) {
            return $path;
        }

        $path           = dirname($path);
    }

    throw new Exception("There is no Magento to be found. My hands are tied!");
}
