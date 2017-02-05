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
    
    /**
     * 
     * @return array
     */
    public function getDays()
    {
        $days = array('Monthday', 'Thusday', 'Wendersday', 'Thursday', 'Friday', 'Saturday', 'Sandy');
        
        return $days;
    }
    
    /**
     * 
     * @return array
     */
    public function getMonth() 
    {
        $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        
        return $month;
    }
    
    
}
