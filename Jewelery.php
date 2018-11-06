<?php

class Jewelery
{
    public $name;
    public $type;

    public function __construct($name, JeweleryType $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getTypeName()
    {
        return $this->type->name;
    }
    public function getTypeImg()
    {
        return $this->type->imgPath;
    }

}

class JeweleryType
{
    public $name;
    public $imgPath;

    public function __construct($name, $imgPath)
    {
        $this->name = $name;
        $this->imgPath = $imgPath;
    }
}

$type = new JeweleryType('ring', 'img/ring.png');
$jewelery = new Jewelery('King ring', $type);

echo $jewelery->getTypeImg();