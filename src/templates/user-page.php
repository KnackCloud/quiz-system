<?php include_once 'adminnavi-page.php'; ?>

<!-- <?php include 'includes/header2.php' ?> -->
<link rel="stylesheet" href="css/table.css">
<div style="width: 500px; " class="table-container">
    <?php displayMessage(); ?>
</div>
<div class="table-container">
    <table class="table1">
      <thead>
        <tr>
          <th >Email</th>  
          <th >Action</th>       
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
          <tr>
            <form action="user.php" method="POST">
              <td><?php echo $user->email ?></td>   
              <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
              <td><button class="btn btn-danger" name="delete_user"><i class="fa fa-trash"> Trash</i></button></td>
            </form>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </div>

