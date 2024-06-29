<?php

namespace Framework\BlackPearl;

// =========================================================== FILE UPLOAD - new
// =========================================================== DATABASE - new
// =========================================================== MATH
use chillerlan\QRCode\QRCode; // ============================= QRCODE
use CodexWorld\PhpXlsxGenerator; // ========================== EXCEL
use eftec\bladeone\BladeOne; // ============================== BLADE - new
use PHPMailer\PHPMailer\PHPMailer; // ======================== MAIL
use PHPMailer\PHPMailer\SMTP; // ============================= MAIL
use Picqer\Barcode\BarcodeGeneratorHTML; // ================== BARCODE
use VStelmakh\UrlHighlight\UrlHighlight; // ================== URL HIGHLIGHTER

class BlackPearl
{

    // MATH ========================================================================================================================================

    public static function compute($method, $nums): float
    {
        if ($method === 'add') {return array_sum($nums);}

        if ($method === 'minus') {
            // Initialize a variable to hold the result
            $result = $nums[0]; // Start with the first number
            // Iterate through the array starting from the second element
            for ($i = 1; $i < count($nums); $i++) {
                $result -= $nums[$i];
            }
            return $result;
        }

        if ($method === 'multiply') {
            // Initialize a variable to hold the result, starting with 1 (since multiplying by 0 would yield 0)
            $result = 1;
            // Iterate through the array and multiply each element with the current result
            foreach ($nums as $number) {
                $result *= $number;
            }
            return $result;
        }

        if ($method === 'divide') {
            // Initialize a variable to hold the result, starting with the first number
            $result = $nums[0];

            // Iterate through the array starting from the second element
            for ($i = 1; $i < count($nums); $i++) {
                // Check if the current number is not zero before dividing
                if ($nums[$i] != 0) {
                    $result /= $nums[$i];
                } else {
                    // Handle division by zero (if necessary for your use case)
                    echo "Error: Division by zero encountered.";
                    break;
                }
            }
            return $result;
        }
        return 0;
    }

    // Identifier

    public static function isEven($num): bool
    {
        return ($num %2 == 0) ? true : false;
    }

    // linear regression

    public static function linearRegression($xValues, $yValues, $result)
    {
        // Calculate number of data points
        $n = count($xValues);

        // Calculate sums
        $sumX = array_sum($xValues);
        $sumY = array_sum($yValues);

        // Calculate sum of squares
        $sumXSquared = 0;
        $sumXY = 0;
        for ($i = 0; $i < $n; $i++) {
            $sumXSquared += ($xValues[$i] * $xValues[$i]);
            $sumXY += ($xValues[$i] * $yValues[$i]);
        }

        // Calculate slope (m)
        $slope = ($n * $sumXY - $sumX * $sumY) / ($n * $sumXSquared - $sumX * $sumX);

        // Calculate y-intercept (b)
        $intercept = ($sumY - $slope * $sumX) / $n;

        if ($result === 'slope') {
            return $slope;
        } elseif ($result === 'intercept') {
            return $intercept;
        } else {
            // Return an associative array with slope and intercept
            return array(
                'slope' => $slope,
                'intercept' => $intercept
            );
        }
    }

    public static function calculateTotalPrice($items, $discountThreshold, $discountRate, $taxRate) {
        $subtotal = 0;
        // Calculate subtotal
        foreach ($items as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        // Apply discount if subtotal exceeds the threshold
        if ($subtotal > $discountThreshold) {
            $discount = $subtotal * $discountRate;
            $subtotal -= $discount;
        }
        // Apply tax
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;
        return $total;
    }

    public static function calculateBMI($weight, $height) {
        // Check if weight and height are positive numbers
        if ($weight <= 0 || $height <= 0) {
            return "Weight and height must be positive numbers.";
        }
        // Calculate BMI
        $bmi = $weight / ($height * $height);
        // Return the BMI value rounded to two decimal places
        return round($bmi, 2);
    }

    // EXCEL =================================================================================================================================

    // public static function downloadExcel($excelArray, $source)
    // {
    //     require 'excel/PhpXlsxGenerator.php';
    //     // Initialize an empty array to store associative arrays
    //     $sourceArray = [];
    //     // Convert each user to an associative array
    //     foreach ($source as $s) {
    //         $sourceArray[] = $s->toArray(); // Convert the model to an associative array
    //     }
    //     foreach ($sourceArray as $key => $value) {
    //         array_push($excelArray, $value);
    //     }
    //     $xlsx = PhpXlsxGenerator::fromArray($excelArray);
    //     $filename = uniqid('', true).'.'.'xlsx';
    //     return $xlsx->downloadAs($filename);
    // }

    // public static function downloadExcelAs($filename, $excelArray, $source)
    // {
    //     require 'excel/PhpXlsxGenerator.php';
    //     // Initialize an empty array to store associative arrays
    //     $sourceArray = [];
    //     // Convert each user to an associative array
    //     foreach ($source as $s) {
    //         $sourceArray[] = $s->toArray(); // Convert the model to an associative array
    //     }
    //     foreach ($sourceArray as $key => $value) {
    //         array_push($excelArray, $value);
    //     }
    //     $xlsx = PhpXlsxGenerator::fromArray($excelArray);
    //     return $xlsx->downloadAs($filename.'.'.'xlsx');
    // }

    // public static function _downloadExcel($excelArray, $source)
    // {
    //     require 'excel/PhpXlsxGenerator.php';

    //     foreach ($source as $key => $value) {
    //         array_push($excelArray, $value);
    //     }
    //     $xlsx = PhpXlsxGenerator::fromArray($excelArray);
    //     $filename = uniqid('', true).'.'.'xlsx';
    //     return $xlsx->downloadAs($filename);
    // }

    // public static function _downloadExcelAs($filename, $excelArray, $source)
    // {
    //     require 'excel/PhpXlsxGenerator.php';
    //     foreach ($source as $key => $value) {
    //         array_push($excelArray, $value);
    //     }
    //     $xlsx = PhpXlsxGenerator::fromArray($excelArray);
    //     return $xlsx->downloadAs($filename.'.'.'xlsx');
    // }

    // URL HIGHLIGHTER ======================================================================================================================

    // public static function withUrl($string)
    // {
    //     require 'vendor/autoload.php';
    //     $urlHighlight = new UrlHighlight();
    //     return $urlHighlight->highlightUrls($string);
    // }

    // JSON ==================================================================================================================================

    // public static function jsonRead($json_filename){
    //     if(file_exists($json_filename)){
    //         $check_if_the_file_extension_is_json = explode('.', $json_filename);
    //         $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
    //         if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
    //             echo "File extension error. It must be a .json file.";
    //         } else {
    //             return json_decode(file_get_contents($json_filename), true);
    //         }
    //     } else {
    //         echo "File doesn't exists or filename extension error";
    //     }
    // }

    // public static function jsonPush($json_filename, $data_to_be_inserted){
    //     if(file_exists($json_filename)){ // IF JSON FILE ALREADY EXIST
    //         $check_if_the_file_extension_is_json = explode('.', $json_filename);
    //         $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
    //         if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
    //             echo "File extension error. It must be a .json file.";
    //         } else {
    //             if(empty(file_get_contents($json_filename))){ // IF THE CONTENT OF JSON FILE IS EMPTY
    //                 file_put_contents($json_filename, '[]');
    //                 $json_file_decoded = json_decode(file_get_contents($json_filename), true);
    //                 // INSERTION
    //                 array_push($json_file_decoded, $data_to_be_inserted);
    //                 $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
    //                 return file_put_contents($json_filename, $json_file_encoded);
    //             } else {
    //                 $json_file_decoded = json_decode(file_get_contents($json_filename), true);
    //                 // INSERTION
    //                 array_push($json_file_decoded, $data_to_be_inserted);
    //                 $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
    //                 return file_put_contents($json_filename, $json_file_encoded);
    //             }
    //         }
    //     } else {
    //         $check_if_the_file_extension_is_json = explode('.', $json_filename);
    //         $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
    //         if($end_of_the_exploded_json_file != 'json'){
    //             echo "File extension error. It must be a .json file.";
    //         } else {
    //             file_put_contents($json_filename, '[]');
    //             $json_file_decoded = json_decode(file_get_contents($json_filename), true);
    //             // INSERTION
    //             array_push($json_file_decoded, $data_to_be_inserted);
    //             $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
    //             return file_put_contents($json_filename, $json_file_encoded);
    //         }
    //     }
    // }

    // public static function jsonUnshift($json_filename, $data_to_be_inserted){
    //     if(file_exists($json_filename)){ // IF JSON FILE ALREADY EXIST
    //         $check_if_the_file_extension_is_json = explode('.', $json_filename);
    //         $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
    //         if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
    //             echo "File extension error. It must be a .json file.";
    //         } else {
    //             if(empty(file_get_contents($json_filename))){ // IF THE CONTENT OF JSON FILE IS EMPTY
    //                 file_put_contents($json_filename, '[]');
    //                 $json_file_decoded = json_decode(file_get_contents($json_filename), true);
    //                 // INSERTION
    //                 array_unshift($json_file_decoded, $data_to_be_inserted);
    //                 $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
    //                 return file_put_contents($json_filename, $json_file_encoded);
    //             } else {
    //                 $json_file_decoded = json_decode(file_get_contents($json_filename), true);
    //                 // INSERTION
    //                 array_unshift($json_file_decoded, $data_to_be_inserted);
    //                 $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
    //                 return file_put_contents($json_filename, $json_file_encoded);
    //             }
    //         }
    //     } else {
    //         $check_if_the_file_extension_is_json = explode('.', $json_filename);
    //         $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
    //         if($end_of_the_exploded_json_file != 'json'){
    //             echo "File extension error. It must be a .json file.";
    //         } else {
    //             file_put_contents($json_filename, '[]');
    //             $json_file_decoded = json_decode(file_get_contents($json_filename), true);
    //             // INSERTION
    //             array_unshift($json_file_decoded, $data_to_be_inserted);
    //             $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
    //             return file_put_contents($json_filename, $json_file_encoded);
    //         }
    //     }
    // }

    // public static function jsonDelete($json_filename, $data_key_to_be_deleted, $data_value_to_be_deleted){
    //     if(file_exists($json_filename)){
    //         $check_if_the_file_extension_is_json = explode('.', $json_filename);
    //         $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
    //         if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
    //             echo "File extension error. It must be a .json file.";
    //         } else {
    //             $json_file_decoded = json_decode(file_get_contents($json_filename), true);
    //             foreach ($json_file_decoded as $key => $value) {
    //                 if($value[$data_key_to_be_deleted] === $data_value_to_be_deleted){
    //                     // DELETION
    //                     array_splice($json_file_decoded, $key, 1);
    //                     $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
    //                     return file_put_contents($json_filename, $json_file_encoded);
    //                 }
    //             }
    //         }
    //     } else {
    //         echo "File doesn't exists or filename extension error";
    //     }
    // }

    // public static function jsonUpdate($json_filename, $data_key_to_be_updated, $data_value_to_be_updated, $key_to_insert_new_updated_data, $new_updated_data){
    //     if(file_exists($json_filename)){
    //         $check_if_the_file_extension_is_json = explode('.', $json_filename);
    //         $end_of_the_exploded_json_file = strtolower(end($check_if_the_file_extension_is_json));
    //         if($end_of_the_exploded_json_file != 'json'){ // IF FILE EXTENSION IS NOT JSON
    //             echo "File extension error. It must be a .json file.";
    //         } else {
    //             $json_file_decoded = json_decode(file_get_contents($json_filename), true);
    //             foreach ($json_file_decoded as $key => $value) {
    //                 if($value[$data_key_to_be_updated] === $data_value_to_be_updated){
    //                     // UPDATION
    //                     $json_file_decoded[$key][$key_to_insert_new_updated_data] = $new_updated_data;
    //                     $json_file_encoded = json_encode($json_file_decoded, JSON_PRETTY_PRINT);
    //                     return file_put_contents($json_filename, $json_file_encoded);
    //                 }
    //             }
    //         }
    //     } else {
    //         echo "File doesn't exists or filename extension error";
    //     }
    // }

    // QRCODE ==========================================================================================================================================================

    // public static function generateQRCode($data)
    // {
    //     require 'vendor/autoload.php';
    //     return (new QRCode())->render($data);
    // }

    // BARCODE ==========================================================================================================================================================

    // public static function generateBarCode($data)
    // {
    //     require 'vendor/autoload.php';
    //     $generator = new BarcodeGeneratorHTML();
    //     return $generator->getBarcode($data, $generator::TYPE_CODE_128);
    // }

    // DATABASE ===========================================================================================================================================================

    // public static function dbConnect($host, $username, $password, $database)
    // {
    //     return mysqli_connect($host, $username, $password, $database);
    // }

    // public static function select($conn, $query)
    // {
    //     $queryResult = mysqli_query($conn, $query);
    //     $queryArray = [];

    //     while ($queryResult_ = mysqli_fetch_assoc($queryResult)) {
    //         array_push($queryArray, $queryResult_);
    //     }
    //     return $queryArray;
    // }

    // public static function query($conn, $query)
    // {
    //     return mysqli_query($conn, $query);
    // }
}
