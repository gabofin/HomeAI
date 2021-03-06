<?php
/**
 * \php\Util\Network.php
 *
 * @package     HomeAI
 * @subpackage  Util
 * @category    Network
 */
namespace HomeAI\Util;

use HomeAI\Core\Request;

/**
 * Network -class
 *
 * This class contains different network related helper methods.
 *
 * @package     HomeAI
 * @subpackage  Util
 * @category    Network
 *
 * @date        $Date$
 * @author      $Author$
 * @revision    $Rev$
 */
class Network implements Interfaces\Network
{
    /**
     * Method returns user ip -address.
     *
     * @access  public
     * @static
     *
     * @return  string  User ip address
     */
    public static function getIp()
    {
        return Request::getInstance()->getServer('REMOTE_ADDR');
    }

    /**
     * Method returns user ip -address hostname.
     *
     * @access  public
     * @static
     *
     * @return  string  User ip address hostname
     */
    public static function getHost()
    {
        return gethostbyaddr(Network::getIp());
    }

    /**
     * Method returns defined hostname ip -address.
     *
     * @access  public
     * @static
     *
     * @param   string  $host   Hostname
     *
     * @return  string          Hostname ip -address
     */
    public static function getHostIp($host)
    {
        return gethostbyname($host);
    }

    /**
     * Method returns user agent information.
     *
     * @access  public
     * @static
     *
     * @return  string  User agent
     */
    public static function getAgent()
    {
        return Request::getInstance()->getServer('HTTP_USER_AGENT');
    }

    /**
     * Method converts given HTTP status code to plain error message.
     *
     * @access  public
     * @static
     *
     * @param   integer $code           HTTP status code
     * @param   bool    $includeCode    Include code to output or not
     *
     * @return  string                  HTTP status message.
     */
    public static function getStatusCodeString($code, $includeCode = true)
    {
        switch ($code) {
            // 1xx Informational
            case 100:
                $string = 'Continue';
                break;
            case 101:
                $string = 'Switching Protocols';
                break;
            case 102:
                $string = 'Processing';
                break; // WebDAV
            case 122:
                $string = 'Request-URI too long';
                break; // Microsoft

            // 2xx Success
            case 200:
                $string = 'OK';
                break;
            case 201:
                $string = 'Created';
                break;
            case 202:
                $string = 'Accepted';
                break;
            case 203:
                $string = 'Non-Authoritative Information';
                break; // HTTP/1.1
            case 204:
                $string = 'No Content';
                break;
            case 205:
                $string = 'Reset Content';
                break;
            case 206:
                $string = 'Partial Content';
                break;
            case 207:
                $string = 'Multi-Status';
                break; // WebDAV

            // 3xx Redirection
            case 300:
                $string = 'Multiple Choices';
                break;
            case 301:
                $string = 'Moved Permanently';
                break;
            case 302:
                $string = 'Found';
                break;
            case 303:
                $string = 'See Other';
                break; //HTTP/1.1
            case 304:
                $string = 'Not Modified';
                break;
            case 305:
                $string = 'Use Proxy';
                break; // HTTP/1.1
            case 306:
                $string = 'Switch Proxy';
                break; // Depreciated
            case 307:
                $string = 'Temporary Redirect';
                break; // HTTP/1.1

            // 4xx Client Error
            case 400:
                $string = 'Bad Request';
                break;
            case 401:
                $string = 'Unauthorized';
                break;
            case 402:
                $string = 'Payment Required';
                break;
            case 403:
                $string = 'Forbidden';
                break;
            case 404:
                $string = 'Not Found';
                break;
            case 405:
                $string = 'Method Not Allowed';
                break;
            case 406:
                $string = 'Not Acceptable';
                break;
            case 407:
                $string = 'Proxy Authentication Required';
                break;
            case 408:
                $string = 'Request Timeout';
                break;
            case 409:
                $string = 'Conflict';
                break;
            case 410:
                $string = 'Gone';
                break;
            case 411:
                $string = 'Length Required';
                break;
            case 412:
                $string = 'Precondition Failed';
                break;
            case 413:
                $string = 'Request Entity Too Large';
                break;
            case 414:
                $string = 'Request-URI Too Long';
                break;
            case 415:
                $string = 'Unsupported Media Type';
                break;
            case 416:
                $string = 'Requested Range Not Satisfiable';
                break;
            case 417:
                $string = 'Expectation Failed';
                break;
            case 422:
                $string = 'Unprocessable Entity';
                break; // WebDAV
            case 423:
                $string = 'Locked';
                break; // WebDAV
            case 424:
                $string = 'Failed Dependency';
                break; // WebDAV
            case 425:
                $string = 'Unordered Collection';
                break; // WebDAV
            case 426:
                $string = 'Upgrade Required';
                break;
            case 449:
                $string = 'Retry With';
                break; // Microsoft
            case 450:
                $string = 'Blocked';
                break; // Microsoft

            // 5xx Server Error
            case 500:
                $string = 'Internal Server Error';
                break;
            case 501:
                $string = 'Not Implemented';
                break;
            case 502:
                $string = 'Bad Gateway';
                break;
            case 503:
                $string = 'Service Unavailable';
                break;
            case 504:
                $string = 'Gateway Timeout';
                break;
            case 505:
                $string = 'HTTP Version Not Supported';
                break;
            case 506:
                $string = 'Variant Also Negotiates';
                break;
            case 507:
                $string = 'Insufficient Storage';
                break; // WebDAV
            case 509:
                $string = 'Bandwidth Limit Exceeded';
                break; // Apache
            case 510:
                $string = 'Not Extended';
                break;

            // Unknown code:
            default:
                $string = 'Unknown';
                break;
        }

        return ($includeCode) ? $code .': '. $string : $string;
    }
}
