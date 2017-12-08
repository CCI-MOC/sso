<?php
/**
 * SAML 2.0 IdP configuration for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-hosted
 */

$metadata['__DYNAMIC:1__'] = array(
	/*
	 * The hostname of the server (VHOST) that will use this SAML entity.
	 *
	 * Can be '__DEFAULT__', to use this entry by default.
	 */
	'host' => '__DEFAULT__',

	// X.509 key and certificate. Relative to the cert directory.
	'privatekey' => '/etc/httpd/ssl/server.key',
	'certificate' => '/etc/httpd/ssl/server.crt',

	/*
	 * Authentication source to use. Must be one that is configured in
	 * 'config/authsources.php'.
	 */
	'auth' => 'env-static',

	'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',

	'authproc' => array(
		// Generate the persistent NameID.
		1 => array(
			'class' => 'saml:PersistentNameID',
			'attribute' => 'eduPersonPrincipalName',
			'nameId' => TRUE,
		),
	),
);
