<?php
namespace RestServer;
use Exception;
class RestException extends Exception
{
    public function __construct($code, $message = null)
    {
        parent::__construct($message, $code);
    }
}
?>
