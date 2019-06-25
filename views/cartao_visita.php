<?php

function create_image($user) {
    $fontname = array('ubuntu_bold' => 'assets/fonts/ubuntu-bold.ttf', 'capriola' => 'assets/fonts/capriola-regular.ttf');
    $i = 30;
    $quality = 100;
    $largura = 1500;
    $altura = 857;
    $height = 0;    
    $file = "uploads/operacao/cartao_temp.jpg";

    // if the file already exists dont create it again just serve up the original	
    if (file_exists($file)) {
        unlink($file);
    }
    // define the base image that we lay our text on

    list($larguraOriginal, $alturaOriginal) = getimagesize("assets/imagens/cartao_visita.jpg");
    $ratio = $larguraOriginal / $alturaOriginal;

    if ($largura / $altura > $ratio) {
        $largura = $altura * $ratio;
    } else {
        $altura = $largura / $ratio;
    }
    $imagemFinal = imagecreatetruecolor($largura, $altura);
    $im = imagecreatefromjpeg("assets/imagens/cartao_visita.jpg");

    // setup the text colours
    $color['black'] = imagecolorallocate($im, 0, 0, 0);
    $color['green'] = imagecolorallocate($im, 55, 189, 102);
    $color['white'] = imagecolorallocate($im, 255, 255, 255);

    // this defines the starting height for the text block
    $y = imagesy($im) - $height - 365;

    foreach ($user as $value) {
        $x = center_text($value['name'], $value['font-size'], $fontname[$value['font-family']]);
        imagettftext($im, $value['font-size'], 0, $x, $y + $i, $color[$value['color']], $fontname[$value['font-family']], $value['name']);
        if (isset($value['margin-bottom'])) {
            $i = $i + intval($value['margin-bottom']);
        } else {
            $i = $i + 70;
        }
    }
    // create the image
    imagecopyresampled($imagemFinal, $im, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
    imagejpeg($imagemFinal, $file, $quality);

    return $file;
}

function center_text($string, $font_size, $fontname) {


    $image_width = 1100;
    $dimensions = imagettfbbox($font_size, 0, $fontname, $string);

    return ceil(($image_width - $dimensions[4]) / 2);
}

$user = array(
    array(
        'name' => $cooperado['apelido'],
        'font-size' => '40',
        'color' => 'white',
        'font-family' => 'ubuntu_bold'
    ),
    array(
        'name' => 'Motorista Profissional',
        'font-size' => '30',
        'color' => 'black',
        'margin-bottom' => '120',
        'font-family' => 'capriola'
    ),
    array(
        'name' => $cooperado['celular_1'],
        'font-size' => '35',
        'color' => 'white',
        'font-family' => 'ubuntu_bold'
    ),
    array(
        'name' => $cooperado['celular_2'],
        'font-size' => '35',
        'color' => 'white',
        'font-family' => 'ubuntu_bold'
    )
);
// run the script to create the image
$filename = create_image($user);
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Carteira Cooperado</title>
        <style>
            img{
                display: inline-block;
                margin: 2px;
                border: 2px solid #ccc;
            }
        </style>
    </head>
    <body>
        <?php
        $qtd = 1;
        while ($qtd <= 10) {
            echo '<img src="' . BASE_URL . '/' . $filename . '" width="300px">';
            $qtd++;
        }
        ?>
    </body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf->WriteHTML($html);
$arquivo = 'cartao_de_visita_' . date('d_m_Y.') . 'pdf';
$mpdf->Output($arquivo, 'D');
?>
