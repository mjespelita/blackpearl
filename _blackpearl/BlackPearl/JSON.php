<?php

namespace Framework\BlackPearl;

class JSON
{
    public static function read($json_filename){
        if(file_exists($json_filename)){
            $check_if_the_file_extension_is_json = explode('.', $json_filename);
            $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
            if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
                echo "File extension error. It must be a .json file.";
            } else {
                return json_decode(file_get_contents($json_filename), true);
            }
        } else {
            echo "File doesn't exists or filename extension error";
        }
    }

    public static function push($json_filename, $data_to_be_inserted){
        if(file_exists($json_filename)){ // IF JSON FILE ALREADY EXIST
            $check_if_the_file_extension_is_json = explode('.', $json_filename);
            $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
            if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
                echo "File extension error. It must be a .json file.";
            } else {
                if(empty(file_get_contents($json_filename))){ // IF THE CONTENT OF JSON FILE IS EMPTY
                    file_put_contents($json_filename, '[]');
                    $json_file_decoded = json_decode(file_get_contents($json_filename), true);
                    // INSERTION
                    array_push($json_file_decoded, $data_to_be_inserted);
                    $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
                    return file_put_contents($json_filename, $json_file_encoded);
                } else {
                    $json_file_decoded = json_decode(file_get_contents($json_filename), true);
                    // INSERTION
                    array_push($json_file_decoded, $data_to_be_inserted);
                    $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
                    return file_put_contents($json_filename, $json_file_encoded);
                }
            }
        } else {
            $check_if_the_file_extension_is_json = explode('.', $json_filename);
            $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
            if($end_of_the_exploded_json_file != 'json'){
                echo "File extension error. It must be a .json file.";
            } else {
                file_put_contents($json_filename, '[]');
                $json_file_decoded = json_decode(file_get_contents($json_filename), true);
                // INSERTION
                array_push($json_file_decoded, $data_to_be_inserted);
                $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
                return file_put_contents($json_filename, $json_file_encoded);
            }
        }
    }

    public static function unshift($json_filename, $data_to_be_inserted){
        if(file_exists($json_filename)){ // IF JSON FILE ALREADY EXIST
            $check_if_the_file_extension_is_json = explode('.', $json_filename);
            $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
            if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
                echo "File extension error. It must be a .json file.";
            } else {
                if(empty(file_get_contents($json_filename))){ // IF THE CONTENT OF JSON FILE IS EMPTY
                    file_put_contents($json_filename, '[]');
                    $json_file_decoded = json_decode(file_get_contents($json_filename), true);
                    // INSERTION
                    array_unshift($json_file_decoded, $data_to_be_inserted);
                    $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
                    return file_put_contents($json_filename, $json_file_encoded);
                } else {
                    $json_file_decoded = json_decode(file_get_contents($json_filename), true);
                    // INSERTION
                    array_unshift($json_file_decoded, $data_to_be_inserted);
                    $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
                    return file_put_contents($json_filename, $json_file_encoded);
                }
            }
        } else {
            $check_if_the_file_extension_is_json = explode('.', $json_filename);
            $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
            if($end_of_the_exploded_json_file != 'json'){
                echo "File extension error. It must be a .json file.";
            } else {
                file_put_contents($json_filename, '[]');
                $json_file_decoded = json_decode(file_get_contents($json_filename), true);
                // INSERTION
                array_unshift($json_file_decoded, $data_to_be_inserted);
                $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
                return file_put_contents($json_filename, $json_file_encoded);
            }
        }
    }

    public static function delete($json_filename, $data_key_to_be_deleted, $data_value_to_be_deleted){
        if(file_exists($json_filename)){
            $check_if_the_file_extension_is_json = explode('.', $json_filename);
            $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
            if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
                echo "File extension error. It must be a .json file.";
            } else {
                $json_file_decoded = json_decode(file_get_contents($json_filename), true);
                foreach ($json_file_decoded as $key => $value) {
                    if($value[$data_key_to_be_deleted] === $data_value_to_be_deleted){
                        // DELETION
                        array_splice($json_file_decoded, $key, 1);
                        $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
                        return file_put_contents($json_filename, $json_file_encoded);
                    }
                }
            }
        } else {
            echo "File doesn't exists or filename extension error";
        }
    }

    public static function update($json_filename, $data_key_to_be_updated, $data_value_to_be_updated, $key_to_insert_new_updated_data, $new_updated_data){
        if(file_exists($json_filename)){
            $check_if_the_file_extension_is_json = explode('.', $json_filename);
            $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
            if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
                echo "File extension error. It must be a .json file.";
            } else {
                $json_file_decoded = json_decode(file_get_contents($json_filename), true);
                foreach ($json_file_decoded as $key => $value) {
                    if($value[$data_key_to_be_updated] === $data_value_to_be_updated){
                        // UPDATION
                        $json_file_decoded[$key][$key_to_insert_new_updated_data] = $new_updated_data;
                        $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
                        return file_put_contents($json_filename, $json_file_encoded);
                    }
                }
            }
        } else {
            echo "File doesn't exists or filename extension error";
        }
    }
}