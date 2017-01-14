<?php

namespace app\classes;

/**
 * Description of Validator
 *
 * @author Vera
 */
class Validator 
{
    /**
        * 
        * @param boolean $input
        */
    public function Numeric($input)
    {
	$exp = "/[0-9]+/";

	echo preg_match($exp, $input);
    }

    /**
        * 
        * @param string $input
        * @return boolean
        */
    public function Email($input)
    {
	$exp = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[_a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,4})$/";

	return preg_match($exp, $input);
    }

    /**
        * 
        * @param boolean $input
        */
    public function Phone($input)
    {
	$exp = "/^0[0-9]{2}\/[0-9]{3}\-[0-9]{3,4}$/";

	echo preg_match($exp, $input);
    }
}
