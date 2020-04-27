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
					<font size="7" color="black"> Add Movie </font>
					<font size="5" color="rgb(127,127,127)"> WebDB Cinemaks </font> 
				</p>
			</div>
	</div>
	<div class="container" style="margin-top: 35px;">
		<?php echo form_open_multipart(/* Something is missing ...*/); ?>
			<!-- Type your code here ... -->
		<?php echo form_close(); ?>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>