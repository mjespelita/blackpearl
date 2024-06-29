<?php

namespace Framework\BlackPearl;

class Math
{
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
}