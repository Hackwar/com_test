<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_test
 *
 * @copyright   (C) 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Test\Administrator\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\MVC\Model\BaseModel;
use Joomla\CMS\MVC\Model\ListModelInterface;

/**
 * Test Component Fields Model
 *
 * @since  4.0
 */
class FieldsModel extends BaseModel implements ListModelInterface
{
	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param   string  $id  A prefix for the store id.
	 *
	 * @return  string  A store id.
	 *
	 * @since   3.1
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= ':' . $this->getState('filter.extension');
		$id .= ':' . $this->getState('filter.search');
		$id .= ':' . $this->getState('filter.level');
		$id .= ':' . $this->getState('filter.access');
		$id .= ':' . $this->getState('filter.published');
		$id .= ':' . $this->getState('filter.language');

		return $id;
	}

	/**
	 * Method to get an array of data items.
	 *
	 * @return  mixed  An array of data items on success, false on failure.
	 *
	 * @since   3.0.1
	 */
	public function getItems()
	{
		$files = Folder::files(JPATH_ADMINISTRATOR . '/components/com_test/fields');
		sort($files);
		$items = [];

		foreach ($files as $file)
		{
			$item = new \stdClass();
			$item->id = substr($file, 0, strlen($file) - 4);
			$item->title = substr($file, 0, strlen($file) - 4);
			$item->file = $file;

			$items[] = $item;
		}

		return $items;
	}

	/**
	 * Method to get the starting number of items for the data set.
	 *
	 * @return  integer  The starting number of items available in the data set.
	 *
	 * @since   1.6
	 */
	public function getStart()
	{
		$store = $this->getStoreId('getstart');

		// Try to load the data from internal storage.
		if (isset($this->cache[$store]))
		{
			return $this->cache[$store];
		}

		$start = $this->getState('list.start');

		if ($start > 0)
		{
			$limit = $this->getState('list.limit');
			$total = $this->getTotal();

			if ($start > $total - $limit)
			{
				$start = max(0, (int) (ceil($total / $limit) - 1) * $limit);
			}
		}

		// Add the total to the internal cache.
		$this->cache[$store] = $start;

		return $this->cache[$store];
	}
}
