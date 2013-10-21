<?php

$this->extend('/Common/admin_edit');


$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Carousels'), array('controller' => 'carousels', 'action' => 'index'))
	;

if (!empty($this->data['Carousels']['id'])) {
	$crumb = $this->data['Carousels']['title'];
} else {
	$crumb = __('Add');
}
$this->Html->addCrumb($crumb, $this->here);

?>

<?php $this->start('actions'); ?>
	<?php echo $this->Html->link(__('Back'), array('action'=>'index'), array('button' => 'default')); ?>
<?php $this->end(); ?>

<?php echo $this->Form->create('Carousel');?>
<div class="row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
			<li><a href="#site-basic" data-toggle="tab"><?php echo __('Carousel'); ?></a></li>
			<?php echo $this->Croogo->adminTabs(); ?>
		</ul>

		<div class="tab-content">
			<div id="site-basic" class="tab-pane">
		  	<?php
				$this->Form->inputDefaults(array(
					'label' => false,
					'class' => 'span10',
					'placeholder' => true,
				));
				echo $this->Form->input('id'); 
				echo $this->Form->input('title');
				echo $this->Form->input('start_date');
				echo $this->Form->input('end_date');
				echo $this->Form->input('image');
				echo $this->Form->input('body');
				echo $this->Form->input('url', array('type'=>'text'));
				echo $this->Form->input('weight');
			?>

			<?php echo $this->Layout->adminTabs(); ?>
		</div>
		</div>
	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__('Publishing')) .
			$this->Form->button(__('Apply'), array('name' => 'apply', 'class' => 'btn')) .
			$this->Form->button(__('Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'cancel btn btn-danger'));

		echo $this->Html->endBox();

		echo $this->Croogo->adminBoxes();
	?>
	</div>

</div>
<?php echo $this->Form->end(); ?>