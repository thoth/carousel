
<div class="carousels form">
<?php echo $this->Form->create('Carousel');?>
<fieldset>
  <legend><?php __('Add Carousel'); ?></legend>
  <?php
  echo $this->Form->input('title');
  echo $this->Form->input('start_date');
  echo $this->Form->input('end_date');
  echo $this->Form->input('image');
  echo $this->Form->input('body');
  echo $this->Form->input('url', array('type'=>'text'));
  echo $this->Form->input('weight');
  ?>
</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
