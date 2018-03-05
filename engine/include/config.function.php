<?php

function xml_as_array ( $xmlObject, $out = array () ) {
    foreach ( (array) $xmlObject as $index => $node )
        $out[$index] = ( is_object ( $node ) ) ? xml_as_array ( $node ) : $node;

    return $out;
}

function getConfig($in_array = false) {
	$cfg = simplexml_load_file(CONFIG_PATH);
	if ($in_array) $cfg = xml_as_array($cfg);

	return $cfg;
}

?>