<?php
/**
 * Template Name: Compétence
 */
?>


<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    <div class="medium-12 columns">
    <header>
      <h1 class="entry-title uppercase"><?php the_title(); ?><span class="trait-lozanges"></span></h1>
    </header>
    
    <div class="entry-content row">
         <aside id="competence-infos" class="small-10 small-centered medium-4 medium-uncentered columns">
             <h3>Projets concernés : </h3>
             <?php
                $competence = $post->post_name ;
                $args= array(
                    'post_type' => 'projet',
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
          <div id="Comptence-main-content" class="small-10 small-centered medium-8 medium-uncentered columns">
              <?php the_content(); ?>
          </div>
    </div>

        
    <section class="related-projects row" >
       <div>
           
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
            
            <ul class="row">
               <?php
                    $competence = $post->post_name ;
                    $args_related= array(
                        'post_type' => 'projet',
                        'order' => 'ASC',
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'Compétences',
                                'field' => 'slug',
                                'terms' => $competence,
                            )
                        )
                    );

                    // The Query
                    $the_query_related = new WP_Query( $args_related );
                    if ( $the_query_related->have_posts() ) {
                         while ( $the_query_related->have_posts() ) {
                            $the_query_related->the_post();
                    ?>

                        <li class="small-centered small-10  medium-4 medium-uncentered columns">
                          <div class="wrapper-related">
                               <a href="<?php the_permalink() ?>"  >
                                    <h4><?php the_title(); ?></h4>
                                    <span>
                                    <?php
                                        $infosprojet = get_post_meta($post->ID, 'projet_duree', true);
                                        foreach($infosprojet as $infoprojet){
                                            echo $infoprojet['annee-de-creation'];
                                        }
                                    ?>
                                    </span>
                                </a>
                            </div>
                        </li>

                        <?php
                         } /* fin de while */
                      } else {
                            // no posts found
                            echo "<li>Il n'y a pas de projet dans cette catégorie pour le moment.</li>";
                      }/* fin de if */
                    /* Restore original Post Data */
                    wp_reset_postdata();
                 ?>
            </ul>
        
        </div>
    </section>
    </div>
 </article>
                                           
<div class="last-section-deco"></div>
                                               
<?php endwhile; ?>
