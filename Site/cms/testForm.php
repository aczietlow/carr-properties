<?php
//include the main validation script
require_once "formvalidator.php";

$show_form=true;
var_dump($_POST);
if(isset($_POST["Preview New Property"]))
{// The form is submitted

    //Setup Validations
    $validator = new FormValidator();
    $validator->addValidation("zip","req","Please fill in Name");
    //Now, validate the form
    if($validator->ValidateForm())
    {
        //Validation success. 
        //Here we can proceed with processing the form 
        //(like sending email, saving to Database etc)
        // In this example, we just display a message
        echo "<h2>Validation Success!</h2>";
        $show_form=false;
    }
    else
    {
        echo "<B>Validation Errors:</B>";

        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
            echo "<p>$inpname : $inp_err</p>\n";
        }        
    }//else
}//if(isset($_POST['Submit']))

if(true == $show_form)
{
?>
<h1> List a new property</h1>
<!-- formt to get all the property's attribute information from the authenicated users. 
	sends information via post method
 -->
 <form name="inputProperty" enctype="multipart/form-data" action="<?php echo $PHP_SELF; ?>" method="post">
<!--
<form name="inputProperty" enctype="multipart/form-data" action="propertyPreview.php" method="post">
-->
<p>
Type
<select name="type" name="type">
<option value="Commercial">Commercial</option>
<option value="Other"> Other </option>
</select>
</p>
<!-- <input type="text" name="type" value="Commercial" /><br /> -->
Street Address<br /><input name="street" type="text" name="street" /><br />
City<br /><input name="city" type="text" name="city"  /><br />
State<br />
<select name = "state"> 
<option value="GA"> GA </option>
<option value="SC"> NC </option>
<option value="SC"> SC </option>
</select><br />
<!--  State<br /><input type="text" name="state"  /><br /> -->
Zip Code<br /><input name="zip" type="text" name="zip"  /><br />
Title<br /><input id ="title" type="text" name="title"  /><br />
Price Per Month<br /><input name="ppm" type="text" name="perMonth" /><br />
Price Per Sq. Ft.<br /><input name="ppsf" type="text" name="perSqFt" /><br />

<input type="hidden" name="action" value="add" />
<input type="submit" name='Submit' value="Preview New Property" />

</form>
<?php 
}
?>
