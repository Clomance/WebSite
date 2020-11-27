<?php
    //require_once("php_xls/src/PhpSpreadsheet/Spreadsheet.php");

    require_once('php_excel/Classes/PHPExcel.php'); 

    // Подключаем класс для вывода данных в формате excel
    require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php'); 

    $xls = new PHPExcel();

    // Устанавливаем индекс активного листа
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Таблица умножения');
    
    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", 'Таблица умножения');
    $sheet->getStyle('A1')->getFill()->setFillType(
        PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
    
    // Объединяем ячейки
    $sheet->mergeCells('A1:H1');
    
    // Выравнивание текста
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(
        PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    for ($i = 2; $i < 10; $i++) {
        for ($j = 2; $j < 10; $j++) {
            // Выводим таблицу умножения
            $sheet->setCellValueByColumnAndRow(
                                            $i - 2,
                                            $j,
                                            $i . "x" .$j . "=" . ($i*$j));
            // Применяем выравнивание
            $sheet->getStyleByColumnAndRow($i - 2, $j)->getAlignment()->
                    setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
    }

    header ( "Content-type: application/vnd.ms-excel" );
    header("Content-Disposition: attachment;filename=Games.xls");
    header("Content-Transfer-Encoding: binary ");

    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');
?>