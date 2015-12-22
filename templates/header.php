<?php
    if(is_home()){
?>
    <section id="intro">
        <div id="splash" class="text-center">
            <h1>Alberto Lombardo</h1>
            <p>Auteur | Comédien | Animateur</p>

            <a href="#about" class="scroll-bas">Cliquez pour descendre</a>
        </div>  
    </section>
<?php
    }
?>

<nav class="show-for-medium-up">
    <div data-magellan-expedition="fixed">
        <dl class="sub-nav">
            <dd data-magellan-arrival="about"><a href="#about">À propos</a></dd>
            <dd data-magellan-arrival="gallery"><a href="#gallery">Galerie</a></dd>
            <dd data-magellan-arrival="top"><a href="#top">Alberto Lombardo</a></dd>
            <dd data-magellan-arrival="news"><a href="#news">À venir</a></dd>
            <dd data-magellan-arrival="contact"><a href="#contact">Contact</a></dd>
        </dl>
    </div>
</nav>

<div class="contain-to-grid sticky">
    <nav class="top-bar show-for-small-only" data-topbar role="navigation" data-options="sticky_on: small">
      <ul class="title-area">
        <li class="name">
          <h1><a href="#">My Site</a></h1>
        </li>
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <?php

    $defaults = array(
        'theme_location'  => '',
        'menu'            => '',
        'container'       => 'section',
        'container_class' => 'top-bar-section',
        'container_id'    => '',
        'menu_class'      => 'menu',
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