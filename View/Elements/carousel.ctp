<div class="body">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
	<?php
		foreach($carousels as $k=>$carousel){
			$class = '';
			if($k == 0){
				$class = ' active';
			}
	?>
			<div class="item <?php echo $class;?>">
				<div class="row carousel-row">
					<div class="span3">
						<?php echo $this->Html->link($this->Html->image('carousels/'.$carousel['Carousel']['image']), $carousel['Carousel']['url'], array('escape'=>false)); ?>
					</div>
					<div class="span4 carousel-caption">
						<h2><?php echo $carousel['Carousel']['title']; ?></h2>
						<?php echo $carousel['Carousel']['body']; ?>
						<span class='st_facebook' displayText=''></span><span class='st_twitter' displayText=''></span><span class='st_email' displayText=''></span>
					</div>
				</div>
				</div>
	<?php
		}
	?>
		</div>
		<div class="row">
			<div class="span1 offset6 carousel-controls">
				<a class="right carousel-control" href="#myCarousel" data-slide="prev">&lt;</a>|<a class="right carousel-control" href="#myCarousel" data-slide="next">&gt;</a>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.carousel').carousel({
			interval: <?php echo Configure::read('Carousel.carousel_rotation_interval')*1000 ?>
		});
	});
</script>