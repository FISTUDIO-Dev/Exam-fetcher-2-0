<?php
/**
 * Created by PhpStorm.
 * User: JackieChung
 * Date: 27/06/15
 * Time: 7:37 PM
 */

interface exam {

    // Link to PDF etc
    function getDownloadLink();

    // Name title
    function getTitle();

    // Subject
    function getSubject();

    // Year
    function getYear();

}