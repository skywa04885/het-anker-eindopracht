<div class="error-wrapper">
  <!-- The left side of the error wrapper -->
  <div class="error-wrapper__left">
    <h1><?= constant('error_code') ?></h1>
    <h2><?= constant('error_message') ?></h2>
  </div>
  <!-- The right side of the error wrapper -->
  <div class="error-wrapper__right">
    <p><?= constant('error_description') ?></p>
    <hr />
    <p><small>Request information</small></p>
    <table>
      <thead>
        <tr>
          <th>Key</th>
          <th>Value</th>
        </tr>    
      </thead>
      <tbody>
        <tr>
          <td>Remote Addres: </td>
          <td><?= $_SERVER['REMOTE_ADDR'] ?></td>
        </tr>
        <tr>
          <td>Browser: </td>
          <td><?= $_SERVER['HTTP_USER_AGENT'] ?></td>
        </tr>
        <tr>
          <td>Timestamp: </td>
          <td><?= time() ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>