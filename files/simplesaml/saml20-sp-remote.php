<?php
/**
 * SAML 2.0 remote SP metadata for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */

$metadata['https://sso.massopen.cloud/auth/realms/master'] = array(
	'AssertionConsumerService' => 'https://sso.massopen.cloud/auth/realms/master/broker/incommon/endpoint',
	'SingleLogoutService' => 'https://sso.massopen.cloud/auth/realms/master/broker/incommon/endpoint',
);
