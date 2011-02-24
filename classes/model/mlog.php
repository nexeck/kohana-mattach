<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * @author     Marcel Beck
 * @date       10.02.2011
 * @time       19:00:54
 * @copyright  (c) 2011 Marcel Beck
 **/
class Model_MLog extends ORM
{

	protected $_created_column = array('column' => 'created', 'format' => TRUE);

  protected $_table_name = 'logs';
	protected $_primary_key = 'id';
	protected $_primary_val = 'message';

}