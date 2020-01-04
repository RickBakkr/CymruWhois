<?php
/**
 * Created by PhpStorm.
 * User: rick
 * Date: 4-1-20
 * Time: 15:15
 */

namespace RickBakker\Cymruwhois;

use RickBakker\Cymruwhois\Models\IPAddress;
use RickBakker\Cymruwhois\Utils\Socket;

class WHOIS {

    protected static $server = "whois.cymru.com";
    protected static $port = 43;

    public static function retrieve($ip) {
        // TODO: validate if IP is legit.
        $command = "-v " . $ip;

        $socket = new Socket(self::$server, self::$port);
        $output = $socket->call($command);

        return self::parse($output);
    }

    private static function parse($input) {
        $results = [];
        // If 'AS' is not in our output, we can expect the output to not be valid.
        if(strpos($input, 'AS') !== false) {
            $rows = explode("\n", $input);
            // Remove first row, as that is just to form the table in the real response.
            array_shift($rows);
            foreach($rows as $row) {
                $row = trim($row);
                if($row != '') {
                    $parts = explode('|', $row);

                    $item = new IPAddress;
                    $item->setAsn(trim($parts[0]));
                    $item->setIp(trim($parts[1]));
                    $item->setBgpPrefix(trim($parts[2]));
                    $item->setCountryCode(trim($parts[3]));
                    $item->setRegistry(trim($parts[4]));
                    $item->setAllocationDate(trim($parts[5]));
                    $item->setAsName(trim($parts[6]));

                    $results[] = $item;
                }
            }
        }
        return $results;
    }

}