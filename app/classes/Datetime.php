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
     * @return string/int
     */
    public function getYearBegin() 
    {
        $this->yearBegin = date("Y")-60;
        return $this->yearBegin;
    }

    /**
     * 
     * @return string/int
     */
    public function getYearEnd() 
    {
        $this->yearEnd = date("Y");
        return $this->yearEnd;
    }
    
    /**
     * 
     * Return days of the week in Serbian.
     * @return array
     */
    public function getDays()
    {
        $days = array('Ponedeljak', 'Utorak', 'Sreda', 'Četvrtak', 'Petak', 'Subota', 'Nedelja');
        
        return $days;
    }
    
    /**
     * 
     * Return days of the week in English.
     * @return array
     */
    public function getDaysEn()
    {
        $days = array('Monthday', 'Thusday', 'Wendersday', 'Thursday', 'Friday', 'Saturday', 'Sandy');
        
        return $days;
    }
    
    /**
     * 
     * Return months in a year in Serbian.
     * @return array
     */
    public function getMonth() 
    {
        $month = array('Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'Avgust', 'Septembar', 'Octobar', 'Novembar', 'Decembar');
        
        return $month;
    }
    
    /**
     * 
     * Return months in a year in English.
     * @return array
     */
    public function getMonthEn() 
    {
        $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        
        return $month;
    }
}
