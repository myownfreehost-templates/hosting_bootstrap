<?php 
if (isset($_POST['Submit'])) {
$ftp_server = $ftp = $_POST['ftp'];
$ftp_user_name = $username = $_POST['username'];
$ftp_user_pass = $password = $_POST['password'];   


 if (!empty($_FILES['upload']['name'])) {
$ch = curl_init();

$file1 = $localfile = $_FILES['upload']['name'];
$fp = fopen($file1, 'r');

$file = '/htdocs/file.zip';
// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// try to upload $file
if (ftp_fput($conn_id, $file, $fp, FTP_ASCII)) {
    echo "Successfully uploaded ftp://".$username.":".$password."@".$ftp.$file."\n";

    $zip = new ZipArchive;
    $zip->open($file); 
    $zip->extractTo('ftp://'.$username.':'.$password.'@'.$ftp.'/htdocs'); 
    $zip->close();

} else {
    echo "There was a problem while uploading $file\n";
}

// close the connection and the file handler
ftp_close($conn_id);
fclose($fp);
 }  
}
?>
<center>
    <?php if(isset($error)){ echo $error; } ?>
</center>

