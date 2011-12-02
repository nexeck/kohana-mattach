<?php
defined('SYSPATH') OR die('No direct script access.');

/**
 * @package MAttach
 * @category MLog
 * @author     Marcel Beck
 * @copyright  (c) 2011 Marcel Beck
 * @license MIT
 * */
class MLog extends MAttach_Core
{

  static function factory(ORM $model, $smodel = NULL)
  {
    return new static($model, 'mlog');
  }

  /**
   * Gets all Logs attached to $model.
   * Rendered into View.
   *
   *     MLog::render($user);
   *
   * @param ORM Model
   * @param ORM/String Model to Save
   * @return voide
   */
  static function render(ORM $model, $smodel = NULL, $view = NULL, $limit = NULL, $offset = NULL, $orderby = NULL)
  {
    return static::factory($model, 'mlog')->render_items('mlog/view', $limit, $offset, $orderby);
  }

  /**
   * Gets all Logs attached to $model.
   *
   *     MLog::get($user);
   *
   * @param   ORM Model
   * @return  void
   */
  static function get(ORM $model, $smodel = NULL, $limit = NULL, $offset = NULL, $orderby = NULL)
  {
    return static::factory($model, 'mlog')->get_items($limit, $offset, $orderby);
  }

  /**
   * Adds a new Log Message.
   *
   *     MLog::add($user,'SUCCESS','Login','Yeah it works!');
   *
   * @param   ORM Model
   * @param string Status
   * @param string Type
   * @param string message
   * @return  void
   */
  static function log(ORM $model, $category, $status, $type, $subject, $body = '')
  {
    $user_id = '';
    if (auth::instance()->logged_in())
    {
      $user_id = auth::instance()->get_user()->pk();
    }

    $additional_data = array(
      'category' => $category,
      'status' => $status,
      'type' => $type,
      'subject' => $subject,
      'body' => $body,
      'user_id' => $user_id,
      'client_ip' => Request::$client_ip,
    );

    return static::factory($model, 'mlog')->add_item($additional_data);
  }

}
