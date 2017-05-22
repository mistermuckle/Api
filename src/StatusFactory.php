<?php

namespace AyeAye\Api;

class StatusFactory
{
    /**
     * @param int $code
     * @param string|null $message
     * @return StatusInterface
     */
    public function createStatus($code, $message = null)
    {
        switch ($code) {
            case 100:
                return new Status\Continue($message);
            case 200:
                return new Status\Ok($message);
            case 201:
                return new Status\Created($message);
            case 202:
                return new Status\Accepted($message);
            case 203:
                return new Status\NonAuthoritativeInformation($message);
            case 204:
                return new Status\NoContent($message);
            case 205:
                return new Status\ResetContent($message);
            case 206:
                return new Status\PartialContent($message);
            case 300:
                return new Status\MultipleChoices($message);
            case 301:
                return new Status\MovedPermanently($message);
            case 302:
                return new Status\Found($message);
            case 303:
                return new Status\SeeOther($message);
            case 304:
                return new Status\NotModified($message);
            case 305:
                return new Status\UseProxy($message);
            case 306:
                return new Status\SwitchProxy($message);
            case 307:
                return new Status\TemporaryRedirect($message);
            case 308:
                return new Status\PermanentRedirect($message);
            case 400:
                return new Status\BadRequest($message);
            case 401:
                return new Status\Unauthorized($message);
            case 402:
                return new Status\PaymentRequired($message);
            case 403:
                return new Status\Forbidden($message);
            case 404:
                return new Status\NotFound($message);
            case 405:
                return new Status\MethodNotAllowed($message);
            case 406:
                return new Status\NotAcceptable($message);
            case 500:
                return new Status\InternalServerError($message);
            default:
                if ($code  < 100 || $code > 599) {
                    throw new \Exception('Invalid status');
                }
            
                $status = new Status\Custom($code, $message);
                
                if ($status < 200) {
                    return new Status\InformationalStatusWrapper($status);
                } elseif ($status < 300) {
                    return new Status\SuccessStatusWrapper($status);
                } elseif ($status < 400) {
                    return new Status\RedirectionStatusWrapper($status);
                } elseif ($status < 500) {
                    return new Status\ClientErrorStatusWrapper($status);
                } else {
                    return newStatus\ServerErrorStatusWrapper($status);
                }
            }
        }
    }
}