<?php

?>
<table class="table">
	<thead></thead>
	<tbody>
	<?php foreach ($this->items as $item) : ?>
	<tr>
		<td><a href="<?php echo JRoute::_('index.php?option=com_test&view=field&id=' . $item->id); ?>"><?php echo $item->title; ?></a></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>

