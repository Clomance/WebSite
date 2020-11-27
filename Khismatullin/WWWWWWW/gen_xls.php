<?php
    require_once('php_excel/Classes/PHPExcel.php');
    require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php');

    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    // Запрос на выборку сведений о пользователях
    $result = $mysqli->query("SELECT
        games.name as game_name,
        games.genre as game_genre,
        games.developer as game_developer,
        games.publisher as game_publisher,

        game_keys.key_code,
        game_keys.purchase_date,
        game_keys.expiry_date,

        stores.url as store_url

        FROM game_keys
        LEFT JOIN games ON game_keys.game_id=games.id
        LEFT JOIN stores ON game_keys.store_id=stores.id"
    );

    $xls = new PHPExcel();

    // Устанавливаем индекс активного листа
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Игры');

    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", 'Игры');
    $sheet->getStyle('A1')->getFill()->setFillType(
        PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');

    // Объединяем ячейки
    $sheet->mergeCells('A1:I1');

    // Выравнивание текста
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(
        PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $header = array("п/п","Название","Жанр","Разработчик","Издатель",
        "Ключ","Дата приобретения","Дата окончания","URL магазина");

    $c = 0;

    foreach ($header as $h){
        $sheet->setCellValueByColumnAndRow(
            $c,
            2,
            $h
        );

        // Применяем выравнивание
        $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);

        $c++;
    }

    if ($result){
        $r = 3;

        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $c = 0;

            $sheet->setCellValueByColumnAndRow(
                $c,
                $r,
                $r-2
            );

            $c++;

            foreach ($row as $cell){
                $sheet->setCellValueByColumnAndRow(
                    $c,
                    $r,
                    $cell
                );
                // Применяем выравнивание
                //$sheet->getStyleByColumnAndRow($c, $r)->getAlignment()->setWrapText(true);

                $c++;
            }

            $r++;
        }
    }

    header ( "Content-type: application/vnd.ms-excel" );
    header("Content-Disposition: attachment;filename=Games.xls");
    header("Content-Transfer-Encoding: binary ");

    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');
?>