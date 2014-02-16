<?php
require_once("./components/Inputtext.php");
require_once("./components/Dropdown.php");
require_once("./components/Button.php");
require_once("./components/Pagetop.php");
require_once("./components/Logo.php");
require_once("./components/Menu.php");
require_once("./components/MenuItem.php");

class XmlToComponentArray{

	public static function convert($xmlStr){
	
		$root = simplexml_load_string($xmlStr);

		foreach($root as $pageNode){
			if($pageNode->getName() == "pageTop"){
				$component = new Pagetop();
				$component->property = (string) $pageNode["property"];
				if(isset($pageNode->logo)){
					$component->logo = new Logo();
					$component->logo->href = $pageNode->logo["href"];
					$component->logo->src = $pageNode->logo["src"];
					$component->logo->height = $pageNode->logo["height"];
					$component->logo->width = $pageNode->logo["width"];
					$component->logo->top = $pageNode->logo["top"];
				}
			}
			if($pageNode->getName() == "menu"){
				$component = new Menu();
				$component->property = (string) $pageNode["property"];
				$rightMenuItemCount = 0;
				foreach($pageNode->menuItem as $menuItem){
					$menuItemComponent = new MenuItem();
					$menuItemComponent->id = $menuItem["id"];
					$menuItemComponent->type = $menuItem["type"];
					if($menuItem["type"] == ""){
						$menuItemComponent->type = "default";
					}
					$menuItemComponent->property = $menuItem["property"];
					$menuItemComponent->href = $menuItem["href"];
					$menuItemComponent->action = $menuItem["action"];
					$menuItemComponent->title = $menuItem["title"];
					$component->menuItemList[] = $menuItemComponent;
					if($menuItemComponent->type != "default"){
						$rightMenuItemCount++;
					}
				}
				$component->rightMenuItemCount = $rightMenuItemCount;
			}
			if($pageNode->getName() == "inputtext"){
				$component = new Inputtext();
				$component->id = (string) $pageNode["id"];
				$component->name = (string) $pageNode["name"];
				$component->property = (string) $pageNode["property"];
				$component->text = $_POST[(string)$component->id];
			}
			if($pageNode->getName() == "dropdown"){
				$component = new Dropdown();
				$component->id = (string) $pageNode["id"];
				$component->name = (string) $pageNode["name"];
				$component->property = (string) $pageNode["property"];
				$component->change = (string) $pageNode["change"];
				$component->selectedItem = $_POST[(string)$component->id];
			}
			if($pageNode->getName() == "button"){
				$component = new Button();
				$component->id = (string) $pageNode["id"];
				$component->name = (string) $pageNode["name"];
				$component->text = (string) $pageNode["text"];
				$component->property = (string) $pageNode["property"];
				$component->action = (string) $pageNode["action"];
			}
			$componentArray[] = $component;
		}
		
		return $componentArray;
	}
}