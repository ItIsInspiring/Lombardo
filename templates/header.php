<div id="small-menu" class="fixed show-for-small-only ">
     <nav class="top-bar " data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="#">Alberto Lombardo</a></h1>
        </li>
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>
    <?php

    $defaults = array(
        'theme_location'  => '',
        'menu'            => '',
        'container'       => 'nav',
        'container_class' => 'top-bar-section',
        'container_id'    => '',
        'menu_class'      => 'menu ',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
    );

    wp_nav_menu( $defaults );

    ?>
    </nav>
</div>
   
<?php
    if(is_home()){
?>
    <section id="intro" data-magellan-destination="top">
        <a name="intro" class="hidden-a"></a>
        <div id="splash" class="text-center">
            <h1>Alberto<br/>Lombardo</h1>
            <p>Auteur | Comédien | Animateur</p>

            <a href="#about" class="scroll-bas">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/btn_fleche.svg ">
            </a>
        </div>  
    </section>
<?php
    }
?>

<nav class="main-menu1 show-for-medium-up ">
    <div data-magellan-expedition="fixed">
        <dl class="sub-nav">
            <dd data-magellan-arrival="about"><a href="/#about">À propos</a></dd>
            <dd class="menu-lozange "><span>&loz;</span></dd>
            <dd data-magellan-arrival="gallery"><a href="/#gallery">Galerie</a></dd>
            <dd class="menu-lozange"><span>&loz;</span></dd>
            <dd data-magellan-arrival="top" class=""><a href="/#intro" class="title-area">Alberto Lombardo</a></dd>
            <dd class="menu-lozange"><span>&loz;</span></dd>
            <dd data-magellan-arrival="news"><a href="/#news">À venir</a></dd>
            <dd class="menu-lozange"><span>&loz;</span></dd>
            <dd data-magellan-arrival="contact"><a href="/#contact">Contact</a></dd>
        </dl>
    </div>
</nav>


