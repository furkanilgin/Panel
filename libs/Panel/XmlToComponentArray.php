<?php
require_once("./components/Pagetop.php");
require_once("./components/Logo.php");
require_once("./components/Menu.php");
require_once("./components/MenuItem.php");
require_once("./components/SubMenuItem.php");
require_once("./components/Panel.php");
require_once("./components/Datagrid.php");
require_once("./components/Column.php");
require_once("./components/EditButton.php");
require_once("./components/DeleteButton.php");
require_once("./components/ImageLink.php");
require_once("./components/Input.php");

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
			else if($pageNode->getName() == "menu"){
				$component = new Menu();
				$component->property = (string) $pageNode["property"];
				
				// menuItem
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
					$menuItemComponent->current = $menuItem["current"];
					
					//subMenuItem
					foreach($menuItem->subMenuItem as $subMenuItem){
						$subMenuItemComponent = new SubMenuItem();
						$subMenuItemComponent->id = $subMenuItem["id"];
						$subMenuItemComponent->type = $subMenuItem["type"];
						$subMenuItemComponent->property = $subMenuItem["property"];
						$subMenuItemComponent->href = $subMenuItem["href"];
						$subMenuItemComponent->action = $subMenuItem["action"];
						$subMenuItemComponent->title = $subMenuItem["title"];
						$subMenuItemComponent->current = $subMenuItem["current"];
						
						// assign subMenuItems to menuItem
						$menuItemComponent->subMenuItemList[] = $subMenuItemComponent;
					}
					
					// assign menuItems to menu
					$component->menuItemList[] = $menuItemComponent;
				}
			}
			else if($pageNode->getName() == "panel"){
				$component = new Panel();
				$component->property = (string) $pageNode["property"];
				$component->title = $pageNode["title"];
				foreach($pageNode->children() as $child){
					if($child->getName() == "input"){
						$inputComponent = new Input();
						$inputComponent->id = $child["id"];
						$inputComponent->name = $child["name"];
						$inputComponent->label = $child["label"];
						$inputComponent->text = $_POST[(string)$inputComponent->name];;
						$component->panelItemList[] = $inputComponent;
					}
					else if($child->getName() == "datagrid"){
						foreach($pageNode->datagrid as $datagrid){
							$datagridComponent = new Datagrid();
							$datagridComponent->property = $datagrid["property"];
							foreach($datagrid->column as $column){
								$columnComponent = new Column();
								$columnComponent->title = $column["title"];
								$columnComponent->width = $column["width"];
								$columnComponent->type = $column["type"];
								$columnComponent->property = $column["property"];
								foreach($column->editButton as $editButton){
									$columnObject = new EditButton();
									$columnObject->title = $editButton["title"];
									$columnComponent->columnObjectList[] = $columnObject;
								}
								foreach($column->deleteButton as $deleteButton){
									$columnObject = new DeleteButton();
									$columnObject->title = $editButton["title"];
									$columnComponent->columnObjectList[] = $columnObject;
								}
								foreach($column->imageLink as $imageLink){
									$columnObject = new ImageLink();
									$columnObject->href = $imageLink["href"];
									$columnComponent->columnObjectList[] = $columnObject;
								}
								$datagridComponent->columnList[] = $columnComponent;
							}
							$component->panelItemList[] = $datagridComponent;
						}
					}
				}
				foreach($pageNode->field as $field){
					$fieldComponent = new Field();
					$fieldComponent->title = $field["title"];
					
					$component->panelItemList[] = $fieldComponent;
				}
			}
			
			$componentArray[] = $component;
		}
		
		return $componentArray;
	}
}