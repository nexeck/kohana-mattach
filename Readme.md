# MAttach

* Compatible Kohana Version: 3.1.x

# HowTo Use

## Add Data

Save $item with a reference to the current $user ORM Object

  $item = ORM::factory('attachment');
  $item->filpath = '';
  $item->filesize = '';

  MAttach::add($user, $item);

Same as:

  $data = array();
  $data['filepath'] = '';
  $data['filesize'] = '';

  MAttach::add($user, 'attachment', $data);


## Render Data

  MAttach::render($user, $item, $view);
  MAttach::render($user, $item, 'attachment/list');
  MAttach::render($user, 'attachment', $view);
  MAttach::render($user, 'attachment', 'attachment/list');


# HowTo Use MLog

## Add a new Log
  MLog::log($this->user, 'SUCCESS', 'Login', 'Logged In');

## Render Log

Get only the last 5 Logging entries
  MLog::render($this->user, NULL, NULL, 5);