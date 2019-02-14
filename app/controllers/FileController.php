<?php
/**
 * Created by PhpStorm.
 * User: mad
 * Date: 14.02.19
 * Time: 14:39
 */

namespace app\controllers;


use app\App;

class FileController
{
    private static $path = './assets/uploads';
    private $filename;
    private $allowedFiles = [
        'image/jpeg', 'image/png', 'image/gif'
    ];
    /* 8MB */
    private $maxFileSize = 8388608;
    /* 2MB */
    // private $maxFileSize =  2097152;

    public function run()
    {
        $this->allFiles();

        switch ($_GET['action'] ?? null) {
            case 'upload':
                // check errors
                $err = $this->hasErrors($_FILES);
                if(!$err){
                    if($this->valideType($_FILES)){
                        if($this->hasValidFileSize($_FILES)){

                            foreach ($_FILES as $field => $file) {
                                $this->filename = $file['name'];
                                if(move_uploaded_file($file['tmp_name'], self::$path . "/" . $this->filename)){

                                    $fullname = self::$path . "/" . $this->filename;
                                    // fullname has to be stored in database;
                                    // or only filename
                                    /*
                                        $model = new Model();
                                        $model->storeImgNameInDatabase($fullname || $filename);
                                        App::redirect('location');

                                    */

                                    App::redirect('filemanager');
                                }
                            }
                        }else{
                            echo "img is to large";
                        }
                    }
                }

                // upload folder creation
                // file xists
                //filename -> database insert

                break;
        }
    }

    public static function allFiles($uploadDir = null, $withDir = false){
        if(is_null($uploadDir)){
            $uploadDir = self::$path;
        }

        if($withDir){
            return scandir($uploadDir);
        }
        return array_slice(scandir($uploadDir), 2);

    }
    
    private function hasValidFileSize($files) {
        foreach ($files as $field => $file) {
            if($file['size'] > $this->maxFileSize){
                return false;
            }
            return true;
        }
    }

    private function valideType($files) {

        foreach ($files as $field => $file) {
            if(in_array($file['type'], $this->allowedFiles)){
                return true;
            }

            return false;

        }
    }

    private function hasErrors($files)
    {
            $message = false;
            foreach ($files as $field => $file) {
                switch ($file['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $message = "The uploaded file was only partially uploaded";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $message = "No file was uploaded";
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $message = "Missing a temporary folder";
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $message = "Failed to write file to disk";
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $message = "File upload stopped by extension";
                        break;
                    case 0:
                        return $message;
                        break;
                    default:
                        $message = "Unknown upload error";
                        break;
                }
            }

        }

}