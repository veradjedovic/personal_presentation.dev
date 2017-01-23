<?php

namespace app\classes;

/**
 * Description of Datetime
 *
 * @author Vera
 */
class Datetime 
{
    /**
     *
     * @var string
     */
    protected $yearBegin;
    
    /**
     *
     * @var string
     */
    protected $yearEnd;
    
    
    /**
     * 
     * @param string/int $yearBegin
     * @param string/int $yearEnd
     */
    public function __construct($yearBegin, $yearEnd) 
    {
        $this->yearBegin = $yearBegin;
        $this->yearEnd = $yearEnd;
    }
    
    /**
     * 
     * @return string/int
     */
    public function getYearBegin() 
    {
        return $this->yearBegin;
    }

    /**
     * 
     * @return string/int
     */
    public function getYearEnd() 
    {
        return $this->yearEnd;
    }
}
