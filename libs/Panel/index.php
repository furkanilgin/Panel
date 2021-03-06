<?php
ob_start();
session_start();

require_once("html/header.php");
require_once("Framework.php");

if(!isset($_GET["page"])){
	echo "<script>location='login';</script>";
}

$framework = new Framework();
$requestedPageConfiguration = $framework->findRequestedPageConfiguration($_GET["page"]);
$framework->checkRequestedPageIsCorrect($requestedPageConfiguration);
$componentArray = $framework->convertXmlToComponentArray($requestedPageConfiguration);
$controller = $framework->createControllerAndModelObject($requestedPageConfiguration);
$controller = $framework->setFromComponentArrayToModel($componentArray, $controller);
$framework->callLoadFunction($controller);
$componentArray = $framework->setFromModelToComponentArray($componentArray, $controller);
$framework->callAction($controller);
$html = $framework->renderHtml($componentArray);
$js = $framework->renderJS($componentArray, $requestedPageConfiguration);

echo $html;
file_put_contents("./js/script.js", $js);

require_once("html/footer.html");

ob_flush();
?>