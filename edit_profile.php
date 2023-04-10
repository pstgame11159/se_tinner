<?php
    session_start();
    require_once 'connection/server.php';
	$name = $_SESSION['fullname'];
	$age = $_SESSION['age'];
	$sex = $_SESSION['sex'];
	$bio = $_SESSION['bio'];
?>



<!DOCTYPE html>
<html>
<head>
	<title>Tinner Profile Settings</title>
	<link rel="stylesheet" href="edit_profile.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<a href="index.php" class="link-primary">ย้อนกลับ</a>
		<h1>Tinder Profile Settings</h1>
		
		
		<form action="edit_profile_db.php" method = "post" enctype="multipart/form-data">
			<h2>Profile Information</h2>
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" value="<?php echo $name ?>">
				</div>
				
				<div class="form-group">
					<label for="age">Age:</label>
					<input type="number" id="age" name="age" value ="<?php echo $age ?>">
				</div>
				<div class="form-group">
					<label for="gender">Gender:</label>
					<select id="gender" name="gender">
						<option value="<?php echo $sex ?>"><?php echo $sex ?></option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="LGBT">LGBT</option>
					</select>
				</div>
				<div class="form-group">
					<label for="bio">Bio:</label>
					<textarea id="bio" name="bio"><?php echo $bio; ?></textarea><br>
				</div>
				<div class="form-group">
					<label for="photos">Photos:</label>
					<input type="file" id="photos" name="photos" multiple>
				</div>


			<center>
			<?php
					$i = 1;
					while($i<=6)
					{
						$username =  $_SESSION['username'];
						$file = 'upload_gallery/'.$username.'_'.$i.'.jpg';

				
			?>

			<div class="form-input">
				<label for="file-upload-<?php echo $i; ?>">Changes 1</label>
				<img id="preview-<?php echo $i; ?>" src="<?php echo $file; ?>"><br>
				<input type="file" name="profile-pic-<?php echo $i; ?>" id="file-upload-<?php echo $i; ?>" onchange="previewImage(<?php echo $i; ?>)">
			</div>

			<?php 
					$i++;
					}   
			?>
				<div class="form-group">
					<button type="submit" name="edit_profile"  class="btn btn-block btn-primary gradient-custom-4 text-black">Save</button>
				</div>
			</center>
		</form>

	</div>

</body>
</html>

<script>
  function previewImage(inputNumber) {
    const preview = document.getElementById(`preview-${inputNumber}`);
    const file = document.getElementById(`file-upload-${inputNumber}`).files[0];
    const reader = new FileReader();

    reader.onloadend = () => {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }

  
</script>