<head> 
<?php 
    get_header(); 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $db = new db_galeria_artista_dao();
        $data_galeria = $db->get(
            'wp_galerias',
            array(
                'select' => '*',
                'campo'  => 'id',
                'id'     => $id
            )
        );

        $data_eventos = $db->get(
            'wp_galeria_eventos',
            array(
                'select' => '*',
                'campo'  => 'id_galeria',
                'id' => $id
            )
        );

    }else{
        $data_galeria = null;
        $data_galeria = null;
    }
    $page_index = 'eventos';
?>
</head>

<div class="container">

        
    <div class="row">
        <div class="col-lg-12 galeria_menu_container">
            <?php galeria_menu(); ?> 
        </div>
    </div>

    <?php galeria_logo($data_galeria); ?>

    <div class='col-lg-12 galeria_menu_interno_container'>
        <?php  galeria_menu_interno($page_index); ?>
    </div>
    
    <div class="row">
        <?php galeria_evento_destaque($data_eventos); ?>
    </div>

    <div class="row">
        <h4>Eventos que já aconteceram</h4>
        <?php galeria_eventos_lista($data_eventos); ?>
    </div>
</div>

<?php get_footer(); ?> 