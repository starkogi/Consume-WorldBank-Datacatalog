<?php 

class Metatype
{
	public $id; //String
	public $value; //String
}

class Datacatalog
{
    public $id; //String
    public $metatype; //array(Metatype)
}

class RowData
{
    public $page; //int
    public $pages; //int
    public $per_page; //String
    public $total; //int
    public $datacatalog; //array(Datacatalog)
}

