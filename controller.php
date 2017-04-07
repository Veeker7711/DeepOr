<?php
/**
 * Created by PhpStorm.
 * User: gendar_t
 * Date: 07/04/2017
 * Time: 09:01
 */

require_once "PHPExcel-1.8/Classes/PHPExcel.php";

class Controller
{
    private $arr_value;
    private $file_name;


    /* Must receive an excel file to convert it in the array $arr_value */
    public function __construct($xlsx)
    {
        $this->file_name = $xlsx;
        $file = $xlsx;

        $pathInfo = pathinfo($file);
        $type = $pathInfo['extension'] == 'xlsx' ? 'Excel2007' : 'Excel5';

        $objReader = PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($file);

        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $this->arr_value[$worksheet->getTitle()] = $worksheet->toArray();
        }
    }

    public function list_file()
    {
      $dir = scandir('.');
      $list = [];
      foreach ($dir as $file) {
	  if ($tmp = preg_match('/\w+\.xlsx/', $file))
	    $list[] = "<div class=\"file\" ><button type=\"button\" onclick=\"div_swap()\"class=\"btn btn-primary\">" . $file . "</button></div>";	    
	}
      return ($list);
    }
}