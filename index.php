<?php get_template_part('templates/page', 'header'); ?>

<div class="section-deco"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco.svg"></div>
<section id="about" class="section-content">
    <div class="row">
        <h2 id="#about" class="title center text-center">
        <span>
        <?php
        $post_6 = get_post( 6 ); 
        $title = $post_6->post_title;
        echo $title;    
        ?>
        </span>
        </h2>
        <div class="large-12 columns">
            <p class="chapeau">Son théâtre est un théâtre du dire. Le dire comme une urgence, un acte, une revendication physique. Il écrit des pièces sur les relations humaines, amoureuses, familiales, sur l'identité, la transformation, l’engagement, le désir, le sexe et la spiritualité.</p>
        </div>
        
        <div class="row">
            <div class="large-6 columns">
                <p>Sociétaire à la SACD et membre des EAT (écrivains associés du théâtre), Alberto Lombardo a suivi une formation théâtrale de comédien au conservatoire d'art dramatique de Lyon et aux Ateliers Antoine Vitez au Théâtre National de Chaillot à Paris. Ses rencontres avec Jean-Claude de Feugas et Bruno Sachel, concrétisent son désir d’écrire et toutes les voix qui résonnent en lui depuis l'enfance prennent enfin corps.</p>
            </div>
            <div class="large-6 columns">
                <p>Ses pièces sont jouées en France et à l'étranger (Italie, Allemagne, Espagne Roumanie, Liban, USA, Montréal). Elles sont éditées aux éditions Art et comédie et l’Harmattan. Ses fictions radiophoniques sont diffusées sur France Inter et France Culture.</p>
            </div>
        </div>
        <!-- fin de row -->
        
        <div class="row">
            <h3 class="text-center">Alberto est à la fois...</h3>
            <ul class="li_skills inline-list ">
                <li><a href="/a-propos/auteur/">Auteur</a></li>
                <li><a href="/a-propos/comedien/">Comédien</a></li>
                <li><a href="/a-propos/animateur/">Animateur</a></li>
            </ul>
        </div>
        <!-- fin de row -->    
        
    </div>
</section>

<div class="section-deco">
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco1.svg"/>    
</div>

<section id="news" class="section-content">
    <div class="row">
        <h2 id="events" class="title text-center">
        <span>
        <?php
        $post_16 = get_post(16); 
        $title = $post_16->post_title;
        echo $title;    
        ?>
        </span>
        </h2>
        <div class="medium-6 large-6 columns">
            <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('home-events') ) ?>
        </div>
        <div class="medium-6 large-6 columns">
            <p class="chapeau">Alberto recherche une troupe de théâtre pour construire un projet en tant qu’auteur.</p>
            <p class="chapeau">N’hésitez pas à le <a href="#contact">contacter</a>.</p>
        </div>
    </div>
</section>

<div class="section-deco" >
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco2.svg"/>    
</div>

<section id="gallery" class="section-content">
    <div class="row">
        <h2 id="gallery" class="title text-center">
        <span>
        <?php
        $post_14 = get_post( 14 ); 
        $title = $post_14->post_title;
        echo $title;    
        ?> 
        </span>
        </h2>
        <div class="large-12 columns">
            <?php 
                $terms = get_terms("Compétences"); 
                $count = count($terms); 
                echo '<ul id="portfolio-filter" class="filter inline-list">'; 
                echo '<li class="active-tag"><a href="#all" data-filter="*" title="Tout" class="ghost-btn">Tout</a></li>'; 
                if ( $count > 0 ) { 
                    foreach ( $terms as $term ) { 
                        $termname = ($term->slug); 
                        echo ' <li><a href="#'.$termname.'" title="" data-filter=".'.$termname.'" class="ghost-btn" rel="'.$termname.'">'.$term->name.'</a></li>'; 
                    } 
                } 
                echo "</ul>"; 
            ?>    
            
             <div id="portfolio-list" class="grid thumbnails isotope">
    
                    <?php 
                    $args = array(
                      'post_type' => 'Projet',
                       /*'meta_key' => 'date_de_creation',
				  	'orderby' => 'meta_value_num',
				  	'order' => 'DESC'
                      'tax_query' => array(
                           array(
                              'taxonomy' => 'cat_dintervention',
                              'field' => 'slug',
                              'terms' => $maCatSlug,
                                )
                            )*/
                        );
                    
                    // The Query
                    $the_query = new WP_Query( $args );
                    
                    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
    
                        <figure id="post-<?php the_ID(); ?>" 
                        
                        class="effect-sarah <?php
                        $taxonomy="Compétences";	
                        $terms = get_the_terms( $post->ID, $taxonomy );
                        $mesCat=" " ;
                        if( !empty( $terms ) ) {
                            foreach( $terms as $order => $term ) {
                                echo $term->slug;
                                /*if( !in_array( $term->slug, $classes ) ) {
                                    $classes[] = $term->slug;
                                }*/
                            }
                        }
                        /*return $classes;*/
                         ?>" role="article">
                           
                            <span></span>
                                <figcaption>   
                                    <h2 class="p-titre"><?php the_title() ?></h2>
                                    <a href="<?php the_permalink() ?>" title="Voir le projet : <?php the_title() ?>" >Voir le projet</a>
                                </figcaption>
                            </figure><!-- fin de box -->
    
                                
                    <?php endwhile; ?> 
    
                    <?php else : ?>
    
                        <article id="post-not-found">
                            <header>
                                <h1>Il n'y a pas d'intervention pour le moment.</h1>
                            </header>
    
                            <section class="post_content">
                                <p>Merci.</p>
                            </section>
                        </article>
    
                    <?php endif; ?>
            </div><!-- .grid -->
        </div>
    </div>
</section>

<div class="section-deco" >
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco3.svg"/>    
</div>

<section id="contact" class="section-content">
    <div class="row ">
        <h2 id="contact" class="title text-center">
        <span>
        <?php
        $post_8 = get_post( 8 ); 
        $title = $post_8->post_title;
        echo $title;    
        ?>
        </span>
        </h2>
        <div class="medium-6 medium-centered large-6 large-centered columns">
            <?php 
                $page_id = 8; 
                $queried_post = get_post($page_id); 
                $content = $queried_post->post_content; 

		        $content = apply_filters( 'the_content', $content );
                echo $content;
            ?>
        </div>
    </div>
</section>
<div class="section-deco"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco.svg"></div>

<?php get_template_part('templates/page', 'footer'); ?>