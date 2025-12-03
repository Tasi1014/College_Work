<?php

class Book {

    private $title;
    private $author;
    private $isbn;

    public function settitle($title){
        $this->title = $title;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getIsbn(){
        return $this->isbn;
    }
}

$b1 = new Book();

$b1->setTitle("Dream World");
$b1->setAuthor("Tashi Sherpa");
$b1->setIsbn(1010101);

echo "Title: " . $b1->getTitle() . "<br>";
echo "Designation: " . $b1->getAuthor() . "<br>";
echo "Isbn: " . $b1->getIsbn() . "<br>";


?>
