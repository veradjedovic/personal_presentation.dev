<?php

namespace app\models;

use app\classes\Database as Database;
use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\exceptions\CollectionNotFoundException as CollectionNotFoundException;
use app\exceptions\InsertNotExecutedException as InsertNotExecutedException;
use app\exceptions\UpdateNotExecutedException as UpdateNotExecutedException;
use app\exceptions\DeleteNotExecutedException as DeleteNotExecutedException;

/**
 * Abstract Class Model
 *
 * @author Vera
 */
abstract class Model 
{
        /**
              *
              * @var string 
              */
	public static $table = '';
        
        /**
              *
              * @var array 
              */
	public static $columns = array();
        
        /**
              *
              * @var string 
              */
	public static $id_column = '';

        /**
              * 
              * GetById method
              * @param type $id
              * @return type
              */
	public function GetById($id)
	{
		$db = Database::GetConnection();
		$res = mysqli_query($db, "select * from " . static::$table . " where " . static::$id_column . " = {$id}");
                $item = mysqli_fetch_object($res, get_called_class());
                
                if(!$item) {
                    
                    throw new ItemNotFoundException('Item not found');
                }
                
		return $item;
	}

        /**
              * 
              * GetAll method
              * @param type $filter
              * @return type
              */
	public function GetAll($fields = "*", $filter = "")
	{
		$db = Database::GetConnection();
		$res = mysqli_query($db, "select " . $fields . " from " . static::$table . " " . $filter);
                $ret_val = array();
//                $res = null;
                if(!$res) {
                    
                    throw new CollectionNotFoundException('Objects not found.');
                }                               
              
		while($rw = mysqli_fetch_object($res, get_called_class())){

			$ret_val[] = $rw;
		}
//              $ret_val=null;
                if(!$ret_val) {
                    
                    throw new CollectionNotFoundException('Collection not found.');
                }  
                
		return $ret_val;
	}

        /**
              * Insert method
              */
	public function Insert()
	{
		$db = Database::GetConnection();
		$columns_string = implode(",",static::$columns);
		$fields_arr = array();
		foreach(static::$columns as $field){
			$fields_arr[$field] = $this->$field;
		}
		$field_values_string = "'" . implode("','",$fields_arr) . "'";
                
                $res = mysqli_query($db,"insert into " . static::$table . " ({$columns_string}) values ({$field_values_string})");
                
		if(!$res) {
                    
                    throw new InsertNotExecutedException('Item is not inserted.');
                }
		// echo "insert into ".static::$table." ({$columns_string}) values ({$field_values_string})";   //proveriti da li ovo treba da se prikazuje
		$this->id = mysqli_insert_id($db);
                
                return $this->id;
	}

        /**
              * Update method
              */
	public function Update()
	{
		$db = Database::GetConnection();
		$fields_arr = array();
		foreach(static::$columns as $field){
			$fields_arr[] = $field . "='" . $this->$field . "'";
		}
		$fields_update_string = implode(",",$fields_arr);
		$id_column = static::$id_column;
                
                $res = mysqli_query($db,"update " . static::$table . " set {$fields_update_string} where " . $id_column . " = " . $this->$id_column);
                
		if(!$res) {
                    
                    throw new UpdateNotExecutedException('Item is not updated.');
                } 
                
                return $res;
	}

        /**
              * 
              * Delete method
              * @param type $id
              */
	public function Delete($id)
	{
		$db = Database::GetConnection(); 
                
                $res = mysqli_query($db,"delete from " . static::$table . " where " . static::$id_column . " = {$id}");
                
		if(!$res) {
                    
                    throw new DeleteNotExecutedException('Item is not deleted.');
                }
	}
}
