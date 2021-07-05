<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Lugar_Model extends Base_Model
{
    private $table_name = "lugar";
    public function __construct()
    {
        parent::__construct();
    }

}