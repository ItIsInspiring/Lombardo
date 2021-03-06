<?php get_template_part('templates/page', 'header'); ?>

<section id="animation" class="show-for-medium-up">
   
   <div id="los_small" data-enllax-ratio="0.95"></div>
   <div id="los_medium" data-enllax-ratio="0.80"></div>
   <div id="los_large" data-enllax-ratio="0.55"></div>
   
   <div id="wrapper_images">
       <div id="image1"></div>
       <div id="image2"></div>
       <div id="image3"></div>
   </div>
   
   <div id="anim_color"></div>
   
</section>

<div class="section-content-haut"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco.svg"></div>

<section id="about" class="section-content" data-magellan-destination="about">
    <a name="about" class="hidden-a"></a>
    
    <div class="row">
        <div class="small-12 medium-12 columns">
            <h2 class="title center text-center">
                <?php
                $post_6 = get_post( 6 ); 
                $title = $post_6->post_title;
                echo $title;    
                ?>
            </h2>
            <span class="trait-lozanges"></span>
        </div>    
    </div> 
    
    <div class="row">   
        <div class="small-11 small-centered medium-12 medium-centered columns">
            <p class="chapeau text-center">Son théâtre est un théâtre du dire. Le dire comme une urgence, un acte, une revendication physique. Il écrit des pièces sur les relations humaines, amoureuses, familiales, sur l'identité, la transformation, l’engagement, le désir, le sexe et la spiritualité.</p>
        </div>
    </div>  
    <!-- fin de row -->  
          
    <div class="row">
        <div class="small-10 small-centered medium-6 medium-uncentered columns">
            <p>Sociétaire à la SACD et membre des EAT (écrivains associés du théâtre), Alberto Lombardo a suivi une formation théâtrale de comédien au conservatoire d'art dramatique de Lyon et aux Ateliers Antoine Vitez au Théâtre National de Chaillot à Paris. Ses rencontres avec Jean-Claude de Feugas et Bruno Sachel, concrétisent son désir d’écrire et toutes les voix qui résonnent en lui depuis l'enfance prennent enfin corps.</p>
        </div>
        
        <div class="small-10 small-centered medium-6 medium-uncentered columns">
            <p>Ses pièces sont jouées en France et à l'étranger (Italie, Allemagne, Espagne Roumanie, Liban, USA, Montréal). Elles sont éditées aux éditions Art et comédie et l’Harmattan. Ses fictions radiophoniques sont diffusées sur France Inter et France Culture.</p>
        </div>
    </div>
    <!-- fin de row -->
                   
    <div class="row">
        <h3 class="text-center small-12 medium-12">Alberto est à la fois...</h3>
            
        <ul class="list_skills row">
            <li class="medium-4 columns"><a href="/a-propos/auteur/">Auteur<br/><span>+</span></a></li>
            <li class="medium-4 columns"><a href="/a-propos/comedien/" >Comédien<br/><span>+</span></a></li>
            <li class="medium-4 columns"><a href="/a-propos/animateur/" >Animateur<br/><span>+</span></a></li>
        </ul>
        <!-- fin de row -->  
    </div>               
                    
</section>

<div class="section-deco" data-enllax-ratio="0.55">
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco1.svg"/>    
</div>

<section id="gallery" class="section-content" data-magellan-destination="gallery">
   <a name="gallery" class="hidden-a"></a>
    <div class="row">
        
        <h2 class="title text-center">
        <?php
        $post_14 = get_post( 14 ); 
        $title = $post_14->post_title;
        echo $title;    
        ?> 
        </h2>
        
        <span class="trait-lozanges"></span>
        
        <?php 
            $terms = get_terms("Compétences"); 
            $count = count($terms); 
            echo '<ul class="menu-filter portfolioFilter">'; 
            echo '<li><a href="#all" data-filter="*" title="Tout" class="active">Tout</a></li>'; 
            if ( $count > 0 ) { 
                foreach ( $terms as $term ) { 
                    $termname = ($term->slug); 
                    echo ' <li><a href="#'.$termname.'" title="" data-filter=".'.$termname.'" rel="'.$termname.'">'.$term->name.'</a></li>'; 
                } 
            } 
            echo "</ul>"; 
        ?>    
            
        <div class="portfolioContainer">

                <?php 
                $args = array(
                  'post_type' => 'Projet',
                    'posts_per_page' => -1,
                    
                    'order' => 'ASC',

                    );

                // The Query
                $the_query = new WP_Query( $args );

                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <div id="post-<?php the_ID(); ?>" class="home-page-projet entry <?php
                    $taxonomy="Compétences";	
                    $terms = get_the_terms( $post->ID, $taxonomy );
                    $mesCat="" ;
                    if( !empty( $terms ) ) {
                        foreach( $terms as $order => $term ) {
                            echo $term->slug." ";
                            /*if( !in_array( $term->slug, $classes ) ) {
                                $classes[] = $term->slug;
                            }*/
                        }
                    }
                    /*return $classes;*/
                     ?>" role="article">
                    <a href="<?php the_permalink() ?>" title="Voir le projet : <?php the_title() ?>" >
                        <div class="projet_desc">   
                            <h2 class="projet_titre"><?php the_title() ?></h2>
                        </div>
                    </a>    
                </div><!-- fin de projet -->
            <?php endwhile; ?> 

            <?php else : ?>
                <article id="post-not-found">
                    <header><h1>Il n'y a pas d'intervention pour le moment.</h1></header>
                    <section class="post_content"><p>Merci.</p></section>
                </article>
            <?php endif; ?>
                
        </div><!-- .grid -->
        
    </div><!--* fin de row -->
</section>


<div class="section-deco"  data-enllax-ratio="0.55" >
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco2.svg"/>    
</div>

<section id="news" class="section-content" data-magellan-destination="news">
   <a name="news" class="hidden-a"></a>
    <div class="row">
        <h2 id="events" class="title text-center">
            <?php
            $post_16 = get_post(16); 
            $title = $post_16->post_title;
            echo $title;    
            ?>
        </h2>
        
        <span class="trait-lozanges"></span>
        
        <div class="medium-6 large-6 columns">
            <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('home-events') ) ?>
        </div>
        
        <div class="col-event-right medium-6 large-6 columns text-left">
            <div class="chapeau">
                <p>Alberto recherche une troupe de théâtre pour construire un projet en tant qu’auteur.<br/></br/>N’hésitez pas à le <a href="#contact">contacter</a>.</p>
            </div>
        </div>
        
    </div>
</section>

<div class="section-deco"  data-enllax-ratio="0.55" >
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco3.svg"/>    
</div>

<section id="contact" class="section-content" data-magellan-destination="contact">
   <a name="contact" class="hidden-a"></a>
    <div class="row ">
        <h2 class="title text-center">
        
        <?php
        $post_8 = get_post( 8 ); 
        $title = $post_8->post_title;
        echo $title;    
        ?>
        
        </h2>
        <span class="trait-lozanges"></span>
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
<div class="last-section-deco"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco.svg" class=" rotate180"></div>

<?php get_template_part('templates/page', 'footer'); ?>