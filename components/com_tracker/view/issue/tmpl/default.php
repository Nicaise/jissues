<?php
/**
 * @package    BabDev.Tracker
 *
 * @copyright  Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<form method="post" name="adminForm" id="adminForm">
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pull-right btn-group">
            <a class="btn btn-small" href="index.php?option=com_tracker&view=issues"><?php echo JTEXT::_('Cancel'); ?></a>
            <input type="submit" class="btn btn-success" value="Save" />
	    </div>
	</div>
    <h3><?php echo '[#' . $this->item->id . '] - ' . $this->item->title; ?></h3>

    <div class="row-fluid">
		<div class="span5">
			<h4><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_INFO'); ?></h4>
			<table class="table">

				<tr class="issue-info-row">
					<td>
						<label><?php echo JText::_('COM_TRACKER_HEADING_SUBMITTER'); ?></label>

					</td>
                    <td>
                        <label><?= JText::_('Category') ?></label>
                    	<?= $this->categoryList ?>
                    </td>
				</tr>

				<tr class="issue-info-row">
					<td>
						<label><?php echo JText::_('JSTATUS'); ?></label>
						<?php echo JText::_('COM_TRACKER_STATUS_' . strtoupper($this->item->status_title)); ?>
					</td>
					<td>
                        <label><?php echo JText::_('COM_TRACKER_HEADING_PRIORITY'); ?></label>
						<?php if($this->item->priority == 1)
						{
							$status_class = 'badge-important';
						}
						elseif ($this->item->priority == 2)
						{
							$status_class = 'badge-warning';
						}
						elseif ($this->item->priority == 3)
						{
							$status_class = 'badge-info';
						}
						elseif ($this->item->priority == 4)
						{
							$status_class = 'badge-inverse';
						}
						elseif ($this->item->priority == 5)
						{
							$status_class = '';
						}
						?>
                        <span class="badge <?php echo $status_class; ?>">
							<?php echo $this->item->priority; ?>
						</span>
                    </td>
				</tr>

				<tr class="issue-info-row">
                    <td>
                        <label><?php echo JText::_('COM_TRACKER_HEADING_GITHUB_ID'); ?></label>
						<?php if ($this->item->gh_id) : ?>
                        <a href="https://github.com/joomla/joomla-cms/issues/<?php echo $this->item->gh_id; ?>" target="_blank"><?php echo $this->item->gh_id; ?></a>
						<?php endif; ?>
                    </td>
					<td>
						<label><?php echo JText::_('COM_TRACKER_HEADING_JOOMLACODE_ID'); ?></strong></label>
						<?php if ($this->item->jc_id) : ?>
                        <a href="http://joomlacode.org/gf/project/joomla/tracker/?action=TrackerItemEdit&tracker_item_id=<?php echo (int) $this->item->jc_id; ?>" target="_blank">
							<?php echo (int) $this->item->jc_id; ?>
                        </a>
						<?php endif ?>
					</td>
				</tr>

				<tr class="issue-info-row">
					<td>
						<label><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_PATCH_URL'); ?></label>
						<?php if ($this->item->patch_url) : ?>
						<a href="<?php echo $this->item->patch_url; ?>" target="_blank"><?php echo $this->item->patch_url; ?></a>
						<?php endif ?>
					</td>
					<td>
						<label><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_DATABASE_TYPE') ?></label>
						<?php
						if ($this->item->database_type) :
                        	echo $this->item->database_type;
						endif
						?>
					</td>
				</tr>

				<tr class="issue-info-row">
					<td>
						<label><?php echo JText::_('COM_TRACKER_HEADING_DATE_OPENED'); ?></label>
                    	<?php echo JHtml::_('date', $this->item->opened, 'DATE_FORMAT_LC2'); ?>
					</td>
                    <td>
                        <label><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_WEBSERVER') ?></label>
						<?php
						if ($this->item->webserver) :
                        	echo $this->item->webserver;
						endif
						?>
                    </td>
				</tr>

				<tr class="issue-info-row">
					<td>
						<label><?php echo JText::_('COM_TRACKER_HEADING_DATE_CLOSED'); ?></label>
						<?php
						if ($this->item->closed_date) :
							echo JHtml::_('date', $this->item->closed_date, 'DATE_FORMAT_LC2');
						endif;
						?>
					</td>
					<td>
						<label><?php echo JText::_('COM_TRACKER_HEADING_PHP_VERSION'); ?></label>
						<?php
						if ($this->item->php_version) :
							echo $this->item->php_version;
						endif;
						?>
					</td>
				</tr>

				<tr class="issue-info-row">
					<td>
						<label><?php echo JText::_('COM_TRACKER_HEADING_LAST_MODIFIED'); ?></label>
						<?php
						if ($this->item->modified != '0000-00-00 00:00:00') :
							echo JHtml::_('date', $this->item->modified, 'DATE_FORMAT_LC2');
						endif;
						?>
					</td>
					<td>
						<label><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_DATABASE_TYPE'); ?></label>
						<?php
						if ($this->item->database_type):
							echo $this->item->database_type;
						endif
						?>
					</td>
				</tr>

				<tr class="issue-info-row">
					<td>
						<label><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_WEBSERVER'); ?></label>
						<?php
						if ($this->item->webserver) :
							echo $this->item->webserver;
						endif;
						?>
					</td>
                    <td>
                        <label><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_PHP_VERISON'); ?></label>
						<?php
						if ($this->item->php_version) :
							echo $this->item->php_version;
						endif;
						?>
                    </td>
				</tr>

				<tr class="issue-info-row">
                    <td>
						<label><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_BROWSER'); ?></label>
						<?php
						if ($this->item->browser) :
							echo $this->item->browser;
						endif;
						?>
					</td>
					<td>
						<label><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_SUCCESSFUL_TEST_COUNT') ?></label>

					</td>
				</tr>

			</table>

			<?php include $this->getPath('fields'); ?>
		</div>
		<div class="span3">
            <h4><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_INVOLVED_PEOPLE'); ?></h4>
        	<ul>
				<?php foreach ($this->involvedPeople as $people) : ?>
				<li><a href="https://github.com/<?php echo $people->submitter ?>"><?php echo $people->submitter ?></a></li>
				<?php endforeach ?>
            </ul>
		</div>
	</div>

	<div class="row-fluid">
        <div class="span12">
            <h4><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_DESC'); ?></h4>
            <div class="well well-small issue">
                <p><?php echo $this->item->description; ?></p>
            </div>
        </div>
	</div>

    <div class="row-fluid">
        <div class="span12">
            <h4><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_TEST_INSTRUCTIONS'); ?></h4>
            <div class="well well-small issue">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
					Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
					Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
					In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
					Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
					Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
					Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
					Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
					Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
					Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
				</p>
            </div>
        </div>
    </div>

	<?php if ($this->comments) : ?>
	<div class="row-fluid">
		<div class="span12">
			<h4><?php echo JText::_('COM_TRACKER_LABEL_ISSUE_COMMENTS'); ?></h4>
		</div>
	</div>
	<?php foreach ($this->comments as $comment) : ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="well well-small">
				<h5><?php echo JText::sprintf('COM_TRACKER_LABEL_SUBMITTED_BY', $comment->submitter, $comment->created); ?></h5>
				<p><?php echo $comment->text; ?></p>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
	<input type="hidden" name="id" value="<?= $this->item->id ?>" />
	<input type="hidden" name="task" value="save" />
</form>