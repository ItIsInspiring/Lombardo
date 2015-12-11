<section id="intro">
    <div id="splash" class="text-center">
        <h1>Alberto Lombardo</h1>
        <p>Auteur | Comédien | Animateur</p>
        
        <a href="#about" class="scroll-bas">Cliquez pour descendre</a>
    </div>  
</section>

<div data-magellan-expedition="fixed">
    <nav class="top-bar contain-to-grid" data-topbar>
        

      <section class="top-bar-section">

       <!-- LOGO Section -->
        <ul class="title-area">
            <li class="name"><h1><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1> </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        
        <!-- MENU -->
         <?php
            $defaults = array(
                'theme_location'  => '',
                'menu'            => 'Menu 1',
                'container'       => 'div',
                'container_class' => 'main-menu',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => 'menu_principal',
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
        </section>    

    </nav>
</div>
 

 