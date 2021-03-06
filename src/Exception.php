<?php
/**
 * Exception.php
 * @author    Daniel Mason <daniel@ayeayeapi.com>
 * @copyright (c) 2015 - 2016 Daniel Mason <daniel@ayeayeapi.com>
 * @license   MIT
 * @see       https://github.com/AyeAyeApi/Api
 */

namespace AyeAye\Api;

/**
 * Class Exception
 *
 * An exception specifically designed to be thrown back to the API end user. It
 * provides a public message and HTTP status code.
 *
 * @package AyeAye/Api
 * @see     https://github.com/AyeAyeApi/Api
 */
class Exception extends \Exception implements \JsonSerializable
{
    const DEFAULT_ERROR_CODE = 500;
    const DEFAULT_MESSAGE = 'Internal Server Error';

    /**
     * A message to show the client if available
     * @var string
     */
    public $publicMessage;

    /**
     * Exception constructor.
     *
     * Include information to pass to the client.
     *
     * @param string $publicMessage Message to show the user if not caught. Optional
     * @param int $code HTTP Status code to send to the user
     * @param string $systemMessage Message to show the enter into the log if different from the public message
     * @param \Exception $previous Any previous Exception
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function __construct($publicMessage = '', $code = 500, $systemMessage = '', \Exception $previous = null)
    {
        // Shift all parameters along if the first parameter is a string
        if (is_int($publicMessage)) {
            if (is_string($code)) {
                if ($systemMessage instanceof \Exception) {
                    $previous = $systemMessage;
                }
                $systemMessage = $code;
            }
            $code = $publicMessage;
            $publicMessage = null;
        }

        // If a public message wasn't specified, get it from the code
        if (!$publicMessage) {
            $publicMessage = Status::getMessageForCode($code);
            if (!$publicMessage) {
                $publicMessage = static::DEFAULT_MESSAGE;
            }
        }

        // If the system message wasn't specified, use the public message
        if (!$systemMessage) {
            $systemMessage = $publicMessage;
        }

        $this->publicMessage = $publicMessage;

        parent::__construct($systemMessage, $code, $previous);
    }

    /**
     * Get the message to tell the client.
     *
     * This message should only ever contain information that is useful to the
     * client and will not compromise the condition of the server.
     *
     * @return string
     */
    public function getPublicMessage()
    {
        return $this->publicMessage;
    }

    /**
     * Return data to be serialised into Json.
     *
     * The returned data contains the public message and exception code (which
     * is likely to be the HTTP status code). It will also include any previous
     * Aye Aye Exceptions.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $serialized = [
            'message' => $this->getPublicMessage(),
            'code' => $this->getCode(),
        ];
        if ($this->getPrevious() instanceof $this) {
            /** @var static $previous */
            $previous = $this->getPrevious();
            $serialized['previous'] = $previous->jsonSerialize();
        }
        return $serialized;
    }
}
