<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * @author     Marcel Beck
 * @date       16.02.2011
 * @time       00:49:50
 * @copyright  (c) 2011 Marcel Beck
 * */
abstract class MAttach_Core
{

  /**
   * Factory Class
   *
   * MAttach::factory($user,$log);
   *
   * @param ORM Model
   * @param ORM/String Model to Save
   * @return voide
   */
  static function factory(ORM $model, $smodel)
  {
    return new static($model, $smodel);
  }

  /**
   * Gets all Model Items attached to $model.
   * Rendered into View.
   *
   *     MAttach::render($user,$log);
   *
   * @param ORM Model
   * @param ORM/String Model to Save
   * @param View/String to render
   * @return  void
   */
  static function render(ORM $model, $smodel, $view, $limit = 100)
  {
    return static::factory($model, $smodel)->render_items($view, $limit);
  }

  /**
   * Gets all Model Items attached to $model.
   *
   *     MAttach::get($user,$log);
   *
   * @param ORM Model
   * @param ORM/String Model to Save
   * @return  void
   */
  static function get(ORM $model, $smodel, $limit = 100)
  {
    return static::factory($model, $smodel)->get_items($limit);
  }

  /**
   * Adds a new Model.
   *
   *     MAttach::add($user,$log,$additional_data);
   *
   * @param ORM Model
   * @param ORM/String Model to Save
   * @param string Status
   * @param string Type
   * @param string message
   * @return  void
   */
  static function add(ORM $model, $smodel, array $additional_data = array())
  {
    return static::factory($model, $smodel)->add_item($additional_data);
  }

  /**
   * @var ORM
   */
  protected $model;

  /**
   * Creates a new MAttach.
   *
   *     $mattach = new MAttach($user,$log);
   *
   * @param ORM Model
   * @param ORM/String Model to Save
   * @return  void
   */
  public function __construct(ORM $model, $smodel)
  {

    if ($smodel instanceof ORM)
    {
      try
      {
        $this->model = $smodel;
        $this->model->model_id = $model->id;
        $this->model->model_name = $model->object_name();
      }
      catch (Exception $e)
      {
        throw $e;
      }
    }
    elseif (is_string($smodel))
    {
      try
      {
        $this->model = ORM::factory($smodel);
        $this->model->model_id = $model->id;
        $this->model->model_name = $model->object_name();
      }
      catch (Exception $e)
      {
        throw $e;
      }
    }
    else
    {
      throw 'WTF?';
    }
  }

  public function render_items($view, $limit)
  {
    if (!($view instanceof View))
    {
      $view = View::factory($view);
    }
    $view->items = $this->get_items($limit);
    return $view;
  }

  public function get_items($limit)
  {
    return $this->model
      ->order_by('created', 'DESC')
      ->limit($limit)
      ->offset(0)
      ->where('model_id', '=', $this->model->model_id)
      ->where('model_name', '=', $this->model->model_name)
      ->find_all();
  }

  public function set_additional_data(array $additional_data)
  {
    foreach ($additional_data as $key => & $value)
    {
      $this->model->$key = $value;
    }
    return $this;
  }

  public function add_item(array $additional_data = array())
  {
    try
    {
      $this->set_additional_data($additional_data);
      $this->model->save();
    }
    catch (Exception $e)
    {
      throw $e;
    }
  }

}
