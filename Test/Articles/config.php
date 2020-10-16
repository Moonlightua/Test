<?php
error_reporting(0);
const HOST_NAME = 'localhost';
const USER_NAME = 'root';
const PASS = '4321';
const DB_NAME = 'articles';
const PORT = '33061';

$link = mysqli_connect(HOST_NAME,USER_NAME,PASS,DB_NAME,PORT);

global $link;


