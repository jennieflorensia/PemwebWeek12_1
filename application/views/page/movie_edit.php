<!DOCTYPE html>
<html>
<head>
	<title> Code Igniter MVC </title>
	<?php echo $style; ?>
</head>
<body>
	<?php echo $navbar; ?>
	<br/>
	<br/>
	<br/>
	<div class="container-fluid">
			<div style="border-bottom: 1px solid black;">
				<p style="text-align: center;"> 
					<font size="7" color="black"> Edit Movie </font>
					<font size="5" color="rgb(127,127,127)"> WebDB Cinemaks </font> 
				</p>
			</div>
	</div>
	<div class="container" style="margin-top: 35px;">
		<?php 
			foreach($data as $row){
				echo form_open_multipart('MoviePage/MovieEdit');
		?>
			<div class='form-group row'>
                    <label class='col-sm-3'>Movie ID</label>
                    <div class='col-sm-6'>
						<input class='form-control' type='text' name="id" value="<?php echo $row['MovieID']; ?>" readonly>
					</div>
			</div>
			<div class='form-group row'>
                    <label class='col-sm-3'>Title</label>
                    <div class='col-sm-6'>
						<input class='form-control' type='text' name="title" value="<?php echo $row['Title']; ?>">
						<?php echo form_error('title'); ?>
					</div>
			</div>
			<div class='form-group row'>
                    <label class='col-sm-3'>Year</label>
                    <div class='col-sm-3'>
						<input class='form-control' type='text' name="year" value="<?php echo $row['Year']; ?>">
						<?php echo form_error('year'); ?>
					</div>
			</div>
			<div class='form-group row'>
                    <label class='col-sm-3'>Director</label>
                    <div class='col-sm-6'>
						<input class='form-control' type='text' name="dir" value="<?php echo $row['Director']; ?>">
						<?php echo form_error('dir'); ?>
					</div>
			</div>
			<div class='form-group row'>
                    <label class='col-sm-3'>Poster</label>
                    <div class='col-sm-6'>
						<input class='form-control' type='file' name="poster">
						<?php echo form_error('poster'); ?>
					</div>
			</div>
			<input type="submit" class="btn btn-primary"/>
		<?php }?>
		<?php echo form_close(); ?>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>