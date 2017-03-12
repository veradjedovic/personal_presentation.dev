<?php

namespace app\jobs;

use app\exceptions\FileUploadException as FileUploadException;

/**
 * Description of FileUploadJob
 *
 * @author Vera
 */
class FileUploadJob
{
        /**
         * 
         * @param string $file_path
         * @return string
         * @throws FileUploadException
         */
        public function UploadPicture($file_path)
        {
            if(!isset($_FILES)) {
                
                throw new FileUploadException("File doesn't exists");   
            }
            
            if($_FILES==[] || ($_FILES['f_upload']['size'] == false && $_FILES['f_upload']['type'] == false && $_FILES['f_upload']['error'] == true && $_FILES['f_upload']['name'] == false && $_FILES['f_upload']['tmp_name'] == false)){
                
                $file_name = '';
                
            } else {
                
                if($_FILES['f_upload']['size'] <= 0) {
                    
                    throw new FileUploadException('The picture is too large');                   
                }
                
                if(($_FILES['f_upload']['type'] != "image/jpeg") && ($_FILES['f_upload']['type'] != "image/jpg") && ($_FILES['f_upload']['type'] != "image/JPG") && ($_FILES['f_upload']['type'] != "image/png")) {
                    
                    throw new FileUploadException('Invalid file format');                   
                }
                
                if ($_FILES['f_upload']['error'] > 0) {
                    
                    throw new FileUploadException('Error is happend');
                }

                $file_name = uniqid() . $_FILES['f_upload']['name'];
                $file_name = str_replace(' ', '_', $file_name);
                move_uploaded_file($_FILES['f_upload']['tmp_name'], APP_PATH. $file_path . '/' . $file_name); 
            }                                                                   

            return $file_name;
        }
        
        /**
         * 
         * @param string $file_path
         * @return string
         * @throws FileUploadException
         */
        public function UploadPdf($file_path)
        {
            if(!isset($_FILES)) {
                
                throw new FileUploadException("File doesn't exists");   
            }
            
            if($_FILES==[] || ($_FILES['f_upload']['size'] == false && $_FILES['f_upload']['type'] == false && $_FILES['f_upload']['error'] == true && $_FILES['f_upload']['name'] == false && $_FILES['f_upload']['tmp_name'] == false)){
                
                $file_name = '';
                
            } else {
                
                if($_FILES['f_upload']['size'] <= 0) {
                    
                    throw new FileUploadException('The picture is too large');                   
                }
                
                if(($_FILES['f_upload']['type'] != "application/pdf")) {
                    
                    throw new FileUploadException('Invalid file format');                   
                }
                
                if ($_FILES['f_upload']['error'] > 0) {
                    
                    throw new FileUploadException('Error is happend');
                }

                $file_name = uniqid() . $_FILES['f_upload']['name'];
                $file_name = str_replace(' ', '_', $file_name);
                move_uploaded_file($_FILES['f_upload']['tmp_name'], APP_PATH. $file_path . '/' . $file_name);                
            }
            
            return $file_name;
        }
}                     
