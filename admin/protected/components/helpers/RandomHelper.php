<?php

class RandomHelper {
    
    public static function getChopedPdfString( $string ) {
        
        $arrData = explode('_', $string);
        $arrData = implode(' ', array_splice($arrData,1));
        return $arrData;
    }

}
?>