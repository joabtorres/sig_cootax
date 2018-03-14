
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/relatorio.css">
    </head>
    <body>
        <div id="conteudo">
            <div id="header">
                <h2 class="text-center text-upercase"> <span class="text-upercase"><?php echo $cidade['nome_siglas'] ?></span> - <?php echo $cidade['nome_completo'] ?> </h2>
                <p class="text-center">                    
                    <small>
                        <?php echo $cidade['endereco'] ?> - CEP: <?php echo $cidade['cep'] ?><br/>
                        <?php echo $cidade['telefone'] ?> | <?php echo $cidade['email'] ?><br/>
                        CNPJ <?php echo $cidade['cnpj'] ?>
                    </small>
                </p>
            </div>
            <div id="section">
                <h2>Relatório dos Cooperados</h2>
                <table class="table">
                    <tr>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Por</th>
                        <th>Busca</th>
                    </tr>
                    <tr>
                        <td><?php echo $busca['tipo'] ?></td>
                        <td><?php echo $busca['status'] ?></td>
                        <td><?php echo $busca['por'] ?></td>
                        <td><?php echo $busca['campo'] ?></td>
                    </tr>
                </table>
                <hr>


                <?php if (!empty($cooperados)) : ?>
                    <h3 class="text-right">Total: <?php echo count($cooperados) > 1 ? count($cooperados) . ' registros encontrados' : count($cooperados) . ' registro encontrado' ?>.</h3>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Apelido</th>
                            <th>Nome Completo</th>
                            <th>NZ</th>
                            <th>Inscrição</th>
                        </tr>

                        <?php
                        $qtd = 1;
                        foreach ($cooperados as $cooperado) :
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $qtd; ?></td>
                                <td class="text-upercase"><?php echo!empty($cooperado['apelido']) ? $cooperado['apelido'] : '' ?></td>
                                <td class="text-upercase"><?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : '' ?></td>
                                <td class="text-upercase"><?php echo!empty($cooperado['nz']) ? $cooperado['nz'] : '' ?></td>
                                <td class="text-upercase"><?php echo!empty($cooperado['data_inscricao']) ? $this->formatDateView($cooperado['data_inscricao']) : '' ?></td>
                            </tr>
                            <?php
                            ++$qtd;
                        endforeach;
                        ?>
                    </table>
                <?php endif; ?>
            </div>

        </div>
    </body>
</html>