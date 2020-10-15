<?php

require 'C:/Users/Admin/vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Csv;

$xls_file = "try.xlsx";
$csv_file = "example.csv";

$reader = new Xlsx();
$spreadsheet = $reader->load($xls_file);

$loadedSheetNames = $spreadsheet->getSheetNames();

$writer = new Csv($spreadsheet);

foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
    $writer->setSheetIndex($sheetIndex);
    $writer->save($csv_file);
}

function array_to_xml( $data, &$xml_data) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = 'shop'.$key; //dealing with <0/>..<n/> issues
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key",htmlspecialchars("$value"));
        }
    }
}

function to_xml(SimpleXMLElement $object, array $data){

    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $key = "$key";
            $new_object = $object->addChild($key);
            to_xml($new_object, $value);
        }else {
            if (is_numeric($key)) {
                $key = "$value";
                unset($value);
            }
            $object->addChild($key,$value);
            }
    }
}


$arrkey = array('name','company','url','currencies'=>array('currency') ,'categories'=>array('category'),'delivery-options'=>
    array('option'),'offers'=>array('offer'=>array('name','url','price','currencyID','categoryID',
        'delivery','delivery-options','param','weight','dimension'),),'gifts','promos');


$dt = date("Y-m-d H:i");
/////////////
$xml_data = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><yml_catalog></yml_catalog>');
$xml_data->addAttribute('date',$dt);
/////////////

$xml = new SimpleXMLElement('<yml_catalog></yml_catalog>');
$xml->addAttribute('date',$dt);




$filename = "example.csv";

if (($handle = fopen($filename, "r")) !== FALSE) {
    if (($new = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if (($new = fgetcsv($handle, 1000, ",")) !== FALSE) {
            to_xml($xml,$arrkey);
            $result = $xml->asXML('test4.xml');
            fclose($handle);
        }
    }
}









/*
// function defination to convert array to xml
function array_to_xml($data, &$xml_data)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) {
                $key = 'item' . $key; //dealing with <0/>..<n/> issues
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key", htmlspecialchars("$value"));
        }
    }
}

// initializing or creating array

// creating object of SimpleXMLElement



// function call to convert array to xml
array_to_xml($data, $xml_data);

//saving generated xml file;
$result = $xml_data->asXML('test.xml');

*/














/*
require 'C:/Users/Admin/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');

*/