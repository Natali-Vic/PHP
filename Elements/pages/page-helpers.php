<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/src/elements.php");

function readElementFromArray(array $arr, bool $needId=false) : ?Element {
    if ($needId && !isset($arr["id"])) {
        return null;
    }
    if (isset($arr["name"]) && isset($arr["code_el"]) && isset($arr["group_el"]) && isset($arr["period_el"]) && isset($arr["number_el"])) {
        $element = new Element(0, $arr["name"], $arr["code_el"], $arr["group_el"], $arr["period_el"], $arr["number_el"]);
        if ($needId) {
            $element->id = $arr["id"];
        }
        return $element;
    }
    return null;
}