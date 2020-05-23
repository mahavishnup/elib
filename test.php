// // Count total files
				// $countfiles = count($_FILES['ifile']['name']);
			   
				// // Looping all files
				// for($i=0;$i<$countfiles;$i++){
				// 	$target_dir="img/";
				// 	$target_file1=$target_dir.basename($_FILES['ifile']['name'][$i]);
				//  // Upload file
				//  move_uploaded_file($_FILES['ifile']['tmp_name'][$i],$target_file1);
				
				// }
			 
			//  // Count total files
			//  $countfiles = count($_FILES['efile']['name']);
			
			//  // Looping all files
			//  for($i=0;$i<$countfiles;$i++){	 
			// 	$target_dir="upload/";

				// $target_file1 ="";
				// $uploads_dir="img/";
				// foreach ($_FILES["ifile"]["error"] as $key => $error) {
				// 	if ($error == UPLOAD_ERR_OK) {
				// 		$tmp_name = $_FILES["ifile"]["tmp_name"][$key];
				// 		$name = $_FILES["ifile"]["name"][$key];
				// 		move_uploaded_file($tmp_name, "$uploads_dir/$name");
				// 		$target_file1 =$name.",".$target_file1;
				// 	}
				// }


				// $target_file ="";
				// $uploads_dir="upload/";
				// foreach ($_FILES["efile"]["error"] as $key => $error) {
				// 	if ($error == UPLOAD_ERR_OK) {
				// 		$tmp_name = $_FILES["efile"]["tmp_name"][$key];
				// 		$name = $_FILES["efile"]["name"][$key];
				// 		move_uploaded_file($tmp_name, "$uploads_dir/$name");
				// 		$target_file =$name.",".$target_file;
				// 	}
				// }
			
				// $sql=mysql_query("INSERT INTO multiimg(image) values('".$images_name."')");
				
			// 	$target_file=$target_dir.basename($_FILES['efile']['name'][$i]);
			//   // Upload file
			//   move_uploaded_file($_FILES['efile']['tmp_name'][$i],$target_file);
			 
			//  }

//  if(isset($_POST['mailSend'])){
// 	$statement = $db->prepare("SHOW TABLE STATUS LIKE 'mail'");
// 	$statement->execute();
// 	$result = $statement->fetchAll();
// 		foreach($result as $row)
// 			$new_id = $row[10]; //10 fixed
// 	$i=0;	
// 	foreach ($_FILES['attached']['name'] as $up_filename) {
// 		$i++;
// 			//$up_filename=$_FILES["attached"]["name"];
// 		$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
// 		$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
// 		$f1 = $new_id .'-'.[$i]. $file_ext;
            
// 		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
// 			throw new Exception("Only jpg, jpeg, png and gif format images are allowed to upload.");
            
// 			move_uploaded_file($_FILES["attached"]["tmp_name"],"../uploads/mail/" . $f1);
// 		// End attached file
// 		}
// 			$statement = $db->prepare("INSERT INTO mail (orderNo,attached) VALUES (?,?)");
// 			$statement->execute(array($_POST['orderNo'],$f1));
// 	}

<?php 
// if(isset($_POST['submit1'])){
 
// 	// Count total files
// 	$countfiles = count($_FILES['ifile']['name']);
   
// 	// Looping all files
// 	for($i=0;$i<$countfiles;$i++){
// 		$target_dir="img/";
// 	echo $filename =$target_dir.basename($_FILES['ifile']['name'][$i]);
// 	 // Upload file
// 	 move_uploaded_file($_FILES['ifile']['tmp_name'][$i],$filename);
	
// 	}
 
//  // Count total files
//  $countfiles = count($_FILES['efile']['name']);

//  // Looping all files
//  for($i=0;$i<$countfiles;$i++){	 
// 	$target_dir="upload/";
//  echo $filename =$target_dir.basename($_FILES['efile']['name'][$i]);  
//   // Upload file
//   move_uploaded_file($_FILES['efile']['tmp_name'][$i],$filename);
 
//  }
// } 
?>
<!-- <form method='post' action='' enctype='multipart/form-data'>
 <input type="file" name="ifile[]" id="file" multiple>
 <input type="file" name="efile[]" id="file" multiple>

 <input type='submit' name='submit1' value='Upload'>
</form> -->
<!-- <form id="" method="POST" action=""  enctype="multipart/form-data">
        <input type="text" name="orderNo">
	<input id="file-0" class="file" type="file" name="attached[]" multiple>
	<button class="btn btn-success " type="submit"  name="mailSend" >Send Mail</button>				
</form> -->
<?php
class Upload_Rename {
const ALLOWED_TYPES = "jpg,gif,png";
public static function generate_new_name($extension, $uppercase = true, $prefix = '', $sufix = '') {
$new_name = $prefix . uniqid() . '_' . time() . $sufix;
return ($uppercase ? strtoupper($new_name) : $new_name) . '.' . $extension;
}

public static function check_and_get_extension($file) {
$file_part = pathinfo($file);
$allowed_types = explode(",", Upload_Rename::ALLOWED_TYPES);
if (!in_array($file_part['extension'], $allowed_types)) {
    throw new Exception('Not ok.. bad bad file type.');
}
return $file_part['extension'];
}

public function upload($file, $target_destination) {
if (!isset($file['tmp_name'])) {
    throw new Exception('Whaaaat?');
}
$_name = $file['name'];
$_tmp = $file['tmp_name'];
$_type = $file['type'];
$_size = $file['size'];
$file_extension = '';
try {
    $file_extension = Upload_Rename::check_and_get_extension($_name);
} catch (Exception $e) {
    throw new Exception('Ops.. file extension? what? ' . $e->getMessage());
}
$new_name = Upload_Rename::generate_new_name($file_extension, true, 'whaat_', '_okey');
$destination = $target_destination . DIRECTORY_SEPARATOR . $new_name;
move_uploaded_file($_tmp, $destination);
return $destination;
}

public function multiple_files($files, $destination) {
$number_of_files = isset($files['tmp_name']) ? sizeof($files['tmp_name']) : 0;
$errors = array();
$paths=array();
for ($i = 0; $i < $number_of_files; $i++) {
    if (isset($files['tmp_name'][$i]) && !empty($files['tmp_name'][$i])) {
        try {
            $path=$this->upload(array(
                'name' => $files['name'][$i],
                'tmp_name' => $files['tmp_name'][$i],
                'size' => $files['size'][$i],
                'type' => $files['type'][$i]
                    ), $destination);
             $paths[]=$path;
        } catch (Exception $e) {
            array_push($errors, array('file' => $files['name'][$i], 'error' => $e->getMessage()));
        }
    }
}
return $paths;
}

}

if ($_FILES) {
$upload = new Upload_Rename();
$destination = 'upload';
$paths=$upload->multiple_files($_FILES['myfile'], $destination);

//Fill this with correct information
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "e-library";
$tbl_name="test";
$pathfield_name='path';
//
$mysql= new mysqli($mysql_hostname,$mysql_user,$mysql_password,$mysql_database);
foreach($paths as $path){
$query='INSERT INTO `'.$tbl_name.'` (`'.$pathfield_name.'`) VALUES ("'.$mysql->escape_string($path).'");';
$mysql->query($query);}
$mysql->close();
}
?>

<form  method="post" enctype="multipart/form-data">
<?php for ($i = 0; $i < 10; $i++): ?>
file: <input type="file" name="myfile[]"><br>
<?php endfor; ?>
<input type="submit">
</form>

CREATE TABLE IF NOT EXISTS `test` (
`path` text(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

<div class="popup" id="popup">
            <div class="popup__content">
                <div class="popup__left">
                    <img src="img/nat-8.jpg" alt="Tour photo" class="popup__img">
                    <img src="img/nat-9.jpg" alt="Tour photo" class="popup__img">
                </div>
                <div class="popup__right">
                    <a href="#section-tours" class="popup__close">&times;</a>
                    <h2 class="heading-secondary u-margin-bottom-small">Start booking now</h2>
                    <h3 class="heading-tertiary u-margin-bottom-small">Important &ndash; Please read these terms before booking</h3>
                    <p class="popup__text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Sed sed risus pretium quam. Aliquam sem et tortor consequat id. Volutpat odio facilisis mauris sit
                        amet massa vitae. Mi bibendum neque egestas congue. Placerat orci nulla pellentesque dignissim enim
                        sit. Vitae semper quis lectus nulla at volutpat diam ut venenatis. Malesuada pellentesque elit eget
                        gravida cum sociis natoque penatibus et. Proin fermentum leo vel orci porta non pulvinar neque laoreet.
                        Gravida neque convallis a cras semper. Molestie at elementum eu facilisis sed odio morbi quis. Faucibus
                        vitae aliquet nec ullamcorper sit amet risus nullam eget. Nam libero justo laoreet sit. Amet massa
                        vitae tortor condimentum lacinia quis vel eros donec. Sit amet facilisis magna etiam. Imperdiet sed
                        euismod nisi porta.
                    </p>
                    <a href="#" class="btn btn--green">Book now</a>
                </div>
            </div>
        </div>
