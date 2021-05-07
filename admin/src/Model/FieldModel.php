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

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\CMS\MVC\Model\BaseModel;
use Joomla\CMS\MVC\Model\ItemModelInterface;
use Joomla\Database\DatabaseQuery;
use Joomla\Database\ParameterType;

/**
 * Test Component Fields Model
 *
 * @since  4.0
 */
class FieldModel extends BaseModel implements ItemModelInterface
{
	public function getItem($pk = null)
	{
		$item = new \stdClass();

		return $item;
	}
}
