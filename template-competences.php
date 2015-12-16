<?php
/**
 * Template Name: Compétence
 */
?>


<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    
    <header>
      <h1 class="entry-title uppercase"><?php the_title(); ?><span class="trait-lozanges"></span></h1>
    </header>
    
    <div class="entry-content row">
         <aside id="competence-infos" class=" medium-4 columns">
             <h3>Projets concernés : </h3>
             <?php
                $competence = $post->post_name ;
                $args= array(
                    'post_type' => 'projet',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'Compétences',
                            'field' => 'slug',
                            'terms' => $competence,
                        )
                    )
				    
                );
             
                // The Query
                $the_query = new WP_Query( $args );

                // The Loop
                if ( $the_query->have_posts() ) {
                    echo '<ul>';
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                       ?>
                       
                       <li><a href="<?php the_permalink() ?>" title="voir le projet <?php the_title(); ?>"><?php echo the_title(); ?></a></li>
                       
                       <?php
                    }
                    echo '</ul>';
                } else {
                    // no posts found
                    echo "<li>Il n'y a pas de projet dans cette catégorie pour le moment.</li>";
                }
                /* Restore original Post Data */
                wp_reset_postdata();
             ?>
         </aside>    
          <div id="Comptence-main-content" class=" medium-8 columns">
              <?php the_content(); ?>
          </div>
    </div>

        
    <section class="related-projects row" >
        <h3 class="text-center"><?php 
            /* récupérer le titre de la page*/  
            if(is_page( 'Comédien' )){
                echo "Alberto a joué dans...";
            } elseif(is_page( 'Auteur' )){
                echo "Alberto a écrit dans...";
            } elseif(is_page( 'Animateur' )){
                echo "Alberto est intervenu dans...";
            }
        ?>    
        </h3>
        <ul>
           <?php
               $competence = $post->post_name ;
                $args= array(
                    'post_type' => 'projet',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'Compétences',
                            'field' => 'slug',
                            'terms' => $competence,
                        )
                    )
				    
                );
             
                // The Query
                $the_query = new WP_Query( $args );
            ?>
            <li>
               <a href="">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/vignette.jpg" alt="description de la vignette"/>
                    <h4>Titre de la pièce</h4>
                    <span>juin 2014</span>
                </a>
            </li>
            <li>
               <a href="">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/vignette.jpg" alt="description de la vignette"/>
                    <h4>Titre de la pièce</h4>
                    <span>juin 2014</span>
                </a>
            </li>
            <li>
               <a href="">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/vignette.jpg" alt="description de la vignette"/>
                    <h4>Titre de la pièce</h4>
                    <span>juin 2014</span>
                </a>
            </li>
        </ul>
    </section>
    
 </article>
                                           
<div class="last-section-deco"></div>
                                               
<?php endwhile; ?>
