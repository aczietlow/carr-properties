<?php
function createElement($domObj, $tag_name, $value = NULL, $attributes = NULL)
    {
    	$element = ($value != NULL ) ? $domObj->createElement($tag_name, $value) : $domObj->createElement($tag_name);
    
    	if( $attributes != NULL )
    	{
    		foreach ($attributes as $attr=>$val)
    		{
    			$element->setAttribute($attr, $val);
    		}
    	}
    
    	return $element;
    	/*
    	 	$dom = new DOMDocument('1.0', 'utf-8');
			
			$elm = createElement($dom, 'foo', 'bar', array('attr_name'=>'attr_value'));
			
			$dom->appendChild($elm);
			
			echo $dom->saveXML();
			
			outputs : 
			<?xml version="1.0" encoding="utf-8"?>
			<foo attr_name="attr_value">bar</foo>
    	 */
    }
	$filename="properties.xml";
	$doc=new DOMDocument('1.0', 'utf-8');
	$doc->load($filename);

	//createElement($domObj, $tag_name, $value = NULL, $attributes = NULL)
	$prop=new DOMDocument();
	$root=$prop->createElement('test');
	$prop->appendChild($root);
	$elm = createElement($prop, "property");



	echo "<pre><br />\nProp is:\n\n";

	echo($prop->saveXML());
	var_dump($elm);
	$prop->appendChild($elm);
	echo "</pre>";
	?>