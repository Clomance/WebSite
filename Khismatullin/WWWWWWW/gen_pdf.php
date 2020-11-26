<?php
    require('tfpdf/tfpdf.php');

    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $pdf = new tFPDF();
    $pdf->AddPage();

    $pdf->AddFont('PDFFont','','pixel.ttf',true);

    $pdf->SetFont('PDFFont','',12);
    $pdf->Cell(80);
    $txt ='Игры';

    $pdf->Cell(30,10,$txt,1,0,'C');
    $pdf->Ln(20);

    $pdf->SetFont('PDFFont','',6);

    // Запрос на выборку сведений о пользователях
    $result = $mysqli->query("SELECT
        games.name as game_name,
        games.genre as game_genre,
        games.developer as game_developer,
        games.publisher as game_publisher,

        stores.url as store_url,

        game_keys.purchase_date,
        game_keys.expiry_date,
        game_keys.key_code FROM game_keys
        LEFT JOIN games ON game_keys.game_id=games.id
        LEFT JOIN stores ON game_keys.store_id=stores.id"
    );

    $w = array(6,30,25,25,25,20,20,17,25);
    $h = 10;

    $pdf->SetFillColor(200,200,200);

    $pdf->Cell($w[0],$h,'п/п','LRTB','0','',true);

    $pdf->Cell($w[1],$h,'Название','LRTB','0','',true);
    $pdf->Cell($w[2],$h,'Жанр','LRTB','0','',true);
    $pdf->Cell($w[3],$h,'Разработчик','LRTB','0','',true);
    $pdf->Cell($w[4],$h,'Издатель','LRTB','0','',true);

    $pdf->Cell($w[5],$h,'Ключ','LRTB','0','',true);
    $pdf->Cell($w[6],$h,'Дата приобретения','LRTB','0','',true);
    $pdf->Cell($w[7],$h,'Дата окончания','LRTB','0','',true);

    $pdf->Cell($w[8],$h,'URL магазина','LRTB','0','',true);

    $pdf->Ln();

    if ($result){
        $counter = 1;
        // Для каждой строки из запроса
        while ($row = $result->fetch_array()){
            $game_name = $row['game_name'];
            $game_genre = $row['game_genre'];
            $game_developer = $row['game_developer'];
            $game_publisher = $row['game_publisher'];


            $key_code = $row['key_code'];
            $purchase_date = $row['purchase_date'];
            $expiry_date = $row['expiry_date'];

            $store_url = $row['store_url'];

            // 
            $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);

            $pdf->Cell($w[1],$h,$game_name,'LRB');
            $pdf->Cell($w[2],$h,$game_genre,'RB');
            $pdf->Cell($w[3],$h,$game_developer,'RB');
            $pdf->Cell($w[4],$h,$game_publisher,'RB');

            $pdf->Cell($w[5],$h,$key_code,'RB');
            $pdf->Cell($w[6],$h,$purchase_date,'RB');
            $pdf->Cell($w[7],$h,$expiry_date,'RB');

            $pdf->Cell($w[8],$h,$store_url,'RB');

            $pdf->Ln();
            $counter++;
        }
    }

    $file_data = $pdf->Output("S");

    fopen("Games.pdf","w+");

    file_put_contents("Games.pdf",$file_data);

    header("Location: Games.pdf");
?>