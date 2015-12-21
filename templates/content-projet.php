<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    <div class="small-10 small-centered medium-12 columns">

    <header>
      <h1 class="entry-title uppercase"><?php the_title(); ?><span class="trait-lozanges"></span></h1>
        <nav class="nav-contribs">
            <ul class="row">
            <li><?php previous_post_link(); ?></li>
            <li> | </li>
            <li><?php next_post_link(); ?></li>
            </ul>
        </nav>
    </header>
    
    <div class="entry-content row">
         
           <aside id="projet-infos" class="medium-4 columns">
                <?php
                    $terms = get_the_terms( $post->ID, 'Compétences' );
                    if ( $terms && ! is_wp_error( $terms ) ) : 
                        $draught_links = array();
                        foreach ( $terms as $term ) {
                            $draught_links[] = '<a href="/a-propos/'.$term->slug .'" title="voir la page '. $term->name .'">'.$term->name .'</a>';
                        }
                        $on_draught = join( " et ", $draught_links );
                    ?>
                    <p><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?></p>
                    <p>Sur ce projet, Alberto a participé en tant que&nbsp;: <?php echo $on_draught; ?>.</p>
                <?php endif; ?>

                <ul id="list_infosProjet">
                    <?php 
                    $infosProjet = get_post_meta( $post->ID, 'infosProjet', true ); 
                    foreach( $infosProjet as $infoProjet){
                       if($infoProjet['annee-de-creation'] != null) echo " <li><strong>Date de création :</strong> ". $infoProjet['annee-de-creation'] . '</li>';
                       if($infoProjet['duree'] != null) echo " <li><strong>Durée :</strong> ". $infoProjet['duree'] . '</li>';
                       if($infoProjet['personnages'] != null) echo " <li><strong>Personnage(s) :</strong> ". $infoProjet['personnages'] . '</li>';
                       if($infoProjet['equipe'] != null) echo " <li><strong>Équipe :</strong> ". $infoProjet['equipe'] . '</li>';   
                    //echo $key . ' : ' . $val[0] . '<br/>';
                    } 
                    
                    
                   
                    ?>
                </ul>

             </aside>

             <div id="projet-main-content" class="medium-8 columns">
                   <p class="chapeau"><?php echo $infoProjet['synopsis'] ?></p>
                    <?php the_content(); ?>
             </div><!-- fin de #projet-main-content -->
          
    </div><!-- fin de entry-content -->  
         
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      <?php
            $defaults = array(
                'before'           => '<p>' . __( 'Pages:' ),
                'after'            => '</p>',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'number',
                'separator'        => ' ',
                'nextpagelink'     => __( 'Next page' ),
                'previouspagelink' => __( 'Previous page' ),
                'pagelink'         => '%',
                'echo'             => 1
            );

                wp_link_pages( $defaults );

        ?>
    </footer>
    
    </div><!-- fin de small-10 -->
    

    
  </article>
  
  <section class="related-projects row" >
       <div>
           
            <h3 class="text-center">Autres projets liés</h3>
            
            <ul class="row">
               <?php
                    
                    $terms = get_the_terms( $post->ID, 'Compétences' );
                    
                
						
                    if ( $terms && ! is_wp_error( $terms ) ) : 

                        $draught_links = array();

                        foreach ( $terms as $term ) {
                            $draught_links[] = $term->slug;
                        }

                        $on_draught = join( ", ", $draught_links );
                
                    endif;
                    
                    //echo "mon test : " . $on_draught;


                    $args_related= array(
                        'post_type' => 'projet',
                        'order' => 'ASC',
                        'posts_per_page' => 3,
                        'post__not_in' => array($post->ID),
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
                                    <?php the_cfc_field('my_meta_name', 'duree'); ?>
                                    </span>
                                </a>
                            </div>
                        </li>

                        <?php
                         } /* fin de while */
                      } else {
                            // no posts found
                            echo "<li style='width:100%; display:table;'><p style='display:table-cell; vertical-align:middle'>Il n'y a pas de projet lié pour le moment.</p></li>";
                      }/* fin de if */
                    /* Restore original Post Data */
                    wp_reset_postdata();
                 ?>
            </ul>
        
        </div>
    </section>
 
  <div id="wrapper-comments">
      <div class="row">
          <div class="small-10 medium-10 small-centered columns">
              <?php comments_template('/templates/comments.php'); ?>
          </div>  
      </div>
  </div>
                                              
<div class="last-section-deco"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco-projet.svg" class=" rotate180"></div>
                                               
<?php endwhile; ?>
