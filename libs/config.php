<?php
error_reporting(0);
const HOST_NAME = 'localhost';
const USER_NAME = 'root';
const PASS = 'root';
const DB_NAME = 'articles';

$link = mysqli_connect(HOST_NAME,USER_NAME,PASS,DB_NAME);

global $link;


