<?php

namespace rnv619\barcode;

class Barcode
{

    private $codetype;
    private $size;
    private $text;
    private $print;
    private $orientation;

    public function __construct($codetype, $size, $text, $print, $orientation)
    {
        $this->codetype = $codetype;
        $this->size = $size;
        $this->text = $text;
        $this->print = $print;
        $this->orientation = $orientation;
    }

    public function setCodeType($codetype)
    {
        $this->codetype = $codetype;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setPrint($print)
    {
        $this->print = $print;
    }
    
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    public function getCodeType()
    {
        return $this->codetype;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getPrint()
    {
        return $this->print;
    }
    
    public function getOrientation()
    {
        return $this->orientation;
    }

}
