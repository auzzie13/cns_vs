<?php
    include 'format_functions.php';


    
    if(filter_has_var(INPUT_POST, 'submit')) {
        $event = event_format(htmlspecialchars($_POST['event']));
        $file = $_FILES['myfile'];
        $radio_val = $_POST['radio'];

        if(!empty($event) && !empty($file) && !empty($radio_val)) {
            $file_name = $file['name'];
            $file_size = $file['size'];
            $tmp_name = $file['tmp_name'];
            // var_dump($file);
            $file_data = file_get_contents($tmp_name, true);
            $lines = explode("\n", $file_data);

            $raw_headers = explode("\t", $lines[0]);
            $raw_values = explode("\t", $lines[1]);

            $headers = str_replace("\r", '', $raw_headers);
            $values = str_replace("\r", '', $raw_values);

            // for($i = 0; $i < count($headers); $i++) {
            //     echo $headers[$i].':'.$values[$i];
            //     echo '<br>';
            // }

            // $new_data = '';
            if($radio_val === 'dass') {
                $new_data = dassify($headers, $values, $event);
            } else if($radio_val === 'cog') {
                $new_data = cogify($headers, $values, $event);
            } else if($radio_val === 'pcl') {
                $new_data = pclify($headers, $values, $event);
            }
            // var_dump($new_data);

            $json_data = '['.json_encode($new_data).']';
            // echo $json_data;

            // write data to csv file
            // $upload_file_name = str_replace(".txt", "_", $file_name);
            // $csv_file_name = $upload_file_name.$file_size.'.csv';
            // // echo $csv_file_name;
            // $fp = fopen($csv_file_name, 'w');
            // foreach($new_data as $fields) {
            //     fputcsv($fp, $fields);
            // }
            // fclose($fp);
            
     // Hit REDcap API - Import Record
        include 'api.php';

  

            
        } else {
            echo 'Make sure all information has been entered.';
        }
    };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNS VS</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" style="width: 40%; margin-left: auto; margin-right: auto; background-color: #8b8f6c; display: flex; flex-direction: column; align-items: center; border-radius: 10px;">
    <h1 style="color: #e0e4cd;">CNS VS UPLOADER</h1>
    
    <div style="display: flex; flex-direction: row; justify-content: space-around; color: #e0e4cd; margin: 10px;">
    
    <input type="radio" id="dass" name="radio" value="dass" <?php if(isset($_POST['radio'])) {if($_POST['radio'] == "dass") { echo "checked=\"checked\""; }} ?>>
    <label for="dass">DASS</label>

  
    <input type="radio" id="cog" name="radio" value="cog" <?php if(isset($_POST['radio'])) {if($_POST['radio'] == "cog") { echo "checked=\"checked\""; }} ?>>
    <label for="cog">COG</label>

    <input type="radio" id="pcl" name="radio" value="pcl" <?php if(isset($_POST['radio'])) {if($_POST['radio'] == "pcl") { echo "checked=\"checked\""; }} ?>>
    <label for="cog">PCL</label>

    </div>
    
    <div style="display: flex; flex-direction: column;">
    <input style="margin: 10px;" type="file" id="myfile" name="myfile">
    <input style="margin: 10px;" type="text" id="event" name="event" placeholder="REDCap Event Name" value="<?php if(isset($_POST['event'])) { echo $_POST['event'];} ?>">
    <!-- <input style="margin: 10px;" type="text" id="token" name="token" placeholder="API 32-digit Token" value="<?php if(isset($_POST['token'])) { echo $_POST['token'];} ?>"> -->
    </div>
    <button id="btn" name="submit" style="margin: 10px;">Submit</button>
    </form>

    <!-- <script src="script.js"></script> -->
</body>
</html>


