<?php

$email              = "joseph.mastey@gmail.com";
$author             = "Joseph Mastey <$email>";
$company            = "MM";
$default_location   = "/var/www/psb";
$support_dir        = "plugin";
$cd_paths           = array(
  'app'         => '%magento%/app',
  'local'       => '%magento%/app/code/local',
  'community'   => '%magento%/app/code/community',

  'design'      => '%magento%/app/design/frontend/default/%theme%',
  'theme'       => '%magento%/app/design/frontend/default/%theme%',
  'template'    => '%magento%/app/design/frontend/default/%theme%/template',
  'layout'      => '%magento%/app/design/frontend/default/%theme%/layout',

  'etc'         => '%magento%/app/etc',
  'modules'     => '%magento%/app/etc/modules',

  'log'         => '%magento%/var/log',
  'report'      => '%magento%/var/report',

  'skin'        => '%magento%/skin/frontend/default/%theme%',
  'css'         => '%magento%/skin/frontend/default/%theme%/css',
  'images'      => '%magento%/skin/frontend/default/%theme%/images',

  'locale'      => '%magento%/app/locale/en_US',
  'email'       => '%magento%/app/locale/en_US/template/email',

  'media'       => '%magento%/media',
  'images'      => '%magento%/media/catalog',
  'product'     => '%magento%/media/catalog/product',
  
  'root'        => '%magento%/',
  '-'           => '%magento%/',

  // external paths for easier navigation
  'sb'          => '/var/www/sb',
  'psb'         => '/var/www/psb',
  'utils'       => '/var/www/utils/magento',
);

// site profiles, used to load default data into the database for a site
$profiles           = array(
  'psb'         => array(
    'description'   => 'PSBrooklyn.com',
    'config'        => array(
      'web/unsecure/base_url' => 'http://psb.transmogrified.com/',
      'web/secure/base_url'   => 'http://psb.transmogrified.com/',
    ),
  ),
);
