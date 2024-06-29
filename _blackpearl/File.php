<?php

namespace Framework\BlackPearl;

class File
{
    public static $filename;

    public static function upload($filename_input, $file_path, $filename_valid_extension){
        if(empty($filename_input)||empty($file_path)||empty($filename_valid_extension)){
            echo "Invalid or incomplete argument.";
        } else { // CHECKING FILE PATH
            $check_file_path_if_valid = str_split($file_path);
            if(end($check_file_path_if_valid) != '/'){
                $file_path = $file_path.'/'; // IF END OF FILE IS NOT /, INSERT /
            }
            $filename_upload_extension = explode('.', $filename_input['name']);
            $filename_upload_extension_lowercase = strtolower(end($filename_upload_extension));
            if($filename_input['error'] === 0){
                if(!in_array($filename_upload_extension_lowercase, $filename_valid_extension)){
                    echo "Invalid file extension";
                } else {
                    $new_filename_generated = uniqid('file', true).'.'.$filename_upload_extension_lowercase;
                    $new_file_upload_path = $file_path.$new_filename_generated;
                    self::$filename = $new_filename_generated; // SET FILENAME TO BE ACCESSIBLE
                    return move_uploaded_file($filename_input['tmp_name'], $new_file_upload_path); // SUCCESSFULLY UPLOADED
                }
            } else {
                echo "There was an error uploading the file";
            }
        }
    }
}