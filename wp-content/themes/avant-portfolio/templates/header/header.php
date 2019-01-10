<?php if ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-six' ) : ?>
	
	<?php get_template_part( '/templates/header/header-layout-six' ); ?>
	
<?php elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-five' ) : ?>
	
	<?php get_template_part( '/templates/header/header-layout-five' ); ?>
	
<?php elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-four' ) : ?>
	
	<?php get_template_part( '/templates/header/header-layout-four' ); ?>
	
<?php elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-three' ) : ?>
	
	<?php get_template_part( '/templates/header/header-layout-three' ); ?>
	
<?php elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-two' ) : ?>
	
	<?php get_template_part( '/templates/header/header-layout-two' ); ?>

<?php elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-one' ) : ?>
	
	<?php get_template_part( '/templates/header/header-layout-one' ); ?>
	
<?php else : ?>
	
	<?php get_template_part( '/templates/header/header-layout-seven' ); ?>
	
<?php endif; // Site Header ?>