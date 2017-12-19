<?php
    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['id'] === $id) {
                return $key;
            }
        }
        return null;
    }

    $id = null;
    $title = "";
    $description = "";
    $img = "";

    $infos = [
        [
            "id" => 1,
            "title" => "Dica para negociar os tributos",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/tributaria/1.jpg"
        ],[
            "id" => 2,
            "title" => "Dica para negociar os tributos",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/tributaria/2.jpg"
        ],[
            "id" => 3,
            "title" => "Dica para negociar com bancos",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/bancaria/1.jpg"
        ],[
            "id" => 4,
            "title" => "Dica para negociar com bancos",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/bancaria/2.jpg"
        ],[
            "id" => 5,
            "title" => "Dica para negociar com bancos",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/bancaria/3.jpg"
        ],[
            "id" => 6,
            "title" => "Dica para negociar com bancos",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/bancaria/4.jpg"
        ],[
            "id" => 7,
            "title" => "Dica para negociar com bancos",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/bancaria/5.jpg"
        ],[
            "id" => 8,
            "title" => "Dica para negociar com bancos",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/bancaria/6.jpg"
        ],[
            "id" => 9,
            "title" => "Dica para negociar o aluguel",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/aluguel/1.jpg"
        ],[
            "id" => 10,
            "title" => "Dica para negociar o aluguel",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/aluguel/2.jpg"
        ],[
            "id" => 11,
            "title" => "Dica para negociar o aluguel",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/aluguel/3.jpg"
        ],[
            "id" => 12,
            "title" => "Dica para negociar o aluguel",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/aluguel/4.jpg"
        ],[
            "id" => 13,
            "title" => "Dica para negociar com fornecedores",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/fornecedor/1.jpg"
        ],[
            "id" => 14,
            "title" => "Dica para negociar com fornecedores",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/fornecedor/2.jpg"
        ],[
            "id" => 15,
            "title" => "Dica para negociar com fornecedores",
            "description" => "O #MutirãoDaRenegociação separou umas dicas para quem está com a empresa endividada",
            "img" => "images/dicas/fornecedor/3.jpg"
        ]
    ];

    if(isset($_GET['id'])){
        $index = searchForId(intval($_GET['id']), $infos);
        if($index !== null){
            $id = intval($_GET['id']);
            $info = $infos[$index];
            $title = $info['title'];
            $description = $info['description'];
            $img = $info['img'];
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <!--<link rel="stylesheet" href="css/tabit.css">-->
        <link rel="stylesheet" type="text/css" href="slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="http://izimodal.marcelodolce.com/css/iziModal1.3.0.min.css" />
        <meta property="og:url"           content="http://sebrae.com.br/renegociacao/<?php if($id != null) echo "index.php?id=".$id; ?>" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="<?php echo $title; ?>" />
        <meta property="og:description"   content="<?php echo $description; ?>" />
        <meta property="og:image"         content="<?php echo $img; ?>" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@sebrae">
        <meta name="twitter:title" content="<?php echo $title; ?>">
        <meta name="twitter:description" content="<?php echo $description; ?>">
        <meta name="twitter:image" content="http://sebrae.com.br/renegociacao/<?php echo $img; ?>">
        <meta name="twitter:domain" content="http://sebrae.com.br/renegociacao/<?php if($id != null) echo "index.php?id=".$id; ?>">

        <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="http://izimodal.marcelodolce.com/js/iziModal1.3.0.min.js" type="text/javascript"></script>
        <script src="slick/slick.min.js" type="text/javascript"></script>
        <script src="js/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>
        <script src="js/parallax.min.js"></script>
        <script src="js/plugin.tabit.js"></script>
        <script src="js/script.js"></script>
    </head>

    <body id="up" style="min-width:1000px; position: relative;">

    <header style="min-width:1000px;">
            <nav class="menuPrincipal">
                <div id="logoHome"><a href="#up">
                    <ul>
                        <!--<li>INICIATIVA</li>-->
                        <li><img src="images/logo-sebraepqn.png"</li>

                    </ul></a>
                </div>
                    <ul>
                        <li><a id="abrirModal">PERGUNTAS E RESPOSTAS</a></li>
                        <!--<li><a href="#renegociometro">RENEGOCIÔMETRO</a></li>-->

                        <li><a href="#sectionSix">FALE COM O CONTADOR</a></li>
                        <li><a href="#sectionFive">LEI</a></li>
                        <li><a href="#tributaria">RENEGOCIAÇÃO TRIBUTÁRIA</a></li>
                        <li><a href="#sectionFour">DICAS</a></li>
                        <li><a href="#sectionThree">CAMPANHA</a></li>
                    </ul>
            </nav>
        </header>
        <div id="modalIframe" class="iziModal"></div>



<div class="modalDialog">
    <div id="close">X</div>
    <div>
            <p>
                <strong>Perguntas e respostas do Parcelamento Especial (Mutirão da Renegociação)</strong>
                <br> <br>
                A <strong>Lei Complementar nº 155/2016 - Crescer sem Medo</strong>, que altera a Lei Geral das Micro e Pequenas Empresas (Lei Complementar nº 123/2006), tem como um de seus principais pontos a ampliação de 60 meses para até 120 meses do parcelamento de dívidas tributárias do Simples Nacional (parcelamento especial). 
                <br><br>
                A regulamentação desse parcelamento especial foi feita no dia 12 de dezembro de 2016 e abre oportunidade para as micro e pequenas empresas parcelarem os débitos do Simples, com condições especiais, por um período de 90 dias. 
                <br><br>
                Para orientar você, empresário, com informações e orientações sobre o parcelamento especial, o Sebrae lançou o Mutirão da Renegociação.  
                <br><br>
                Pontos-chave do Parcelamento Especial:
                </p>
                        <p id="tab">
                        • Início da vigência a partir da publicação da Lei Complementar;<br><br>
                        • Regulamentação pelo Comitê Gestor do Simples Nacional;<br><br>
                        • Quantidade de parcelas ampliada para até 120 meses; <br><br>
                        • Prazo de 90 dias para adesão ao parcelamento especial, contados a partir da regulamentação do parcelamento<br>pelo Comitê Gestor do Simples Nacional (CGSN). Esse prazo poderá ser ampliado ou renovado pelo CGSN;<br> <br>
                        • Abrangência de débitos do Simples Nacional vencidos até a competência de maio de 2016;<br> <br>
                        • Parcela mínima de R$ 300,00 para microempresas e empresas de pequeno porte;<br> <br>
                        • O valor de cada prestação mensal será acrescido de juros equivalentes à SELIC + 1%.<br><br>
                        </p>
                <p>
                Tira-dúvidas:<br><br>
                <strong>O que é a renegociação de dívidas aprovada no projeto Crescer sem Medo?</strong>
                <br><br>
                A renegociação de dívidas consiste na possibilidade de parcelar em até 120 meses os débitos vencidos até a competência do mês de maio de 2016 apurados na forma do Simples Nacional.
                <br><br>
                <strong>Que empresas serão beneficiadas? </strong>
                <br><br>
                Microempresas e empresas de pequeno porte poderão participar, além de empresas em geral que tenham débitos apurados na forma do Simples Nacional e vencidos até a competência do mês de maio de 2016. É indiferente se a empresa hoje é optante do Simples Nacional ou se já foi excluída, pois o parcelamento é para débitos do Simples Nacional, não apenas para seus optantes atuais.
                <br><br>
                <strong>Quando a renegociação irá acontecer?</strong>
                <br><br>
                O parcelamento especial foi regulamentado no dia 12 de dezembro de 2016. Nesta data, abriu o prazo de 90 dias para adesão das micro e pequenas empresas, período que poderá ser ampliado ou renovado pelo Comitê Gestor do Simples Nacional (CGSN). Recomenda-se ao empresário que procure seu contador e regularize sua situação o mais breve possível, para garantir sua permanência no Simples Nacional.
                <br><br>
                O parcelamento especial está disponível no portal do Simples Nacional, e a adesão será feita por meio desse canal.
                <br><br>
                <strong>Como funcionará na prática? </strong>
                <br><br>
                O empresário deve fazer o pedido de parcelamento no <a href="(https://www8.receita.fazenda.gov.br/SimplesNacional/)">Portal do Simples Nacional.</a> O passo a passo é: Simples Serviços > Parcelamento > Parcelamento Especial – Simples Nacional. Recomendamos buscar orientação de seu contador neste processo.
                <br><br>
                Para saber mais, acesse:
                <br><br>
                <a href="https://www8.receita.fazenda.gov.br/SimplesNacional/Noticias/NoticiaCompleta.aspx?id=c9c681a4-875f-4b87-81ff-3ccc01b3cbd2">https://www8.receita.fazenda.gov.br/SimplesNacional/Noticias/NoticiaCompleta.aspx?id=c9c681a4-875f-4b87-81ff-3ccc01b3cbd2 </a>
                <br><br>
                <strong>Como ficará a situação do empresário que já tiver aderido a outros parcelamentos de dívidas tributárias?</strong>
                <br><br>
                Os débitos já parcelados na forma convencional podem ser reparcelados nesse período especial. O pedido do parcelamento especial implica na desistência compulsória e definitiva de parcelamento anterior.
                <br><br>
                <strong>Há algum tipo de restrição?</strong>
                <br><br>
                A restrição prevista no texto da lei é que sejam parcelados débitos abrangidos pelo Simples Nacional vencidos até a competência do mês de maio de 2016. Aplica-se aos créditos constituídos ou não, com exigibilidade suspensa ou não, parcelados ou não e inscritos ou não em dívida ativa.
                <br><br>
                Esse parcelamento não abrange débitos não recolhidos na forma do Simples Nacional com a Receita Federal do Brasil (RFB), Estados, Distrito Federal e Municípios (ex. IPTU, IPVA). Caso a empresa tenha sido notificada em relação a esses débitos deve procurar informações na Receita Estadual, Secretaria Municipal de Fazenda ou órgão competente.
                <br><br>
                A pessoa jurídica optante pelo Simples Nacional não pode ter débito, seja de natureza tributária ou de natureza não tributária, previdenciário ou não previdenciário, com as Fazendas Públicas Federal, Estaduais, do Distrito Federal ou Municípios, cuja exigibilidade não esteja suspensa.
                <br><br>
                Outro ponto de atenção é que o pedido de parcelamento de débitos que já estão em dívida ativa da União deverá ser solicitado junto à Procuradoria-Geral da Fazenda Nacional (PGFN), e não à Receita Federal do Brasil (nem por meio do Portal da RFB).
                <br><br>
                <strong>Como fica a situação das empresas devedoras optantes do Simples Nacional que não aderirem ao parcelamento?</strong>
                <br><br>
                As empresas optantes pelo Simples Nacional que possuem débitos com o fisco podem ser excluídas de ofício do Simples Nacional e/ou serem impedidas de aderir ao regime favorecido em Janeiro de 2017, estando sujeitas a uma carga tributária mais alta e obrigações mais complexas. Saiba mais no item 12 (“exclusão”):
                <br><a href="http://www8.receita.fazenda.gov.br/simplesnacional/Perguntas/Perguntas.aspx">http://www8.receita.fazenda.gov.br/simplesnacional/Perguntas/Perguntas.aspx</a>
                <br><br>
                O empresário que não se regularizar e for excluído em 1º de Janeiro de 2017 deve fazer o pedido do parcelamento especial e REGULARIZAR TODAS AS PENDÊNCIAS para fazer o pedido de opção pelo Simples Nacional somente na internet, por meio do Portal do Simples Nacional (em Simples Serviços > Opção > Solicitação de Opção pelo Simples Nacional), até o prazo final de 31 de Janeiro de 2017 (último dia útil de janeiro do ano que vem). Caso a opção seja deferida produz efeitos a partir do primeiro dia do ano-calendário da opção. Quanto antes o empresário se regularizar melhor!
                <br><br>
                <strong>Os microempreendedores individuais também poderão ter suas dívidas com a Receita Federal parceladas? </strong>
                <br><br>
                Não; neste momento, os microempreendedores individuais (MEI) não estão contemplados. A Receita Federal sinalizou que irá regulamentar o parcelamento do MEI em um momento futuro, em ato específico do Comitê Gestor do Simples Nacional.
                <br><br>
                <strong>Como o Sebrae poderá me ajudar?</strong>
                <br><br>
                Para motivar que os empresários de micro e pequenas empresas renegociem suas dívidas, o Sebrae lançou o Mutirão da Renegociação. Além do incentivo à adesão ao parcelamento dos débitos tributários, a ação orienta os donos de micro e pequenas empresas a procurar bancos, fornecedores e locatários para a quitação das dívidas.
                <br>
                Reforçamos que o empresário procure seu contador para verificar se foi notificado em relação aos débitos do Simples Nacional, débitos estaduais, do Distrito Federal, municípios, e se possui débitos com fornecedores, bancos e imobiliários, dentre outros. 
                É importante ainda avaliar a capacidade mensal da empresa para pagar dívidas, sem comprometer a continuidade de funcionamento do negócio.
            </p>
        </div>
    </div>



        <section id="sectionOne" class="parallax-window" data-parallax="scroll" data-image-src="images/imgHeader.jpg">
            <div id="logo">
                <img src="images/logoMutirao.png" alt="">
                <!--<h1>Mais prazo, menos aperto, simples assim</h1>-->
            </div>
             <div id="prazo">
                <img src="images/prazo.png" alt="">
            </div>
        </section>

        <section id="sectionTwo" class="parallax-window" data-parallax="scroll" data-image-src="images/bgSection02.jpg">


                <article >
                    <div>
                        <h1>Renegociar<br>é um bom negócio.</h1>
                    </div>
                    <div id="boxSection">
                        <p>Com a aprovação da Lei 155/2016, empresas que estão no Simples Nacional podem renegociar suas dívidas tributárias do Simples, com condições especiais, em até 120 meses.
 Aproveite esse momento para renegociar também débitos locatícios, com fornecedores e com bancos, e dar uma virada geral na sua empresa. <br>
                            <br>Faça o melhor negócio para sua empresa: participe do Mutirão da Renegociação.</p><p>Procure o seu contador</p>
                    </div>
                </article>
            </div>
        </section>

        <section id="sectionThree">
           <iframe width="100%" height="640" src="https://www.youtube.com/embed/GvrXIj0lgu0" frameborder="0" allowfullscreen></iframe>
        </section>
<!--/////////////////////////////////////////////////////////////   -->



<div class="sectionFour" id="sectionFour">
    <div class="sectionFourCenter">
        <div>
            <img src="images/titleDicas.png" class="title-img">
            <p class="infoDicas">
            Quem está planejando realizar uma negociação de dívidas precisa saber quais devem ser priorizadas e como garantir as melhores condições de pagamento.</p>
        </div>

        <ul class="menuSecundario">
        <li><a href="javascript:void(0)" onclick="openCity('dicas1',0, this)">Tributárias</a></li>
        <li><a href="javascript:void(0)" onclick="openCity('dicas2',1, this)">Bancárias</a></li>
        <li><a href="javascript:void(0)" onclick="openCity('dicas3',2, this)">De aluguel</a></li>
        <li><a href="javascript:void(0)" onclick="openCity('dicas4',3, this)">Com fornecedores</a></li>
        </ul>
<!--/////////////////////////////////////INICIO DE DICAS 1 /////////////////////////////////////-->
        <div id="dicas1" class="w3-container city">
            <div id="jssor_1">

            <div id="tabSlider" data-u="loading">
                <div class="tabSliderLoading"></div>
                <div class="loading"></div>
            </div>

            <div id="sliderFull" data-u="slides">
                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/tributaria/1.jpg">
                        </div>
                    <div data-u="thumb">Dica 01</div>
                </div>

                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/tributaria/2.jpg">
                    </div>
                    <div data-u="thumb">Dica 02</div>
                </div>
            </div>

            <div data-u="thumbnavigator" class="jssort12">
                <div class="slidesButtons" data-u="slides">
                    <div data-u="prototype" class="p">
                        <div class="w">
                            <div data-u="thumbnailtemplate" class="c"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<!--/////////////////////////////////////FIM DE DICAS 1 /////////////////////////////////////-->

<!--/////////////////////////////////////INICIO DE DICAS 2 /////////////////////////////////////-->
        <div id="dicas2" class="w3-container city">
            <div id="jssor_2">

            <div id="tabSlider" data-u="loading">
                <div class="tabSliderLoading"></div>
                <div class="loading"></div>
            </div>

            <div id="sliderFull" data-u="slides">
                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/bancaria/1.jpg">
                    </div>
                    <div data-u="thumb">Dica 01</div>
                </div>

                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/bancaria/2.jpg">
                    </div>
                    <div data-u="thumb">Dica 02</div>
                </div>

                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/bancaria/3.jpg">
                    </div>
                    <div data-u="thumb">Dica 03</div>
                </div>

                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/bancaria/4.jpg">
                    </div>
                <div data-u="thumb">Dica 04</div>
                </div>

                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/bancaria/5.jpg">
                    </div>
                <div data-u="thumb">Dica 05</div>
                </div>

                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/bancaria/6.jpg">
                    </div>
                    <div data-u="thumb">Dica 06</div>
                </div>

            </div>

            <div data-u="thumbnavigator" class="jssort12">
                <div class="slidesButtons" data-u="slides">
                    <div data-u="prototype" class="p">
                        <div class="w">
                            <div data-u="thumbnailtemplate" class="c"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<!--/////////////////////////////////////FIM DE DICAS 2 /////////////////////////////////////-->
<!--/////////////////////////////////////INICIO DE DICAS 3 /////////////////////////////////////-->
        <div id="dicas3" class="w3-container city">
            <div id="jssor_3">

            <div id="tabSlider" data-u="loading">
                <div class="tabSliderLoading"></div>
                <div class="loading"></div>
            </div>

            <div id="sliderFull" data-u="slides">
                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/aluguel/1.jpg">
                    </div>
                    <div data-u="thumb">Dica 01</div>
                </div>

                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/aluguel/2.jpg">
                    </div>
                    <div data-u="thumb">Dica 02</div>
                </div>

                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/aluguel/3.jpg">
                    </div>
                    <div data-u="thumb">Dica 03</div>
                </div>
                <div>
                    <div class="imgSlider">
                        <img src="images/dicas/aluguel/4.jpg">
                    </div>
                    <div data-u="thumb">Dica 04</div>
                </div>
            </div>

            <div data-u="thumbnavigator" class="jssort12">
                <div class="slidesButtons" data-u="slides">
                    <div data-u="prototype" class="p">
                        <div class="w">
                            <div data-u="thumbnailtemplate" class="c"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<!--/////////////////////////////////////FIM DE DICAS 3 /////////////////////////////////////-->
<!--/////////////////////////////////////INICIO DE DICAS 4 /////////////////////////////////////-->
        <div id="dicas4" class="w3-container city">
            <div id="jssor_4">

                <div id="tabSlider" data-u="loading">
                    <div class="tabSliderLoading"></div>
                    <div class="loading"></div>
                </div>

                <div id="sliderFull" data-u="slides">
                    <div>
                        <div class="imgSlider">
                            <img src="images/dicas/fornecedor/1.jpg">
                        </div>
                        <div data-u="thumb">Dica 01</div>
                    </div>

                    <div>
                        <div class="imgSlider">
                            <img src="images/dicas/fornecedor/2.jpg">
                        </div>
                        <div data-u="thumb">Dica 02</div>
                    </div>

                    <div>
                        <div class="imgSlider">
                            <img src="images/dicas/fornecedor/3.jpg">
                        </div>
                        <div data-u="thumb">Dica 03</div>
                    </div>
                </div>

                <div data-u="thumbnavigator" class="jssort12">
                    <div class="slidesButtons" data-u="slides">
                        <div data-u="prototype" class="p">
                            <div class="w">
                                <div data-u="thumbnailtemplate" class="c"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--/////////////////////////////////////FIM DE DICAS 4 /////////////////////////////////////-->



        <p>COMPARTILHE ESTA DICA:</p>
        <ul class="social-icons">
            <li id="btnFacebook"><img src="images/iconFacebook.png"/></li>
            <li id="btnTwitter"><img src="images/iconTwitter.png"/></li>
            <li id="btnWhatsapp"><img src="images/iconWhatsapp.png"/></li>
        </ul>
    </div>
</div>

<section id="sectionDicas">

    <div class="flexbox">
        <img src="images/titulo_videos.png" class="title-img">
    </div>


    <div class="slider">

        <div class="video">
            <iframe width="450" height="315" src="https://www.youtube.com/embed/HMMKY0U4hxE" frameborder="0" allowfullscreen></iframe>
        </div>
            <!--<div class="thumb" data-video="https://youtube.com/embed/HMMKY0U4hxE?autoplay=1" data-title="Dica 01">-->
            <!--</div>-->
            <!--<div class="legend">
                <h2>Dica 01:</h2>
                <p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque lium, totam rem aperiam, eaque ipsa quae.</p>
            </div>-->
        
        <div class="video">
            <iframe width="450" height="315" src="https://www.youtube.com/embed/lpfBCCjerDc" frameborder="0" allowfullscreen></iframe>
        </div>
            <!--<div class="thumb" data-video="https://youtube.com/embed/HMMKY0U4hxE?autoplay=1" data-title="Dica 02">-->
        
            <!--<div class="legend">
                <h2>Dica 02:</h2>
                <p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque lium, totam rem aperiam, eaque ipsa quae.</p>
            </div>-->
        <!--</div>-->
    </div>
</section>

        <!-- TEXTO RENEGOCIAÇÃO -->
<div id="tributaria">
    <h3 class="text-title">Renegociação Tributária</h3>
    <div class="comment more">
        Com a aprovação da Lei Complementar nº 155, de 2016, que alterou a Lei Complementar nº 123, de 2006, será aberto o parcelamento especial de débitos do Simples Nacional, com prazo de até 120 meses e parcela mínima no valor de R$ 300,00.
        <br><br>
        A Receita Federal já publicou a Instrução Normativa nº 1.670, que estabelece <strong>procedimentos preliminares</strong> referentes ao parcelamento do Simples Nacional, previsto no art. 9º da Lei Complementar nº 155, de 27 de outubro de 2016.
        <br><br>
        A opção prévia <strong>somente pode ser feita pelo contribuinte que foi notificado para exclusão do Simples Nacional em setembro de 2016, em relação aos débitos vencidos até a competência do mês de maio de 2016</strong>. A opção prévia permite que esses empresários se regularizem até a abertura do parcelamento definitivo. É importante lembrar que a opção prévia não dispensa a opção definitiva que deve ser feita assim que o parcelamento definitivo for aberto.

        <br><br>
        O contribuinte que foi notificado deve acessar o link que está disponível em mensagem encaminhada à Caixa Postal do contribuinte, no Portal do Simples Nacional, Serviços, Comunicações, Domicílio Tributário Eletrônico do Simples Nacional (DTE-SN), que pode ser acessado com código de acesso ou certificado digital: <a href="http://www8.receita.fazenda.gov.br/SIMPLESNACIONAL/Servicos/Grupo.aspx?grp=t&area=1" target="_blank">http://www8.receita.fazenda.gov.br/SIMPLESNACIONAL/Servicos/Grupo.aspx?grp=t&area=1</a>

        <br><br>
        Esse <strong>parcelamento não abrange débitos não recolhidos na forma do Simples Nacional com a RFB, estados, Distrito Federal e municípios (Ex.: IPTU, IPVA)</strong>. Caso a empresa tenha sido notificada em relação a esses débitos, deve procurar informações na Receita Estadual, Secretaria Municipal de Fazenda ou órgão competente.

        <br><br>
        A pessoa jurídica optante pelo Simples Nacional não pode ter débito, seja de natureza tributária ou não tributária, previdenciário ou não previdenciário, com as Fazendas Públicas federal, estaduais, do Distrito Federal ou municípios, cuja exigibilidade não esteja suspensa.

        <br><br>
        <strong>O parcelamento definitivo ainda não foi regulamentado</strong>. A previsão é de que isso aconteça no dia 12 de dezembro de 2016. A empresa que não foi notificada poderá aderir normalmente ao parcelamento. Quando for regulamentado, estará disponível no portal do Simples Nacional. A adesão será feita por meio desse canal.

        <br><br>
        A partir da regulamentação, o empresário terá 90 dias para solicitar a adesão. Caso tenha sido notificado, recomenda-se que regularize a situação o mais breve possível, a fim de garantir a permanência no Simples Nacional.
    </div>
</div>
        <!-- FIM TEXTO RENEGOCIAÇÃO -->


<!--/////////////////////////////////////////////////////////////   -->

        <section id="sectionFive">
            <div class="flexbox">
                <h1>Entenda A LEI</h1>
                <br><br>
                <h2>LEI COMPLEMENTAR Nº 155, DE 27 DE OUTUBRO DE 2016 (LCP 155/2016)</h2>
                <p>Também conhecido como Crescer Sem Medo, este Projeto de Lei tem como objetivo diminuir a burocracia e as dificuldades dos empresários que estão no Simples Nacional, criando condições para que os pequenos negócios cresçam e gerem mais emprego, renda e arrecadação.</p>
            </div>
            <div class="flexbox" id="linhaDivLei"></div>
            <div class="flexbox">
                <h3>conheça toda a lei:</h3>
                <a class="btn-download"  href="http://www.planalto.gov.br/ccivil_03/LEIS/LCP/Lcp155.htm" target="_blank">ACESSE AGORA</a>
            </div>

             <div class="flexbox">
                <br><br> <br><br>
                <h2>INSTRUÇÃO NORMATIVA DA RECEITA FEDERAL</h2>
                <p>Conheça a Instrução Normativa nº 1.670 da Receita Federal que estabelece procedimentos preliminares referentes ao parcelamento do Simples Nacional.</p>
                <br><br>
            </div>

            <div class="flexbox">
                <a class="btn-download"  href="http://idg.receita.fazenda.gov.br/noticias/ascom/2016/novembro/receita-estabelece-procedimentos-preliminares-para-parcelamento-de-debitos-do-simples-nacional" target="_blank">ACESSE AGORA</a>
            </div>

                  <div class="flexbox">
                <br><br> <br><br>
                <h2>Regulamentação do parcelamento previsto na LC 155 – 12/12/2016 </h2>
                <p>O Comitê Gestor do Simples Nacional regulamentou o parcelamento de débitos apurados no Simples Nacional em até 120 parcelas mensais. Conheça, na íntegra, a Resolução CGSN nº 132, que regulamenta o parcelamento previsto no art. 9º da Lei Complementar nº 155, de 27/12/2016.</p>
                <br><br>
            </div>

            <div class="flexbox">
                <a class="btn-download"  href="https://www8.receita.fazenda.gov.br/SimplesNacional/Noticias/NoticiaCompleta.aspx?id=c9c681a4-875f-4b87-81ff-3ccc01b3cbd2" target="_blank">ACESSE AGORA</a>
            </div>
        </section>

        <section id="sectionSix" class="parallax-window" data-parallax="scroll" data-image-src="images/bg-contador.png">
            <div>
                <div class="flexbox">
                    <!-- <h1>Fale com o seu</h1>
                    <h2>contador</h2> -->
                    <img src="images/titleContador.png" class="title-img">
                </div>
                 <!-- <div id="linhaDivContador"></div> -->
                <div class="flexbox contador">
                    <!--<img id="menina" src="images/menina.png"/>
                    <img id="senhor" src="images/senhor.png"/>-->
                    <p>Seu contador é um grande aliado no processo de renegociação. Converse com ele e veja o melhor plano para saldar as dívidas e manter o seu negócio.</p>
                </div>

            </div>
        </section>


        <!--<section id="renegociometro">-->
           <!--  <div class="legenda">Empresas participantes do mutirão de renegociação:</div>
            <div class="number">584.677</div>
            <br>
            <br>

            <div class="legenda">Valor total renegociado em reais:</div>
            <div class="number">21.356.082.521,69</div> -->
            <!--<img src="images/titleRenegociometro.png" class="title-img">
            <div class="flexbox reneg">
                <div class="block-hands">
                    <h4 class="numberReneg">584.677</h4> <br>
                    <p class="infoReneg">Empresas participantes do <br> Mutirão da Renegociação</p>
                </div>
                 <div class="block-pig">
                     <h4 class="numberReneg">R$ 21.356.082.521,69</h4> <br>
                     <p class="infoReneg">Valor total renegociado <br> em reais</p>
                 </div>
            </div>
        </section>-->

        <section id="sectionSeven">
            <div class="flexbox">
                <img src="images/titleFaleConosco.png" class="title-img">
            </div>

            <div class="faleConosco">
                <a class="btn-link" href="tel:+5508005700800">0800 570 0800</a>
                <a class="btn-link" href="http://www.sebrae.com.br/sites/PortalSebrae/sebraeaz/fale-com-um-especialista,0d8b0b019cfe5410VgnVCM1000003b74010aRCRD" target="_blank">Fale com um Especialista</a>
                <a class="btn-link" href="http://www.sebrae.com.br" target="_blank">Sebrae nos Estados</a>
            </div>

            <div class="logobox">
                    <img class="logoSebrae" src="images/logo-sebrae.png">
            </div>
        </section>

<footer>
            <div class="nav-footer">
                <nav class="flexbox menuFooter">
                    <ul>
                        <li><a href="http://www.sebrae.com.br/sites/PortalSebrae/canais_adicionais/conheca_quemsomos">Conheça o Sebrae</a></li>
                        <li><a href="http://www.sebrae.com.br/sites/PortalSebrae/canais_adicionais/o_que_fazemos">O que fazemos</a></li>
                        <li><a href="http://www.sebrae.com.br/sites/PortalSebrae/Orcamento">Transparência</a></li>
                        <li><a href="http://www.sebrae.com.br/sites/PortalSebrae/canais_adicionais/conheca_licitacoes">Licitações</a></li>
                        <li><a href="http://www.agenciasebrae.com.br/sites/asn">Agência Sebrae de Notícias</a></li>
                        <li><a href="http://www.sebrae.com.br/sites/PortalSebrae/sebraeaz/a-ouvidoria-sebrae,1f2ac80ded253510VgnVCM1000004c00210aRCRD">Ouvidoria</a></li>
                    </ul>
                </nav>
            </div>
            <div class="nav-bottom">
                <nav class="bottombox menuBottom">
                    <ul>
                        <li class="aboutUs"><a href="http://www.sebrae.com.br/sites/PortalSebrae/canais_adicionais/sebrae_english"><img src="images/eng.png" class="imgBottom">About us</a></li>
                        <li class="nosotros"><a href="http://www.sebrae.com.br/sites/PortalSebrae/canais_adicionais/sebrae_espanol"><img src="images/esp.png" class="imgBottom">Nosotros</a></li>
                        <li class="atendimento">Central de Atendimento:  0800 570 0800</li>
                        <li class="social"><a href="https://facebook.com/sebrae" target="_blank"><img src="images/facebook.png" class="socialIcons">/sebrae</a></li>
                        <li class="social"><a href="https://twitter.com/sebrae" target="_blank"><img src="images/twitter.png" class="socialIcons">@sebrae</a></li>
                        <!--<li><a href="#"><img src="images/acesso-rapido.png" class="acessoRapido"></a></li>-->
                    </ul>
                </nav>
            </div>
            <div>
            </div>
        </footer>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-88246954-1', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
</html>
