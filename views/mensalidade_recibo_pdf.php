<?php

function create_image($user, $mes) {
    $fontname = array('ubuntu_regular' => 'assets/fonts/ubuntu-regular.ttf');
    $i = 30;
    $quality = 100;
    $largura = 1500;
    $altura = 519;
    $height = 0;
    $imagemOriginal = 'assets/imagens/recibo_mensalidade.jpg';
    $file = "uploads/operacao/" . $mes . "_recibo_mensalidade_temp.jpg";
    if (file_exists($file)) {
        unlink($file);
    }
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagemOriginal);
    $ratio = $larguraOriginal / $alturaOriginal;

    if ($largura / $altura > $ratio) {
        $largura = $altura * $ratio;
    } else {
        $altura = $largura / $ratio;
    }
    $imagemFinal = imagecreatetruecolor($largura, $altura);
    $im = imagecreatefromjpeg($imagemOriginal);

    // setup the text colours
    $color['black'] = imagecolorallocate($im, 0, 0, 0);

    $y = imagesy($im) - $height - 210;
    foreach ($user as $value) {
        $x = center_text($value['name'], $value['font-size'], $fontname[$value['font-family']]);
        imagettftext($im, $value['font-size'], 0, $value['x'], $y + $i, $color[$value['color']], $fontname[$value['font-family']], $value['name']);
        imagettftext($im, $value['font-size'], 0, 345 + $value['x'], $y + $i, $color[$value['color']], $fontname[$value['font-family']], $value['name']);
        if (isset($value['margin-bottom'])) {
            $i = $i + intval($value['margin-bottom']);
        } else {
            $i = $i + 50;
        }
    }
    imagecopyresampled($imagemFinal, $im, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
    imagejpeg($imagemFinal, $file, $quality);

    return $file;
}

function center_text($string, $font_size, $fontname) {
    $image_width = 1100;
    $dimensions = imagettfbbox($font_size, 0, $fontname, $string);

    return ceil(($image_width - $dimensions[4]) / 2);
}

$recibos = array();
$meses = array(null, 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro');
for ($i = $recibo['mes_inicial']; $i <= $recibo['mes_final']; $i++) {
    $user = array(
        array(
            'name' => 'Mensalidades do ano de ' . $recibo['ano'] . ' 
Referente ao mês de ' . $meses[$i],
            'font-size' => '12',
            'color' => 'black',
            'font-family' => 'ubuntu_regular',
            'x' => 110
        ),
        array(
            'name' => 'JOAB TORRES ALENCAR',
            'font-size' => '14',
            'color' => 'black',
            'font-family' => 'ubuntu_regular',
            'margin-bottom' => 30,
            'x' => 110
        ),
        array(
            'name' => 'Valor ' . $recibo['valor'] . ' data de vencimento de 05 de cada mês
Data de Pagamento ___/____/' . date('o'),
            'font-size' => '10',
            'color' => 'black',
            'font-family' => 'ubuntu_regular',
            'margin-bottom' => 70,
            'x' => 110
        ), array(
            'name' => 'NZ 0042 aux',
            'font-size' => '10',
            'color' => 'black',
            'font-family' => 'ubuntu_regular',
            'x' => 360
        )
    );
    $recibos[] = create_image($user, $i);
}

ob_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Recibo de Mensalidade</title>
        <style>
            img{display: block; margin: 2px;  border: 2px solid #ccc; width: 700px; }
        </style>
    </head>
    <body>
        <?php
        for ($i = 0; $i < count($recibos); $i++) {
            echo '<img src="' . BASE_URL . '/' . $recibos[$i] . '">';
        }
        ?>
    </body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf->WriteHTML($html);
$arquivo = 'recibo_mensalidade' . date('d_m_Y.') . 'pdf';
$mpdf->Output($arquivo, 'D');
?>
