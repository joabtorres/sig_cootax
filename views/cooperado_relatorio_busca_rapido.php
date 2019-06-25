<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Busca Cooperado</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-list-alt"></i> Cooperados</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <?php
    if (isset($cooperados) && is_array($cooperados)) {
        ?>
        <!--modo de exibição em bloco-->
        <?php
        $qtd = 1;
        $row = 1;
        foreach ($cooperados as $cooperado) :
            echo ($row == 1) ? ' <div class="row">' : '';
            ?>
            <div class="col-md-4">
                <div class=" thumbnail">
                    <a href="<?php echo BASE_URL . '/cooperado/index/' . $cooperado['cod_cooperado'] ?>">
                        <img src="<?php echo!empty($cooperado['imagem']) ? BASE_URL . '/' . $cooperado['imagem'] : BASE_URL . '/assets/imagens/foto_ilustrato3x4.png' ?>" alt="SGL - Usuáio" class="img-responsive img-rounded"/>
                    </a>
                    <p class="text-center text-uppercase font-bold"><?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : '' ?> <?php echo!empty($cooperado['nz']) ? '- ' . $cooperado['nz'] : '' ?></p>
                    <p class="text-center text-capitalize">Categoria: <?php echo!empty($cooperado['tipo']) ? $cooperado['tipo'] : '' ?></p>
                    <p class="text-center text-capitalize">Inscrição: <?php echo!empty($cooperado['data_inscricao']) ? $this->formatDateView($cooperado['data_inscricao']) : '' ?></p>
                    <div class="caption text-center">
                        <?php if ($this->checkUser() >= 2) { ?>
                            <a href="<?php echo BASE_URL . '/editar/cooperado/' . $cooperado['cod_cooperado'] ?>" class="btn btn-primary btn-block btn-sm" title="Editar"><i class="fa fa-pencil-alt"></i> Editar</a> 
                            <?php if ($this->checkUser() >= 3) { ?>
                                <button type="button"  class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#modal_cooperado_<?php echo $cooperado['cod_cooperado']; ?>" title="Excluir"> <i class="fa fa-trash"></i> Excluir</button>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        echo ($row == 3) ? '</div>' : '';
        if ($row >= 3) {
            $row = 1;
        } else {
            $row++;
        }
        ++$qtd;
    endforeach;
    ?>
    <!--fim modo de exibição em bloco-->
    <?php
} else {
    echo '<div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Desculpe, não foi possível localizar nenhum registro !
                    </div>
                </div>
            </div>';
}
?>
</div>


<?php
if (isset($cooperados) && is_array($cooperados)) :
    foreach ($cooperados as $cooperado) :
        ?>
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_cooperado_<?php echo $cooperado['cod_cooperado'] ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-primary">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 >Deseja remover este registro?</h4>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b>Código: </b> <?php echo!empty($cooperado['cod_cooperado']) ? $cooperado['cod_cooperado'] : '' ?>;</li>
                            <li><b>NZ: </b> <?php echo!empty($cooperado['nz']) ? $cooperado['nz'] : 'Não registrado' ?>;</li>
                            <li><b>Apelido: </b> <?php echo!empty($cooperado['apelido']) ? $cooperado['apelido'] : '' ?>;</li>
                            <li><b>Nome Completo: </b> <?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : '' ?>;</li>
                        </ul>
                        <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Se você remove o cooperado, será removido todos os respectivos dados como, por exemplo, endereço,  contato e históricos.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . '/excluir/cooperado/' . $cooperado['cod_cooperado'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times-alt"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
?>