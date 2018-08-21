<?php
namespace frontend\controllers;


use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\Instancias;
use app\models\Amis;
use yii\data\Pagination;
use mPDF;
use app\models\FormRegister;
use app\models\Users;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Html;
use Aws\Ec2\Ec2Client;
use Aws\Credentials\CredentialProvider;
use app\models\FormSearch;
use app\models\FormInstancia;
use app\models\Formdate;
use app\models\Programar;

date_default_timezone_set('America/Cancun');
/**
 *  controller
 */
class FormatosController extends Controller
{
    
public function actionExcel(){
 
 Yii::import('ext.phpexcel.XPHPExcel');
  $objPHPExcel = XPHPExcel::createPHPExcel();
 
 
  // Set document properties
  $objPHPExcel->getProperties()->setCreator("Lenin Hernandez - Leninmhs")
                               ->setLastModifiedBy("Leninmhs")
                               ->setTitle("Generar archivo excel Office 2007 XLSX Test Document desde Yii PHP")
                               ->setSubject("Office 2007 XLSX Test Document from yii php")
                               ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                               ->setKeywords("office 2007 openxml php")
                               ->setCategory("Test result file");
  // Add some data
  $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A1', 'Hello')
              ->setCellValue('B2', 'world!')
              ->setCellValue('C1', 'Hello')
              ->setCellValue('D2', 'world!');
  // Miscellaneous glyphs, UTF-8
  $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A4', 'Miscellaneous glyphs')
              ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
  // Rename worksheet
  $objPHPExcel->getActiveSheet()->setTitle('Simple');
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  // Redirect output to a client’s web browser (Excel5)
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="01simple.xls"');
  header('Cache-Control: max-age=0');
  // If you're serving to IE 9, then the following may be needed
  header('Cache-Control: max-age=1');
  // If you're serving to IE over SSL, then the following may be needed
  header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
  header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
  header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
  header ('Pragma: public'); // HTTP/1.0
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
  $objWriter->save('php://output');
  exit;
 
}
}