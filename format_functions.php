<?php

function dassify($arr1, $arr2, $str) {
    $new_headers = [];
    $new_values = [];
    $final_arr = [];

    for($i = 0; $i < count($arr1); $i++) {
        //change subject_id to record_id and move to index 0
        // echo $arr1[$i].':'.$arr2[$i];
        // echo '<br>';
        if($arr1[$i] === 'subject_id') {
            $val = $arr2[$i];            
            // unset($arr1[$i]);
            // unset($arr2[$i]);
            array_unshift($new_headers, 'record_id');
            array_unshift($new_values, $val);
        //add '_dass21' to test_date, test_time, birth_date
        } else if (($arr1[$i] === "test_date") || ($arr1[$i] === "test_time") || ($arr1[$i] === "birth_date")) {
            array_push($new_headers, $arr1[$i].='_dass21');
            array_push($new_values, $arr2[$i]);
        } else {
            array_push($new_headers, $arr1[$i]);
            array_push($new_values, $arr2[$i]);
        }   
    }

    //delete signature
    unset($new_headers[4]);
    unset($new_values[4]);
    //insert 'redcap_event_name' column
    array_splice($new_headers, 1, 0, 'redcap_event_name');
    array_splice($new_values, 1, 0, $str);
    //change True/False values to 1,0
    for($i = 0; $i < count($new_values); $i++) {
        if($new_values[$i] === 'true') {
        $new_values[$i] = '1';
        } else if($new_values[$i] === 'false') {
        $new_values[$i] = '0';
        } else if($new_values[$i] === 'NA') {
        $new_values[$i] = '';
        }
    }
    //add cns_vs_cognitive_tests_complete = "1" to headers and values
    array_push($new_headers, 'cns_vs_dass21_complete');
    array_push($new_values, '1');
    //final arr for writing
    // array_push($final_arr, $new_headers, $new_values);
    for($i = 0; $i < count($new_headers); $i++) {
        // echo $new_headers[$i].':'.$new_values[$i];
        // echo '<br>';
        $final_arr[$new_headers[$i]] = $new_values[$i];
    }
    // var_dump($final_arr);
    return $final_arr;
}

function pclify($arr1, $arr2, $str) {
    $new_headers = [];
    $new_values = [];
    $final_arr = [];



    for($i = 0; $i < count($arr1); $i++) {
        //change subject_id to record_id and move to index 0
        // echo $arr1[$i].':'.$arr2[$i];
        // echo '<br>';
        if($arr1[$i] === 'subject_id') {
            $val = $arr2[$i];            
            // unset($arr1[$i]);
            // unset($arr2[$i]);
            array_unshift($new_headers, 'record_id');
            array_unshift($new_values, $val);
        //add '_dass21' to test_date, test_time, birth_date
        } else if (($arr1[$i] === "test_date") || ($arr1[$i] === "test_time") || ($arr1[$i] === "birth_date")) {
            array_push($new_headers, $arr1[$i].='_pcl');
            array_push($new_values, $arr2[$i]);
        } else {
            array_push($new_headers, $arr1[$i]);
            array_push($new_values, $arr2[$i]);
        }   
    }

    //delete signature
    unset($new_headers[4]);
    unset($new_values[4]);
    //insert 'redcap_event_name' column
    array_splice($new_headers, 1, 0, 'redcap_event_name');
    array_splice($new_values, 1, 0, $str);
    //change True/False values to 1,0 & 'N/A' to blank space
    for($i = 0; $i < count($new_values); $i++) {
        if($new_values[$i] === 'true') {
            $new_values[$i] = '1';
        } else if($new_values[$i] === 'false') {
            $new_values[$i] = '0';
        } else if($new_values[$i] === 'NA') {
            $new_values[$i] = '';
        }
    }
    //add cns_vs_cognitive_tests_complete = "1" to headers and values
    array_push($new_headers, 'cns_vs_pcl5_complete');
    array_push($new_values, '1');
    //final arr for writing
    // array_push($final_arr, $new_headers, $new_values);
    for($i = 0; $i < count($new_headers); $i++) {
        // echo $new_headers[$i].':'.$new_values[$i];
        // echo '<br>';
        $final_arr[$new_headers[$i]] = $new_values[$i];
    }
    // var_dump($final_arr);
    return $final_arr;
};

function cogify($arr1, $arr2, $str) {
    $new_headers = [];
    $new_values = [];
    $final_arr = [];


    for($i = 0; $i < count($arr1); $i++) {
        //change subject_id to record_id and move to index 0
        if($arr1[$i] === 'subject_id') {
            $val = $arr2[$i];            
            // unset($arr1[$i]);
            // unset($arr2[$i]);
            array_unshift($new_headers, 'record_id');
            array_unshift($new_values, $val);
        //add '_cog' to test_date, test_time, birth_date
        } else if (($arr1[$i] === "test_date") || ($arr1[$i] === "test_time") || ($arr1[$i] === "birth_date")) {
            array_push($new_headers, $arr1[$i].='_cog');
            array_push($new_values, $arr2[$i]);
        } else {
            array_push($new_headers, $arr1[$i]);
            array_push($new_values, $arr2[$i]);
        }   
    }

    //delete signature
    unset($new_headers[4]);
    unset($new_values[4]);
    //insert 'redcap_event_name' column
    array_splice($new_headers, 1, 0, 'redcap_event_name');
    array_splice($new_values, 1, 0, $str);
    //change True/False values to 1,0
    for($i = 0; $i < count($new_values); $i++) {
        if($new_values[$i] === 'true') {
        $new_values[$i] = '1';
        } else if($new_values[$i] === 'false') {
        $new_values[$i] = '0';
        } else if($new_values[$i] === 'NA') {
        $new_values[$i] = '';
        }
    }
    // echo '<br>';
    // echo count($new_values);
    //remove variables '_dtt' and their data
    for($i = 0; $i < count($new_headers); $i++) {
        // echo $new_headers[$i].':'.$new_values[$i];
        // echo '<br>';
        if(preg_match('/(dtt_)/', $new_headers[$i])) {
        // echo $new_headers[$i].':'.$new_values[$i];
        // echo '<br>';
        // unset($new_headers[$i]);
        // unset($new_values[$i]);
        
        array_splice($new_headers, $i);
        array_splice($new_values, $i);

        }

    }
    // echo count($new_headers);
    // echo '<br>';
    // echo count($new_values);
    // print_r($new_headers);

    // var_dump($new_headers);
    //add cns_vs_cognitive_tests_complete = "1" to headers and values
    array_push($new_headers, 'cns_vs_cognitive_tests_complete');
    array_push($new_values, '1');

    // for($i = 0; $i < count($new_headers); $i++) {
    //     echo $new_headers[$i].':'.$new_values[$i];
    //     echo '<br>';
    // }
    //final arr for writing
    // array_push($final_arr, $new_headers, $new_values);
    for($i = 0; $i < count($new_headers); $i++) {
        // echo $new_headers[$i].':'.$new_values[$i];
        // echo '<br>';
        $final_arr[$new_headers[$i]] = $new_values[$i];
    }
    // var_dump($final_arr);
    return $final_arr;
}

function event_format($str) {
    $lc_str = strtolower($str);
    $final_str = str_replace(" ", "_", $lc_str);
    return $final_str;
}