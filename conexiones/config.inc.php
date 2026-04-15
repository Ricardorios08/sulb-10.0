<?php
header('Content-Type: text/html; charset=UTF-8');
include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "u259434644_segura", "S0p0rt3s2021", "u259434644_segura");
   $db->Execute("SET NAMES 'utf8'");
