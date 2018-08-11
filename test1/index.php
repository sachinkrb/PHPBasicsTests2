<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once "classes/Page_Data.class.php";
$pageData = new Page_Data();
//title variable is unique since it belongs to different objects.
//StdClass() creates php objects. An object can store multiple values.
$pageData->title ="Welcome here:Protfolio Site";
$pageData->content=include_once "views/navigation.php";
$pageData->css ="<link href='css/layout.css' rel='stylesheet' />";
$navigationIsClicked = isset($_GET['page']);
if($navigationIsClicked) {
    $fileToLoad = $_GET['page'];
    //The trick here is '.' which concatenated the index and navigation files.
    $pageData->content .=include_once "views/$fileToLoad.php";
    
}else{
    //Default to be loaded when browser loads
    $fileToLoad = "skills";
}
$pageData->content .=include_once "views/$fileToLoad.php";

//Example on using embedded stylesheet
$pageData->embeddedStyle = "
<style>
/*The selector tells the browser something such as “look for a 
<nav> element inside which you find an <a> element with an 
href attribute that contains the string ?page=projects.
*/
nav a[href *= '?page=$fileToLoad']{
    padding:3px;
    background-color:white;
    border-top-left-radius:3px;
    border-top-right-radius:3px;
}
</style>";
$page = include_once "templates/page.php";
echo $page;

?>

