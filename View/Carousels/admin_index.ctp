<?php

$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Carousels'), array('plugin' => 'carousels', 'controller' => 'carousels'))
	;

?>
<?php $this->start('actions'); ?>
	<li><?php echo $this->Html->link(__('New Carousel'), array('action' => 'add'), array('button' => 'default')); ?></li>
<?php $this->end(); ?>

<h2 class="hidden-desktop"><?php echo __('Carousels');?></h2>
<table class="table">
<tr>
	<th><?php echo $this->Paginator->sort('title');?></th>
	<th><?php echo $this->Paginator->sort('start_date');?></th>
	<th><?php echo $this->Paginator->sort('end_date');?></th>
	<th><?php echo $this->Paginator->sort('weight');?></th>
	<th><?php echo __('Actions');?></th>
	<th><?php echo __('Default');?></th>
</tr>
<?php
$i = 0;
foreach ($carousels as $carousel):
	$actions = array();
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
<tr<?php echo $class;?>>
	<td><?php echo $carousel['Carousel']['title']; ?>&nbsp;</td>
	<td><?php echo $carousel['Carousel']['start_date']; ?>&nbsp;</td>
	<td><?php echo $carousel['Carousel']['end_date']; ?>&nbsp;</td>
	<td><?php echo $carousel['Carousel']['weight']; ?>&nbsp;</td>
	<td>
	<?php
		$actions[] = $this->Croogo->adminRowAction('',
			array('action' => 'edit', $carousel['Carousel']['id']),
			array('icon' => 'pencil', 'tooltip' => __('Edit'))
		);
		$actions[] = $this->Croogo->adminRowAction('', array('action' => 'delete', $carousel['Carousel']['id']), array('icon' => 'trash', 'tooltip' => __('Delete')),
			__('Are you sure you want to delete %s?', $carousel['Carousel']['title'])
		);
		echo $this->Html->div('item-actions', implode(' ', $actions));
	?>
	</td>
	
</tr>
<?php endforeach; ?>
</table>

