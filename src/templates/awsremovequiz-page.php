<?php include_once 'adminnavi-page.php'; ?>


<link rel="stylesheet" href="css/table.css">
<h2 style="margin-left: 750px;"><?php displayMessage(); ?></h2>
<div class="table-container">
    <table class="tablerem">

      <tbody>

        <form action="removequiz.php" method="POST">

            <tr>

              
                <td><button class="btn btn-danger" name="delete_all"><i class="fa fa-trash"> Delete All</i></button></td>
            
            </tr>
      </form>
        </tbody>
    </table>
    <h1 class="h">All Questions</h1>
    <table class="tablerem">
      <thead>
        <tr>
          <th >Question</th>
          <th >Options</th>
          
          <th >Answer</th>
          <th >Description</th>
          <th ></th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach($questions as $q): ?>
              <tr>
                <form action="removequiz.php" method="POST">
                    <td><?php echo $q->Question ?></td>
                    <td ><?php echo $q->A ?><br><?php echo $q->B ?><br><?php echo $q->C ?><br><?php echo $q->D ?></td>
                    
                    <td  ><?php echo $q->Answer ?></td>
                    <td ><?php echo $q->Description ?></td>


                    <input type="hidden" name="qn_id" value="<?php echo $q->id; ?>">
                    <td ><button class="btn btn-danger" name="delete_question"><i class="fa fa-trash"> Trash</i></button>
                    
                    </td>

                </form>
              </tr>
          <?php endforeach; ?>        
      </tbody>
    </table>
    

        
  </div>

