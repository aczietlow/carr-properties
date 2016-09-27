<form action="edit.php"  method="post" name="input"> 
		<strong> Select Property to Edit: </strong>
		<br />
		<select name = "uid"> 
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
		<input type="hidden" name="action" value="edit" />
		<input type="hidden" name="filename" value="<?php echo $filename ;?>">
		<input type="submit" value="Submit" />
	</form>