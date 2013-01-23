
			</section>

			<footer id="site-footer">
				<div class="container">

					<?php if(is_page(12) || is_single('56')){ ?>

					<?php } else { ?>

						<section id="footer-partner">
							<ul class="thumbnails">
								<li class="span4">
									<div class="thumbnail">
										<h4>Realização</h4>
										<a href="http://www.cdi.org.br/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/logos/cdilan.png" /></a>
										<a href="http://www.cdilan.com.br/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/logos/cdi.png" /></a>
									</div>
								</li>
								<li class="span8">
									<div class="thumbnail">
										<h4>Patrocínio</h4>
										<a href="http://www.iobconcursos.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/logos/iob.png" /></a>
										<a href="http://www.mercadolivre.com.br/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/logos/mercadolivre.png" /></a>
									</div>
								</li>
								<li class="span12">
									<div class="thumbnail">
										<h4>Parceiros</h4>
										<a href="http://game.cdilan.com.br/logo-conectalunos-final-2" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/logos/conectalunos.png" /></a>
										<a href="#" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/logos/luz.png" /></a>
									</div>
								</li>
						</section>

					<?php } ?>

					<section id="footer-menu">
						<ul class="nav nav-pills pull-right">
							<?php wp_nav_menu(array('theme_location' => 'footermenu', 'container' => false, 'items_wrap' => '%3$s', 'menu_id' => 'top-nav')); ?>
			                <?php if(is_user_logged_in()) : ?>
			                    <li class="logout"><a href="<?php echo wp_logout_url(); ?>" title="Logout" class=>Sair</a></li>
			                <?php endif; ?>
			            </ul>
			        </section>
		        </div>
			</footer>
		<?php wp_footer(); ?>
	</body>
</html>