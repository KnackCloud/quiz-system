

<link rel="stylesheet" href="css/result.css">

<style type="text/css">
  .container {
  margin-top: 20px;
  border-radius: 5px;  
  background-color:white ;

}
</style>
<div class="container">
       <div class="score">
        <div class="p">
        <?php if($score>=70)
        {
          echo "Passed!";
        }
        else
        {
          echo "Failed!";
        }?>
       <p>  <?php echo $score; ?>% </p>
       <p> Total no of questions <?php echo $total; ?> </p>
       <p>Correct : <?php echo $correct; ?></p>
       <p>Wrong : <?php echo $wrong; ?></p>
       <button id="review" onclick="myFunction()">Review Questions</button>
       </div>
        </div>
      </div>
 <div id="hide">
       <?php $i=1; ?>
       <?php foreach($qanda as $q): ?>

	  <p id="Q"><b>Question <?php echo $i; ?>:</b> <?php echo $q[1]; ?> </p>

	    <p><b>A.</b> <?php echo $q[2]; ?> </p>
	    <p><b>B.</b> <?php echo $q[3]; ?> </p>
	    <p><b>C.</b> <?php echo $q[4]; ?> </p>
	    <p><b>D.</b> <?php echo $q[5]; ?> </p>
	    <p id="ans"><b>Answer:</b> <?php echo $q[6]; ?> </p>
	    <p><b>Description:</b> <?php echo $q[7]; ?> </p>
	     <?php $i++; ?>
         <?php endforeach; ?>
</div> 
     <a class="btn btn-primary" href="index.php">Go back</a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("hide");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>