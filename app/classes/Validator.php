<?php

namespace app\classes;

use app\exceptions\ValidatorException as ValidatorException;

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

	$res = preg_match($exp, $input);
        
        if(!$res) {
            
            throw new ValidatorException('It\'s not a number!');
        }

        return $input;
    }

    /**
     * 
     * @param string $input
     * @return string
     * @throws ValidatorException
     */
    public function Email($input)
    {
	$exp = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[_a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,4})$/";
               
	$res = preg_match($exp, $input);
        
        if(!$res) {
            
            throw new ValidatorException('Enter valid email address!');
        }

        return $input;
    }

    /**
     * 
     * @param string $input
     * @return string
     * @throws ValidatorException
     */
    public function Phone($input)
    {
	$exp = "/^0[0-9]{2}\/[0-9]{3}\-[0-9]{3,4}$/";

	$res = preg_match($exp, $input);
        
        if(!$res) {
            
            throw new ValidatorException('Enter valid phone number!');
        }

        return $input;
    }
    
    
    /**
     * 
     * @param string $data
     * @return string
     */
    public function TestInput($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
    
     /**
     * 
     * @param string $data
     * @return string
     */
    public function Required($data) 
    {
        $data = $this->TestInput($data);
        
        if(!$data) {
            
            throw new ValidatorException('Enter required fields!');
        }
        
        return $data;
    }
    
    /**
     * 
     * @param string $password
     * @param string $cpassword
     * @return string
     * @throws ValidatorException
     */
    public function Password($password, $cpassword)
    {
        if(!empty($password) && !empty($cpassword) && ($password == $cpassword)) {
            
            $password = $this->TestInput($password);
            $cpassword = $this->TestInput($cpassword);
            
            if (strlen($password) < 6) {
                
                throw new ValidatorException("Your Password Must Contain At Least 6 Characters!");
            }
        }
        else {
            
            throw new ValidatorException("Please Check You've Entered Or Confirmed Your Password!");
        }

        return $password;
    }
}
