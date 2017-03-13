<?php

namespace app\traits;

/**
 * Description of SetStatusTrait
 *
 * @author Vera
 */
trait SetStatusTrait 
{
        /**
         * 
         * @param int $id
         * @param int $status
         * @return object
         */
        protected function SetStatus($id, $status)
        {
        $item = $this->GetById($this->validator->Numeric($id));     
        $item->status = $status;
        $item->Update();

        return $item;
        }
        
        /**
         * 
         * @param int $id
         * @param int $status
         * @return object
         */
        public function SetStatusVisible($id, $status)
        {
            return $this->SetStatus($id, $status);
        }
        
        /**
         * 
         * @param int $id
         * @param int $status
         * @return object
         */
        public function SetStatusNotVisible($id, $status)
        {
            return $this->SetStatus($id, $status);
        }
        
        /**
         * 
         * @param int $id
         * @param int $status
         * @return object
         */
        public function SetStatusDeleted($id, $status)
        {
            return $this->SetStatus($id, $status);
        }    
    
} 