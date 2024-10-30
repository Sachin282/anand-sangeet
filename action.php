<?php
// var_dump($_POST);
// echo "<br><br><br>";
$conn = mysqli_connect('localhost','sysgener_anand_sangeet','Sachin@282','sysgener_anand_sangeet');

if(isset($_POST['section']) && !empty($_POST['section'])){
	if($_POST['section'] == '5'){

		$sql = 'select * from content where section = '.$_POST['section'];
		$section = mysqli_query($conn,$sql);
		foreach ($_POST['g'] as $key => $value) {
			print_r('<br>');
			var_dump('key => '.$key.'  |  value : '.$value);
		}

		print_r('<br><br>');
		if(isset($_FILES['new_image'])){

			print_r(isset($_FILES['new_image']));
			foreach ($_FILES['new_image'] as $key => $value) {
				print_r('<br>');
				var_dump('key => '.$key.'  |  value : '.var_dump($value));
			}
		}
		print_r('<br><br>');
		var_dump($_POST);
	}
	else{

		$sql = 'select * from content where section = '.$_POST['section'];
		if(isset($_POST['device'])){
			$sql .= ' and device = '.$_POST['device'];
		}
		$sql .= ' order by position asc';
		print_r('<br> Sql : '. $sql.'<br>');
		$section = mysqli_query($conn,$sql);

		foreach ($section as $sect) {
		$v =  "section".$sect['section'].$sect['position'];
				print_r('<br>'.$v.'<br>');
				var_dump($sect);
			if($sect['type'] == 'image'){
				print_r("<br><br><br> in type : image <br><br><br>");
				if(!empty($_FILES[$v]['name'])){
					uploadFile($v,$sect['section'],$sect['position']);
				}
				
			}
			else{
				$sql = "update content set value = '".$_POST[$v]."' where section = '".$sect['section']."' and position = '".$sect['position']."'";
				mysqli_query($conn,$sql);
			}
		}
	}

		// foreach ($_POST as $key => $value) {
		// 	echo 'key : '.$key.' value : '.$value.'<br>';
		// }
	// }
}
// foreach ($_POST['section'] as $key => $value) {
// 			echo 'key : '.$key.' value : '.$value.'<br><br>-----------------------------------------------------<br><br>';

// 		}


function uploadFile($name,$section,$position){
	echo "<br><br><br> Image Section : ".$section.$position."<br><br><br>";
	$conn = mysqli_connect('localhost','sysgener_anand_sangeet','Sachin@282','sysgener_anand_sangeet');
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES[$name]["name"]);
echo '<br><br>'.$target_file.'<br><br>';
	$uploadOk = 0;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	    if(getimagesize($_FILES[$name]["tmp_name"]) == false) {
	        echo "File is not an image.";
	        return 0;
	    }
	// Check if file already exists
	if (file_exists($target_file)) {
	    $sql = "update content set value = '".$target_file."' where section = '".$section."' and position = '".$position."'";
	    mysqli_query($conn, $sql);
	    echo "file already exists";
	    return 1;
	}
	// Check file size
	// if ($_FILES[$name]["size"] > 500000) {
	//     echo "Sorry, your file is too large.";
	//     return 0;
	// }
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    return 0;
	}
	
	    if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
	    	echo $target_file;
	        echo "The file ". basename( $_FILES[$name]["name"]). " has been uploaded.";
	        $sql = "update content set value = '".$target_file."' where section = '".$section."' and position = '".$position."'";
	        mysqli_query($conn, $sql);
	    	echo $sql;
	        return 1;
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	        return 0;
	    }
}

// die();