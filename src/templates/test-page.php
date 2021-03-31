<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/style.css">
<div class="res">
<style type="text/css">
  .spinner {
  position: fixed;
top: 48%;
left: 48%;
}

.spinner >div  {
  width: 18px;
  height: 18px;
  background-color: black;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}
#p{
    position: absolute;
    top: 0;
    right: 0;
}

       
</style>

          

  <a id="p" href="csp.php" class='btn btn-danger'>Cancel Test</a>
<div class="wrapper">
      <div class="quiz">
        <div class="quiz_header">
            <div class="quiz_user">
            <h4><?php echo $tname; ?> </h4>
            </div>
            <div class="quiz_timer">
            <span class="time">00:00:00</span>
            </div>
            <!-- <div class="cancel">
            <a id="p" href="csp.php" class='btn btn-danger'>Cancel Test</a>
            </div> -->
        </div>
           
           <div class="questions">
            <div id="test-qns"></div>
            <div class="option_group">
            <div id="options">
            </div>
            </div>
            <br>
            <button id="prev" class="btn btn-primary" onclick="prev()">Previous</button>
            <button id="nxt" class="btn btn-primary" onclick="next()">Next</button>
            <button id="submit" class="btn btn-primary" onclick="calculate()">Submit</button>
          </div>
      </div>   
</div>

<!-- <a class="a" href="logout.php">logout</a> -->
<div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
           <div class="bounce3"></div>
        </div>
    <div class="content">
   
</div>

<script>
   
    window.count = 1;
    window.score = 0;
    window.limit = <?php echo $noq; ?>;
    window.i = 0;
    window.qn = new Array();
    window.ans = new Array();
    window.uans = new Array();
    window.qs = new Array();
    window.topic="";

    setTimeout(calculate,<?php echo $time; ?>*60*1000);
    m=<?php echo $time; ?>;
    if(m>60) {
      minutes=m-60-1;
      hrs = 1;
    }
    else {
      minutes=m-1;
      hrs = 0;
    }
    // setInterval(calltoapi,1000);
    <?php if(!empty($topicname)): ?>
      topic = "<?php echo $topicname; ?>";
    <?php endif; ?>
    window.csp = "<?php echo $_SESSION['csp'];?>";



    $(document).ready(function(){

      $('.spinner').hide();
      
      if(count == 1) {
      $('#prev').attr('disabled','disabled');
      $('#submit').attr('disabled','disabled');
    }
      else $('#prev').removeAttr('disabled');
      calltoapi();
      // setInterval(next,10000);
      // calltoapi(1);
      $('#options').change(function() {
        var str = '';
        $.each($("input[name='option']:checked"), function(){
            str += ($(this).val());
        });
        uans[count-1] = str;

});
  

});
    function next(){  
            // setInterval(next,10000);
      // alert(document.querySelector(".time").innerText);
        if(count < limit && count < qn.length)
        {
          result = qs[count];
          temp = uans[count];
          count++;
          updateHTML(result);          
          $.each($("input[name='option']"), function(){
            
            if(temp.includes($(this).val()))
            {
                $(this).prop('checked',true);
            }
          });
          
        }
        else if(count<limit){ calltoapi();     
          count++;
        }   


      }
      function prev(){
        sec=60; 
        console.log(count);
        count--;
        if(count > 0)
        {
          result = qs[count-1];
          updateHTML(result);
          temp = uans[count-1];
          $.each($("input[name='option']"), function(){
            
            if(temp.includes($(this).val()))
            {
                $(this).prop('checked',true);
            }
          });
        }
        // calltoapi(qn[count-1]);        

      }
      function calltoapi(){
        const url = 'https://yy5wvsoov7.execute-api.us-east-1.amazonaws.com/dev/getqn'; 
        
     

        let b = {
          
          "topic": topic,
          "csp": csp
        };
        fetch(url,{
              method: 'POST',
              mode: 'cors',
              body: JSON.stringify(b)
        })
        .then((resp) => resp.json())
        .then(function(data) {
          

          console.log(data);
          var result = data.body;
          console.log(result);
          if(!qn.includes(result[0]))
          {
            qs[i] = result;
            tstr = result[6];
            qn[i] = result.Id; 
            
            tstr = tstr.replace('and', '');
            tstr = tstr.replace(',', '');
            tstr = tstr.replaceAll(' ', '');

            ans[i] = tstr.trim();
            i++;
          }
          console.log(qs);
          updateHTML(result);
          

         
        })
        .catch(function(error) {
          console.log(error);
        });
      }

      function calculate()
      {
        
       

        $('.spinner').show();
        
        
        
        for(var i=0;i<ans.length;i++)
          if((ans[i]) == (uans[i])) score++;

        // window.location = "result.php?data="+score;
        // var temp = document.querySelector(".time").innerText;
        // temp = temp.split(":");
        var min = parseInt(formatted_mins);
        var sec = parseInt(formatted_secs);
        // alert(uans);
        $.ajax({
            url: "result.php",
            method: "POST",
            data: {
              data: score,
              qna : qs,
              uans:uans,
              min:min,
              sec:sec,
              limit: limit,
              test_name : '<?php echo $tname; ?>'
              },
            success: function( result ) {
              $('.spinner').hide();
              $( '.res' ).html(result);
              console.log(result);
             
            }
          });

      }
      function updateHTML(result){
        var q = document.getElementById("test-qns");
        var o = document.getElementById("options");
        var m = document.getElementById("quiz"); 
        o.innerHTML = '';

        if(result[6].length == 1) type = 'radio';
          else type = 'checkbox';

          q.innerHTML = count+". "+result[1];
          o.innerHTML += '<input type="'+type+'" name="option" id="ans" value="A"> ' + result[2] + '<br>';
          o.innerHTML += '<input type="'+type+'" name="option" id="ans" value="B"> ' + result[3] + '<br>';
          o.innerHTML += '<input type="'+type+'" name="option" id="ans" value="C"> ' + result[4] + '<br>';
          o.innerHTML += '<input type="'+type+'" name="option" id="ans" value="D"> ' + result[5] + '<br>';
          if(count > 1) $('#prev').removeAttr('disabled');
          else $('#prev').attr('disabled','disabled');

          console.log(uans);

          if(count == limit) 
            {
              var str = '';
              $.each($("input[name='option']:checked"), function(){
                  str += ($(this).val());
              });
              uans[count-1] = str;

              $('#submit').removeAttr('disabled','disabled');
              $('#nxt').attr('disabled','disabled');
            }
          else 
            {
              $('#submit').attr('disabled','disabled');
              $('#nxt').removeAttr('disabled');
            }

      }




</script>
</div>
<script type="text/javascript" src="js/timer.js"></script>
<?php include 'includes/footer.php'; ?>