<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * @package MAttach
 * @category MLog
 * @author		 Marcel Beck
 * @copyright	(c) 2011 Marcel Beck
 * @license MIT
 **/
class Model_MLog extends ORM {

	protected $_created_column = array('column' => 'created', 'format' => TRUE);

	protected $_table_name = 'logs';

	protected $_primary_key = 'id';

	protected $_primary_val = 'subject';

}