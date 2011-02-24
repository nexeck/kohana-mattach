<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * @author     Marcel Beck
 * @date       10.02.2011
 * @time       10:39:20
 * @copyright  (c) 2011 Marcel Beck
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
   * @param   ORM Model
   * @return  void
   */
  static function render(ORM $model, $smodel = NULL, $view = NULL, $limit = 100)
  {
    return static::factory($model, 'mlog')->render_items('mlog/view', $limit);
  }

  /**
   * Gets all Logs attached to $model.
   *
   *     MLog::get($user);
   *
   * @param   ORM Model
   * @return  void
   */
  static function get(ORM $model, $smodel = NULL, $limit = 100)
  {
    return static::factory($model, 'mlog')->get_logs($limit);
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
  static function log(ORM $model, $status, $type, $message)
  {
    $user_id = '';
    if (auth::instance()->logged_in())
    {
      $user_id = auth::instance()->get_user()->id;
    }

    $additional_data = array(
      'status' => $status,
      'type' => $type,
      'message' => $message,
      'user_id' => $user_id,
      'client_ip' => Request::$client_ip,
    );

    return static::factory($model, 'mlog')->add_item($additional_data);
  }

}