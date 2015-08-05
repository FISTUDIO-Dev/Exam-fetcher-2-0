<?php
/**
 * Created by PhpStorm.
 * User: JackieChung
 * Date: 27/06/15
 * Time: 7:41 PM
 */
require "exam.php";

class VCAAExam implements exam {

    private $downloadLink;
    private $title;
    private $year;
    private $subject;


    //Constructor
    public function __construct($subject,$title,$year,$downloadLink){
        $this->setSubject($subject);
        $this->setTitle($title);
        $this->setYear($year);
        $this->setDownloadLink($downloadLink);
    }

    // Setters
    function setDownloadLink($url){
        $this->downloadLink = $url;
    }

    function setTitle($title){
        $this->title = $title;
    }

    function setSubject($name){
        $this->subject = $name;
    }

    function setYear($year){
        $this->year = $year;
    }

    // Getters
    function getDownloadLink(){
        return $this->downloadLink;
    }

    function getTitle(){
        return $this->title;
    }

    function getSubject(){
        return $this->subject;
    }

    function getYear(){
        return $this->year;
    }

}