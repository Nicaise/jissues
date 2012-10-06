<?php
/**
 * @package    BabDev.Tracker
 *
 * @copyright  Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Initialize values to check for cells
$blockers = array('1', '2');

// Initialize Bootstrap Tooltips
$ttParams = array();
$ttParams['animation'] = true;
$ttParams['trigger']   = 'hover';
JHtml::_('bootstrap.tooltip', '.hasTooltip', $ttParams);
?>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th width="2%" class="nowrap hidden-phone"><?php echo JText::_('JGRID_HEADING_ID'); ?></th>
			<th><?php echo JText::_('COM_TRACKER_HEADING_SUMMARY'); ?></th>
			<th width="5%"><?php echo JText::_('COM_TRACKER_HEADING_PRIORITY'); ?></th>
			<th width="5%"><?php echo JText::_('JSTATUS'); ?></th>
			<th width="10%" class="hidden-phone"><?php echo JText::_('JCATEGORY'); ?></th>
			<th width="10%" class="hidden-phone"><?php echo JText::_('COM_TRACKER_HEADING_DATE_OPENED'); ?></th>
			<th width="10%" class="hidden-phone"><?php echo JText::_('COM_TRACKER_HEADING_DATE_CLOSED'); ?></th>
			<th width="10%" class="hidden-phone"><?php echo JText::_('COM_TRACKER_HEADING_LAST_MODIFIED'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($this->items) == 0) : ?>
		<tr>
			<td class="center" colspan="8">
				<?php echo JText::_('COM_TRACKER_NO_ITEMS_FOUND'); ?>
			</td>
		</tr>
	<?php else : ?>
	<?php foreach ($this->items as $i => $item) :
	$rowClass = '';
	if (in_array($item->priority, $blockers)) {
		$rowClass = 'class="error"';
	}
	if ($item->status == '4') {
		$rowClass = 'class="success"';
	}
	?>
		<tr <?php echo $rowClass; ?>>
			<td class="center hidden-phone">
				<?php echo (int) $item->id; ?>
			</td>
			<td class="hasContext">
				<div class="hasTooltip" title="<?php echo JHtml::_('string.truncate', $item->description, 100); ?>">
					<?php echo $this->escape($item->title); ?>
				</div>
			</td>
			<td>
				<?php echo (int) $item->priority; ?>
			</td>
			<td>
				<?php echo JText::_('COM_TRACKER_STATUS_' . strtoupper($item->status_title)); ?>
			</td>
			<td class="hidden-phone">
				N/A
			</td>
			<td class="nowrap small hidden-phone">
				<?php echo JHtml::_('date', $item->opened, 'Y-m-d'); ?>
			</td>
			<td class="nowrap small hidden-phone">
				<?php if ($item->closed_status) : ?>
					<?php echo JHtml::_('date', $item->closed, 'Y-m-d'); ?>
				<?php endif; ?>
			</td>
			<td class="nowrap small hidden-phone">
				<?php if ($item->modified != '0000-00-00 00:00:00') : ?>
					<?php echo JHtml::_('date', $item->modified, 'Y-m-d'); ?>
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>