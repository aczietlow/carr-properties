<?php
$xmlstr = <<<XML
<Start>
</Start>
XML;
$xml = new SimpleXMLElement($xmlstr);
$xml->asXML("plsWork.xml");
?>