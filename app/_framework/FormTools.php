<?php

/*
 * ChiyoFramework
 * FormTools.php
 * Author: gra
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

/**
 * Provides tools to build a form using only PHP
 *
 * @author gra
 */
class FormTools {
    /**
     * Initializes new Form
     * @param String $actionPath Submit Action Path
     * @param String $method Method of form postage (GET, POST)
     */
    public static function initForm($actionPath, $method = "POST") {
        echo "<form action='$actionPath' method='$method'>";
    }
    /**
     * Ends a Form
     */
    public static function endForm() {
        echo "</form>";
    }
    /**
     * Opens a new line (Table Row)
     * @param String $class CSS Classes for TR
     */
    private static function openNewLine($class = NULL) {
        echo "<tr";
        if ($class != NULL) { echo " class=$class"; }
        echo ">";
    }
    /**
     * Opens a new Table Cell
     * @param String $class CSS Classes for TD
     * @param int $colspan Colspan
     */
    private static function openNewCell($class = NULL, $colspan = NULL) {
        echo "<td";
        if ($class != NULL) { echo " class=$class"; }
        if ($colspan != NULL) { echo " colspan=$colspan"; }
        echo ">";
    }
    /**
     * Closes a Table Cell
     */
    private static function closeCell() {
        echo "</td>";
    }
    /**
     * Closes a line (Table Row)
     */
    private static function closeLine() {
        echo "</tr>";
    }
    /**
     * Handles the start of a new form item
     * @param String $title Title of this element
     */
    private static function handleStartOfItem($title) {
        FormTools::openNewCell();
        echo $title;
        FormTools::closeCell();
    }
    /**
     * Handles end of a form item
     * @param Boolean $newLine Should line be ended?
     * @param Boolean $finalize Prevent the generation of a new line?
     */
    private static function handleEndOfItem($newLine, $finalize) {
        if ($newLine) { FormTools::closeLine(); }
        if (!$finalize) { FormTools::openNewLine(); }
    }
    
    /**
     * Prints a HTML Textbox
     * @param String $id ID of HTML element
     * @param String $title Title to be displayed
     * @param Boolean $required Is field required?
     * @param String $descText Description / Placeholder Text
     * @param Boolean $newLine Should line be ended?
     * @param Boolean $finalize Prevent the generation of a new line?
     */
    public static function giveTextBox($id, $title, $required, $descText, $newLine = TRUE, $finalize = FALSE) {
        FormTools::handleStartOfItem($title);
        FormTools::openNewCell();
        echo "<input type='text' id='$id' ";
        echo "placeholder='$descText' ";
        if ($required) { echo "required"; }
        echo "/>";
        FormTools::closeCell();
        FormTools::handleEndOfItem($newLine, $finalize);
    }
    
    /**
     * Prints an HTML Password Box
     * @param String $id ID of HTML element
     * @param String $title Title to be displayed
     * @param Boolean $required Is field required?
     * @param String $descText Description / Placeholder Text
     * @param Boolean $newLine Should line be ended?
     * @param Boolean $finalize Prevent the generation of a new line?
     */
    public static function givePasswordBox($id, $title, $required, $descText, $newLine = TRUE, $finalize = FALSE) {
        FormTools::handleStartOfItem($title);
        FormTools::openNewCell();
        echo "<input type='password' id='$id' ";
        echo "placeholder='$descText' ";
        if ($required) { echo "required"; }
        echo "/>";
        FormTools::closeCell();
        FormTools::handleEndOfItem($newLine, $finalize);
    }
    
    /**
     * Prints an HTML Checkbox
     * @param String $id ID of HTML element
     * @param String $title Title to be displayed
     * @param String $descText Description Text (displayed to the right of the checkbox)
     * @param Boolean $newLine Should line be ended?
     * @param Boolean $finalize Prevent the generation of a new line?
     */
    public static function giveCheckBox($id, $title, $descText, $newLine = TRUE, $finalize = FALSE) {
        FormTools::handleStartOfItem($title);
        FormTools::openNewCell();
        echo "<input type='checkbox' id='$id' ";
        echo "/>";
        echo $descText;
        FormTools::closeCell();
        FormTools::handleEndOfItem($newLine, $finalize);
    }
    
    /**
     * Prints an HTML Submit Button
     * @param String $id ID of HTML element
     * @param String $title Text of the Submit Button
     */
    public static function giveSubmitButton($id, $title) {
        echo "<input type='submit' id='$id' value='$title' />";
    }
    
    /**
     * Prints an HTML Button
     * @param String $id ID of HTML element
     * @param String $title Text of the HTML Button
     * @param String $onClick JavaScript OnClick Event
     */
    public static function giveHtmlButton($id, $title, $onClick = "") {
        echo "<input type='button' id='$id' value='$title' ";
        if ($onClick != NULL) { echo "onclick='$onClick' "; }
        echo "/>";
    }
}
