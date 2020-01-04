<?php
/**
 * Created by PhpStorm.
 * User: rick
 * Date: 4-1-20
 * Time: 15:33
 */

namespace RickBakker\Cymruwhois\Models;

class IPAddress
{
    private $ip;
    private $bgp_prefix;
    private $country_code;
    private $asn;
    private $as_name;
    private $allocation_date;
    private $registry;

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getBgpPrefix()
    {
        return $this->bgp_prefix;
    }

    /**
     * @param mixed $bgp_prefix
     */
    public function setBgpPrefix($bgp_prefix)
    {
        $this->bgp_prefix = $bgp_prefix;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @param mixed $country_code
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
    }

    /**
     * @return mixed
     */
    public function getAsn()
    {
        return $this->asn;
    }

    /**
     * @param mixed $asn
     */
    public function setAsn($asn)
    {
        $this->asn = $asn;
    }

    /**
     * @return mixed
     */
    public function getAsName()
    {
        return $this->as_name;
    }

    /**
     * @param mixed $as_name
     */
    public function setAsName($as_name)
    {
        $this->as_name = $as_name;
    }

    /**
     * @return mixed
     */
    public function getAllocationDate()
    {
        return $this->allocation_date;
    }

    /**
     * @param mixed $allocation_date
     */
    public function setAllocationDate($allocation_date)
    {
        $this->allocation_date = $allocation_date;
    }

    /**
     * @return mixed
     */
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * @param mixed $registry
     */
    public function setRegistry($registry)
    {
        $this->registry = $registry;
    }



}