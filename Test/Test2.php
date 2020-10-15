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

$dt = date("Y-m-d H:i");
$dom = new DOMDocument("1.0","utf-8");
$yml = $dom->createElement("yml_catalog");
$date = $dom->createAttribute("date");
$date->value=$dt;
$yml->appendChild($date);
$dom->appendChild($yml);
$shop = $dom->createElement("shop");
$yml->appendChild($shop);
////////

$nShop = 'Name of Shop';
$nComp = 'Name of Company';
$urlCompa = 'www.shopurl.net';
$catName = 'Товары для детей';

//////// Attributes ! ! !
///
$cur = $dom->createAttribute('id');
$cur->value="UAH";
$cur2 = $dom->createAttribute('rate');
$cur2->value="1";
$cat = $dom->createAttribute('id');
$cat->value="1";
$cat2 = $dom->createAttribute('id');
$cat2->value="10";
$cat22 = $dom->createAttribute('parentId');
$cat22->value="1";
$optin =  $dom->createAttribute('cost');
$optin->value="Pre-payment";
$optin2 =  $dom->createAttribute('days');
$optin2->value="2";
$off =  $dom->createAttribute('id');
$off->value = random_int(1000,9999);

$nameComp = $dom->createElement("name",$nShop);
$company = $dom->createElement("company",$nComp);
$urlComp = $dom->createElement("url",$urlCompa);
$currencies = $dom->createElement("currencies");
$currency = $dom->createElement("currency");
$categories = $dom->createElement("categories");
$category =  $dom->createElement("category",$catName);
$deliveryOptions =  $dom->createElement("delivery-options");
$option =  $dom->createElement("option");
$offers =  $dom->createElement("offers");
$offer =  $dom->createElement("offer");


$optionOff1 = $dom->createAttribute('cost');
$optionOff2 = $dom->createAttribute('days');
$optionOff3 = $dom->createAttribute('order-before');
$optionOff1->value="300";
$optionOff2->value="1";
$optionOff3->value="15";

$par = $dom->createAttribute('name');
$par->value = "Цвет";
//////// Elements ! ! !





$curId = "UAH";
$catId = "1";
$delivery =  $dom->createElement("delivery","true");
$delOpt =  $dom->createElement("delivery-options");
$opt =  $dom->createElement("option");
$currencyId =  $dom->createElement("currencyId",$curId);
$categoryId =  $dom->createElement("categoryId",$catId);
$gifts =  $dom->createElement("gifts");
$promos =  $dom->createElement("promos");

$name =  $dom->createElement("name",$itemName);
$url =  $dom->createElement("url",$itemUrl);
$price =  $dom->createElement("price",$itemPrice);
$param =  $dom->createElement("param",$itemParam);
$weight =  $dom->createElement("weight",$itemWeight);
$dimension =  $dom->createElement("dimension",$itemDimension);



$shop->appendChild($nameComp);
$shop->appendChild($company);
$shop->appendChild($urlComp);
$shop->appendChild($currencies);
$currencies->appendChild($currency);
$categories->appendChild($category);
$shop->appendChild($categories);
$shop->appendChild($deliveryOptions);
$deliveryOptions->appendChild($option);
$shop->appendChild($offers);
$shop->appendChild($gifts);
$shop->appendChild($promos);
$offers->appendChild($offer);

////////
$currency->appendChild($cur);
$currency->appendChild($cur2);
$category->appendChild($cat);
$option->appendChild($optin);
$option->appendChild($optin2);
$offer->appendChild($off);
$opt->appendChild($optionOff1);
$opt->appendChild($optionOff2);
$opt->appendChild($optionOff3);
$param->appendChild($par);
$filename = "example.csv";


$row = 1;
if (($handle = fopen($filename, "r")) !== FALSE) {
        if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            ++$row;
                    for($c=0; $c<$num/$num;$c++){

                        $itemName = $data[1];
                        $itemUrl = $data[6];
                        $itemPrice = $data[7];
                        $itemParam = $data[3];
                        $itemWeight = $data[17];
                        $itemDimension = $data[5];


                        $offers->appendChild($offer);
                        $offer->appendChild($name);
                        $offer->appendChild($url);
                        $offer->appendChild($price);
                        $offer->appendChild($currencyId);
                        $offer->appendChild($categoryId);
                        $offer->appendChild($delivery);
                        $offer->appendChild($delOpt);
                        $offer->appendChild($opt);
                        $offer->appendChild($param);
                        $offer->appendChild($weight);
                        $offer->appendChild($dimension);

                        $currency->appendChild($cur);
                        $currency->appendChild($cur2);
                        $category->appendChild($cat);
                        $option->appendChild($optin);
                        $option->appendChild($optin2);
                        $offer->appendChild($off);
                        $opt->appendChild($optionOff1);
                        $opt->appendChild($optionOff2);
                        $opt->appendChild($optionOff3);
                        $param->appendChild($par);
                        $curId = "UAH";
                        $catId = "1";
                        $delivery =  $dom->createElement("delivery","true");
                        $delOpt =  $dom->createElement("delivery-options");
                        $opt =  $dom->createElement("option");
                        $currencyId =  $dom->createElement("currencyId",$curId);
                        $categoryId =  $dom->createElement("categoryId",$catId);
                        $gifts =  $dom->createElement("gifts");
                        $promos =  $dom->createElement("promos");

                        $name =  $dom->createElement("name",$itemName);
                        $url =  $dom->createElement("url",$itemUrl);
                        $price =  $dom->createElement("price",$itemPrice);
                        $param =  $dom->createElement("param",$itemParam);
                        $weight =  $dom->createElement("weight",$itemWeight);
                        $dimension =  $dom->createElement("dimension",$itemDimension);



                        $off =  $dom->createAttribute('id');
                        $off->value = random_int(1000,9999);

                        $optionOff1 = $dom->createAttribute('cost');
                        $optionOff2 = $dom->createAttribute('days');
                        $optionOff3 = $dom->createAttribute('order-before');
                        $optionOff1->value="300";
                        $optionOff2->value="1";
                        $optionOff3->value="15";

                        $offer =  $dom->createElement("offer");

                        $par = $dom->createAttribute('name');
                        $par->value = "Цвет";




                    }
            }
        }
        fclose($handle);
}


/////////// Childs ! ! !
///

////////
///



$dom->save('test5.xml');