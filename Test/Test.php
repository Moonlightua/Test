<?php
error_reporting(-1);
require 'C:/Users/Admin/vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Csv;

$xls_file = "hello world.xlsx";
$csv_file = "example.csv";

$reader = new Xlsx();
$spreadsheet = $reader->load($xls_file);

$loadedSheetNames = $spreadsheet->getSheetNames();

$writer = new Csv($spreadsheet);

foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
    $writer->setSheetIndex($sheetIndex);
    $writer->save($csv_file);
}


$filename = $csv_file;

function replace_head(&$value)
{
    $value = preg_replace('/\s/','_',$value);

}
function replace_data(&$value)
{
    $value = preg_replace('/\s/','_',$value);
}
function array_to_xml( $data, &$xml_data,&$shop,&$name) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = 'shop'.$key; //dealing with <0/>..<n/> issues
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode,$shop,$name);
        } else {
            $shop->addChild("$key",htmlspecialchars("$value"));
        }
    }
}

$dt = date("Y-m-d H:i");
echo $dt;
$row=0;
$xml_data = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><yml_catalog></yml_catalog>');
$xml_data->addAttribute('date',$dt);
$shop = $xml_data->addChild('shop');



if (($handle = fopen($filename, "r")) !== FALSE) {
    if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $head = $data;
        array_walk($head, 'replace_head');
        print_r($head[1]);
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                array_walk($head, 'replace_data');
                $data = array_combine($head, $data);
                    for ($c = 0; $c < $num / $num; $c++) {
                        array_to_xml($data, $xml_data,$shop,$name);
                        $result = $xml_data->asXML('test.xml');
                }
            }
            fclose($handle);
        }
}




/*
   foreach ($arr as $row) {
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$country</td>";
            echo "<td>$age</td>";
            echo "<td>$gender</td>";
            echo "</tr>";
        }

$data = array_map("utf8_encode", $data);

 echo "<pre>";
        print_r ($data);
        echo "</pre>";
for ($c = 0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }

function customfgetcsv(&$handle, $length, $separator =','){
    if (($buffer = fgets($handle, $length)) !== false) {
        return explode($separator, iconv("CP1251", "UTF-8", $buffer));
    }
    return false;
}

list($name, $country, $age, $gender) = explode(";", $data);

echo "<p> $num полей в строке $row: <br /></p>\n";

  $keys = array('name', 'country', 'age', 'gender');
            $new = array_fill_keys($keys, $data);

            $name = $data['0'];
            $country = $data['1'];
            $age = $data['2'];
            $gender = $data['3'];

            foreach ($arr as $k) {
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$country</td>";
                echo "<td>$age</td>";
                echo "<td>$gender</td>";
                echo "</tr>";
            }
            */