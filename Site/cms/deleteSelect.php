<?php 
//Html form for the User to select a file from the directory
//sends property->attributes()->uid to propertyPreview.php
?>

    <form action="propertyPreview.php"  method="post" name="input"> 
		<strong> Select Property to Preview/Delete: </strong>
		<br />
		<select name = "property"> 
			<?php
			$filename="properties.xml";
			//$filename="test.xml";
			$dom = simplexml_load_file($filename);
			foreach($dom->property as $p)
			{
				$uid=$p->attributes()->uid;
				echo("<option value=\"".$uid."\">".(string)$p->title."</option>");
				echo("\n <br \> \n");				
			}
			?>
		</select>
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="filename" value="<?php echo $filename ;?>">
		<input type="submit" value="Submit" />
	</form>
</div>