<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * @author     Marcel Beck
 * @date       10.02.2011
 * @time       19:10:43
 * @copyright  (c) 2011 Marcel Beck
 **/
?>
<table class="full-width content-shadow">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Model_ID</th>
      <th scope="col">Model_Name</th>
      <th scope="col">User_ID</th>
      <th scope="col">Status</th>
      <th scope="col">Type</th>
      <th scope="col">Message</th>
      <th scope="col">Client_IP</th>
      <th scope="col">Created</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $log): ?>
      <tr>
        <td><?php echo $log->id; ?></td>
        <td><?php echo $log->model_id; ?></td>
        <td><?php echo $log->model_name; ?></td>
        <td><?php echo $log->user_id; ?></td>
        <td><?php echo $log->status; ?></td>
        <td><?php echo $log->type; ?></td>
        <td><?php echo $log->message; ?></td>
        <td><?php echo $log->client_ip; ?></td>
        <td><span title="<?php echo Date::fuzzy_span($log->created); ?>"><?php echo date('Y.m.d H:i:s', $log->created); ?></span></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>