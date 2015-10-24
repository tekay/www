<?php
namespace RestServer;
/**
 * Constants used in RestServer Class.
 */
class RestFormat{
	const PLAIN = 'text/plain';
	const HTML  = 'text/html';
	const JSON  = 'application/json';
	const XML   = 'application/xml';
    /** @var array */
	static public $formats = array(
		'plain' => RestFormat::PLAIN,
		'txt'   => RestFormat::PLAIN,
		'html'  => RestFormat::HTML,
		'json'  => RestFormat::JSON,
		'xml'   => RestFormat::XML,
	);
}
?>
