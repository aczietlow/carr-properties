<?php
class imgUpload 
{
	var $directory = 'images/temp/';
	var $image;
	var $filename;
	var $ext;
	var $newWidth;
	var $newHeight;
	var $file;
	var $fileSizeLimit = 2000000;
	var $maxWidth = 800;
	var $edit = true;
	var $move = false;
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $file
	 * @param unknown_type $name
	 * @param unknown_type $move
	 * @param unknown_type $dir
	 */
	function upload($file, $name, $move=null, $dir=null)
	{
		
		$success=false;
		if(!isset($move))
		{
			$move = $this->move;
		}
		if(!isset($dir))
		{
			$dir = $this->directory;
		}
		
		//file name information
		$this->file=$file;
		$this->filename =strtolower(basename($this->file['name']));
		$this->ext = substr($this->filename, strrpos($this->filename, '.') + 1);
		$this->ext=".".$this->ext;
		$newname = $dir.$name.$this->ext;
		
		if($this->fileCheck())//is it a jpg and under the $fileSizeLimit
		{
			if($move==false)
			{
				$renamecheck = $dir.$name.$this->ext;//.jpg';
				$deletecheck = $dir.'Old_'.$name.$this->ext;//.jpg';
	
				if (file_exists($deletecheck))
				{
					unlink($deletecheck);//delets the old back up
				}
				if(file_exists($renamecheck))
				{
					rename($dir.$name.'.jpg', 'images/Old_'.$name.'.jpg');//renames current file to a back up file
				}
			}

			//Alert on successful upload, or unsuccessful.
			if ((move_uploaded_file($this->file['tmp_name'],$newname)))//moves the file from a temp dir to the sever
			{
				$this->image=$dir.$name.'.jpg';
				//echo $name.' uploaded successfully.';
				//echo "<br /> \n";
				$success=true;
			}
			else
			{
				$success=false;
				throw new Exception("Error: during file movement! ".$name." did not upload.");
				//echo "Error: during file movement! ".$name." did not upload. <br /> \n" ;
			}
		}
		else
		{	
			$success=false;
			$msg = $this->file["name"]." failed to upload, please upload a .jpg or .jpeg file less than 2MB. <br /> \n";
			throw new Exception($msg);
			//echo $this->file["name"]." failed to upload, please upload a .jpg or .jpeg file less than 2MB. <br /> \n";
		}
	}
	/**
	 * 
	 * verify that the file is a .jpg and under the fileSizeLimit
	 */
	private function fileCheck()
	{
		if (
		  (($this->ext == ".jpg")||($this->ext == ".JPG"))
		&& ($this->file["size"] < $this->fileSizeLimit)
		&&(($this->file["type"] == "image/jpeg")||($this->file["type"] == "image/jpg")))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	/**
	 * 
	 * Renames a folder
	 * @param unknown_type $dir1
	 * @param unknown_type $dir2
	 */
	function renameFolder($dir1, $dir2)
	{
		rename($dir1,$dir2);	
	}
	
	/**
	 * 
	 * Deletes a dir and all the files and dir inside of that dir
	 * @param unknown_type $dir
	 */
	function deleteMe($dir) 
	{
		if (is_dir($dir))
		{
			$objects = scandir($dir);
			foreach ($objects as $object)
			{
				if ($object != "." && $object != "..") 
				{
					if (filetype($dir."/".$object) == "dir")
					{ 
						deleteMe($dir."/".$object);
					}
					else
					{ 
						unlink($dir."/".$object);
					}
				}
			}
			reset($objects);
			rmdir($dir);
		}	
	}
// Move to another class/function.	
/*	
	function resizeImage()
	{

		$this->directory = $this->image;
		list($width, $height, $type, $attr) = getimagesize($this->image);


		if($width >$this->maxWidth)
		{
			$ratio =$this->maxWidth/$width;
			$this->newWidth = $width*$ratio;
			$this->newHeight = $height*$ratio;
		}
		else
		{
			$this->newWidth = null;
			$this->newHeight = null;
		}

	}
	
	
	function printBottom()
	{

		if(isset($this->newHeight) && isset( $this->newWidth))
		{
			echo '<img src= "'.$this->directory.'" width = "'.$this->newWidth.'" height="'.$this->newHeight.'"/>';echo "<br>\n";
		}
		else
		{
			echo '<img src= "'.$this->directory.'"/>' ;echo "<br>\n";
		}

		if($this->edit)
		{
			echo '<label>Upload New Image</label>';echo "\n";
			echo '<form enctype="multipart/form-data" method="post" action="'.$_SERVER["PHP_SELF"].'">';echo "\n";
			echo '<input name="uploaded_file" type="file" id="Browse" value="Select JPG image file:" />';echo "\n";
			echo '<input type="submit" name="Submit" id="Submit" value="Upload" />';echo "\n";
			echo '</form>';echo "\n";
			echo '<a href="images/Old_pic.jpg" target="_blank">Old Image</A>';echo "<br>";
			echo '<a href="images/pic.jpg" target="_blank">New Image </A>';echo "<br><br><br><br>\n";
		}
	}
	*/
}
?>