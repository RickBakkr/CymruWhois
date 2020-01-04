<?php

namespace RickBakker\Cymruwhois\Utils;

use RickBakker\Cymruwhois\Exceptions\SocketException;

/**
 * Created by PhpStorm.
 * User: rick
 * Date: 4-1-20
 * Time: 15:17
 */

class Socket
{

    /**
     * Socket constructor.
     */
    public function __construct($server, $port)
    {
        $this->server = $server;
        $this->port = $port;
        $this->errno = null;
        $this->errstr = null;
        $this->timeout = 10;
    }

    /**
     * Opens socket and stores it within this instance.
     *
     * @throws SocketException
     */
    private function connect()
    {
        $conn = @fsockopen($this->server, $this->port, $this->errno, $this->errstr, $this->timeout);
        if(!$conn)
        {
            throw new SocketException("Socket Error " . $this->errno . " - " . $this->errstr);
        }
        $this->connection = $conn;

    }

    /**
     * Puts the in the socket and collects response.
     * @param $input
     * @return string - server response
     */
    public function call($input)
    {
        $this->connect();
        fputs($this->connection, $input . " \r\n");
        $output = "";
        while(!feof($this->connection))
        {
            $output .= fgets($this->connection);
        }
        fclose($this->connection);
        return $output;
    }
}