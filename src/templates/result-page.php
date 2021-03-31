

<link rel="stylesheet" href="css/result.css">

<style type="text/css">
  .container {
  margin-top: 20px;
  border-radius: 5px;  
  background-color:white ;

}
</style>
<div class="container">
        
        <div class="p">
        <?php if($score>=70)
        {?>
          <p id="pass"><?php echo "Passed!";?></p>
        <?php }
        else
        {?>
         <p id="fail"><?php echo "Failed!";?></p>
       <?php }?>
       <p></p>
 
       <p id="per">  <?php echo $score; ?>% </p>
       <p> Total no of questions <?php echo $total; ?> </p>
       <p>Correct : <?php echo $correct; ?></p>
       <p>Wrong : <?php echo $wrong; ?></p>
       <p>Time taken : <?php echo $min; ?> minutes and <?php echo $sec; ?> seconds</p>
       <button id="review" onclick="myFunction()">Review Questions</button>
     </div>
       
      
 <div id="hide">
  
       <?php $i=1; ?>
       <?php foreach($uans as $u): ?>
       <?php foreach($qanda as $q): ?>
<div id="hd">
  	  <p id="Q"><strong>Question  <?php echo $i; ?>:</strong> <?php echo $q[1]; ?> </p>
        <div id="opts">
    	    <p id="opt"><?php echo $q[2]; ?> </p><br><br>
    	    <p id="opt"> <?php echo $q[3]; ?> </p><br><br>
    	    <p id="opt"> <?php echo $q[4]; ?> </p><br><br>
    	    <p id="opt"> <?php echo $q[5]; ?> </p><br><br>
        </div>
        <?php if($u): ?>
          <p id="uans"><b>Your Answer:</b> <?php echo $u; ?> </p><br>
        <?php else: ?>
          <p id="uans"><b>Your Answer:</b> You did not answer this question</p><br>
        <?php endif; ?>
  	    <p id="ans"><b>Correct Answer:</b> <?php echo $q[6]; ?> </p><br>
  	    <p id="desc"><strong>Description:</strong> <?php echo $q[7]; ?> </p><br>
	     <?php $i++; ?>
       </div>
         <?php endforeach; ?>
         <?php endforeach; ?>
       
</div> 
     <a class="btn btn-primary" href="csp.php">Go back</a>
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