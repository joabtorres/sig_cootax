<?php

function create_image($user, $url) {
    $fontname = array('ubuntu_regular' => 'assets/fonts/ubuntu-regular.ttf');
    $i = 30;
    $quality = 1000;
    $largura = 1500;
    $altura = 1482;
    $height = 0;
    # $file = "uploads/operacao/recibo_temp.jpg";
    $file = "uploads/operacao/carteira_temp.jpg";
    $imagemOriginal = 'assets/imagens/carteira_cooperativa.jpg';
    $imagemCooperado = $url;

    // if the file already exists dont create it again just serve up the original	
    if (file_exists($file)) {
        unlink($file);
    }
    // define the base image that we lay our text on

    list($larguraOriginal, $alturaOriginal) = getimagesize($imagemOriginal);
    list($larguraCooperado, $alturaCooperado) = getimagesize($imagemCooperado);

    $ratio = $larguraOriginal / $alturaOriginal;

    if ($largura / $altura > $ratio) {
        $largura = $altura * $ratio;
    } else {
        $altura = $largura / $ratio;
    }
    $imagemFinal = imagecreatetruecolor($largura, $altura);
    $im = imagecreatefromjpeg($imagemOriginal);
    $imagem_cooperado = imagecreatefromjpeg($imagemCooperado);

    // setup the text colours
    $color['black'] = imagecolorallocate($im, 0, 0, 0);

    // this defines the starting height for the text block
    $y = imagesy($im) - $height - 945;

    foreach ($user as $value) {
        imagettftext($im, $value['font-size'], 0, $value['x'], $y + $i, $color[$value['color']], $fontname[$value['font-family']], $value['text']);
        if (isset($value['margin-bottom'])) {
            $i = $i + intval($value['margin-bottom']);
        } else {
            $i = $i + 50;
        }
    }
    // create the image
    imagecopyresampled($imagemFinal, $im, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
    imagecopyresampled($imagemFinal, $imagem_cooperado, 38, 259, 0, 0, 327, 430, $larguraCooperado, $alturaCooperado);
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
        'text' => $cidade['nome_siglas'] . ' - ' . $cidade['nome_completo'],
        'font-size' => '20',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'x' => 200,
        'margin-bottom' => 25
    ),
    array(
        'text' => $cidade['endereco'] . ' - CEP: ' . $cidade['cep'],
        'font-size' => '14',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'x' => 200,
        'margin-bottom' => 25
    ),
    array(
        'text' => $cidade['url_site'] . ' | ' . $cidade['email'] . ' | CNPJ ' . $cidade['cnpj'],
        'font-size' => '14',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'x' => 200,
        'margin-bottom' => 118
    ),
    array(
        'text' => $cooperado['nome_completo'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'x' => 280,
        'margin-bottom' => 78
    ),
    array(
        'text' => $cooperado['cnh'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 0,
        'x' => 280
    ),
    array(
        'text' => $cooperado['cat'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 78,
        'x' => 630
    ), array(
        'text' => $cooperado['cpf'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 0,
        'x' => 280
    ),
    array(
        'text' => str_pad(strval($cooperado['cod_cooperado']), 5, '0', STR_PAD_LEFT),
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 75,
        'x' => 630
    ), array(
        'text' => $cooperado['rg'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 0,
        'x' => 280
    ),
    array(
        'text' => !empty($cooperado['data_inscricao']) ? $this->formatDateView($cooperado['data_inscricao']) : '',
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 114,
        'x' => 630
    ), array(
        'text' => $cooperado['nz'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 0,
        'x' => 40
    ),
    array(
        'text' => $cooperado['tipo'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 70,
        'x' => 520
    ),
    array(
        'text' => $cooperado['pai'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 73,
        'x' => 40
    ), array(
        'text' => $cooperado['mae'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 75,
        'x' => 40
    ), array(
        'text' => !empty($cooperado['data_inicial']) ? $this->formatDateView($cooperado['data_inicial']) : '',
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 0,
        'x' => 40
    ),
    array(
        'text' => !empty($cooperado['data_validade']) ? $this->formatDateView($cooperado['data_validade']) : '',
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 70,
        'x' => 520
    )
);
// run the script to create the image
$imagem = !empty($cooperado['imagem']) ? $cooperado['imagem'] : 'assets/imagens/foto_ilustrato3x4.jpg';
$filename = create_image($user, $imagem);
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Carteira</title>
    </head>
    <body>
        <img src="<?= BASE_URL . '/' . $filename; ?>" style="display:  block; margin: 3px auto; width: 350px;"/>
    </body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf->WriteHTML($html);
$arquivo = 'carteira' . date('d_m_Y.') . 'pdf';
$mpdf->Output($arquivo, 'i');
?>
