<?php
if (isset($_POST['submit'])) {
    // Getting uploaded files 
    $uploadedFiles = $_FILES['files'];
    echo "<pre>";
    echo "<br><br>RAW array is : <br> <br>" ;
    print_r($uploadedFiles);

    // Fuction to re-organize the array 
    function reCreatefileArray($rawArray)
    {
        $numberOfFiles =  count($rawArray['tmp_name']);
        $reCreated = array();
        for ($i = 0; $i < $numberOfFiles; $i++) {
            $reCreated[$i] = array(
                'name' => $rawArray['name'][$i],
                'full_path' => $rawArray['full_path'][$i],
                'tmp_name' => $rawArray['tmp_name'][$i],
                'error' => $rawArray['error'][$i],
                'type' => $rawArray['type'][$i],
                'size' => $rawArray['size'][$i]
            );
        }

        return $reCreated;
    }

    echo "<br><br>Re-Organized array is : <br> <br>" ;
    $organizedAarray = (reCreatefileArray($uploadedFiles));
    print_r($organizedAarray) ;
    echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <p>Upload file here </p>
        <input type="file" name="files[]" id="img" multiple>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>