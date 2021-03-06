<?
/**
 * @package    phpmyca
 * @author     Mike Green <mdgreen@gmail.com>
 * @copyright  Copyright (c) 2010, Mike Green
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
(basename($_SERVER['PHP_SELF']) == basename(__FILE__)) && die('Access Denied');

class phpmycaDboCa extends phpmycadbo {

/**
 * Constructor
 */
function __construct() {
	parent::__construct();
	$this->setDatabaseTable('cert_authorities');
	// define object properties
	$this->propertyAdd('Certificate',      'cert_cert');
	$this->propertyAdd('CommonName',       'commonName');
	$this->propertyAdd('CountryName',      'countryName');
	$this->propertyAdd('CreateDate',       'create_date');
	$this->propertyAdd('CSR',              'cert_request');
	$this->propertyAdd('Description',      'ca_desc');
	$this->propertyAdd('FingerprintMD5',   'fingerprint_md5');
	$this->propertyAdd('FingerprintSHA1',  'fingerprint_sha1');
	$this->propertyAdd('Id',               'ca_id');
	$this->propertyAdd('LocalityName',     'localityName');
	$this->propertyAdd('OrgName',          'organizationName');
	$this->propertyAdd('OrgUnitName',      'organizationalUnitName');
	$this->propertyAdd('ParentId',         'parent_id');
	$this->propertyAdd('PrivateKey',       'cert_private_key');
	$this->propertyAdd('PublicKey',        'cert_public_key');
	$this->propertyAdd('RevokeDate',       'revoke_date');
	$this->propertyAdd('SerialLastIssued', 'last_serial_issued');
	$this->propertyAdd('SerialNumber',     'cert_serial');
	$this->propertyAdd('ValidFrom',        'start_date');
	$this->propertyAdd('ValidTo',          'expire_date');
	// set id property
	$this->setIdProperty('Id');
	// set date properties
	$this->setPropertyIsDate('CreateDate', true);
	$this->setPropertyIsDate('RevokeDate', true);
	$this->setPropertyIsDate('ValidFrom',  true);
	$this->setPropertyIsDate('ValidTo',    true);
	// set numeric properties
	$this->setPropertyIsQuoted('Id',               false);
	$this->setPropertyIsQuoted('ParentId',         false);
	$this->setPropertyIsQuoted('SerialLastIssued', false);
	$this->setPropertyIsQuoted('SerialNumber',     false);
	// set max lengths
	$this->setPropertyMaxLength('Certificate',      65535);
	$this->setPropertyMaxLength('CommonName',         255);
	$this->setPropertyMaxLength('CountryName',          2);
	$this->setPropertyMaxLength('CreateDate',          19);
	$this->setPropertyMaxLength('CSR',              65535);
	$this->setPropertyMaxLength('Description',        128);
	$this->setPropertyMaxLength('FingerprintMD5',      32);
	$this->setPropertyMaxLength('FingerprintSHA1',     40);
	$this->setPropertyMaxLength('Id',                  10);
	$this->setPropertyMaxLength('LocalityName',        64);
	$this->setPropertyMaxLength('OrgName',            255);
	$this->setPropertyMaxLength('OrgUnitName',      65535);
	$this->setPropertyMaxLength('ParentId',            10);
	$this->setPropertyMaxLength('PrivateKey',       65535);
	$this->setPropertyMaxLength('PublicKey',        65535);
	$this->setPropertyMaxLength('RevokeDate',          19);
	$this->setPropertyMaxLength('SerialLastIssued',    64);
	$this->setPropertyMaxLength('SerialNumber',        64);
	$this->setPropertyMaxLength('ValidFrom',           19);
	$this->setPropertyMaxLength('ValidTo',             19);
	}

}
?>
