<?php
/**
 * @version		$Id$
 * @package		Joomla.Administrator
 * @subpackage	Templates.hathor
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

// no direct access
defined('_JEXEC') or die;

$options = array(
	JHtml::_('select.option', 'c', JText::_('JLIB_HTML_BATCH_COPY')),
	JHtml::_('select.option', 'm', JText::_('JLIB_HTML_BATCH_MOVE'))
);
$published = $this->state->get('filter.published');
$extension	= $this->escape($this->state->get('filter.extension'));
?>
<fieldset class="batch">
	<legend><?php echo JText::_('COM_CATEGORIES_BATCH_OPTIONS');?></legend>

		<?php echo JHtml::_('batch.access');?>

		<?php if ($published >= 0) : ?>
			<label id="batch-choose-action-lbl" for="batch-category-id">
				<?php echo JText::_('COM_CATEGORIES_BATCH_CATEGORY_LABEL'); ?>
			</label>
			<select name="batch[category_id]" class="inputbox" id="batch-category-id">
				<option value=""><?php echo JText::_('JSELECT') ?></option>
				<?php echo JHtml::_('select.options', JHtml::_('category.categories', $extension, array('published' => $published)));?>
			</select>
			<?php echo JHtml::_( 'select.radiolist', $options, 'batch[move_copy]', '', 'value', 'text', 'm'); ?>
		<?php endif; ?>

		<button type="submit" onclick="submitbutton('category.batch');">
			<?php echo JText::_('JGLOBAL_BATCH_PROCESS'); ?>
		</button>
		<button type="button" onclick="document.id('batch-category-id').value='';document.id('batch-access').value=''">
			<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>
		</button>
</fieldset>