<footer>
  <div class="footer-content sec-pad">
    <div class="container">
      
      <div class="col-md-6 col-sm-6 content-wrap">
        <div class="brand-logo">
          <img src="assets/images/jobstar-white.png" alt="">
        </div>
        <div class="sec-q-pad-b"></div>
        <p>Thousands of jobs are added to Indeed every day. Our free job alerts make it easy for you to be the first to know about the newest jobs. Sign up today and we willl send you free daily updates with the latest jobs matching your search.</p>
      </div>
     <div class="col-md-3 col-sm-3 content-wrap">
            <div class="title-underlined">
              <h3>Job Seekers</h3>
            </div>
            <p><a href="add_FAQ.php">FAQ?</a></p>
            <!-- <p><a href="#">Jobs by Specialization</a></p>
            <p><a href="#">Vacancy by Company Name</a></p>
            <p><a href="#">Terms of Use</a></p>
            <p><a href="#">Privacy Policy</a></p>
            <p><a href="#">Help</a></p> -->
          </div>

          <div class="col-md-2 col-sm-2 content-wrap">
            <div class="title-underlined">
              <h3>About</h3>
            </div>
            <p><a href="#">About Me</a></p>
            <p><a href="#">In The News</a></p>
            <p><a href="#">Career With Us</a></p>
            <p><a href="contact">Contact Us</a></p>
            <p><a href="#">Site Map</a></p>
          </div>

          
        </div>
      </div>
<div class="copyright sec-q-pad">
  <div class="container">
    <div class="col-md-7 col-sm-7 col-xs-6 left-section">
      <p>&copy; 2018 Jobstar - Responsive Project</p>
    </div>
    <div class="col-md-5 col-sm-5 col-xs-6 right-section text-right">
      <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
      <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
      <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
      <a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a>
      <a href="#" class="vimeo"><i class="fa fa-vimeo"></i></a>
    </div>
  </div>
</div>
</footer>
<?php if(@$chat=="active"){?>
<div class="chat-box">
   <div class="header">
        <?php 
        //if (@$_SESSION['key']) {
          $sender="candidate";
          $reciever="company";
          $cnd=$con->select_up("candidate_master","serial_key",$_SESSION['key']);
          $s_id=$cnd['cnd_id'];
          $r_id=$chat_cmp_id;
          $cmp=$con->select_up('company_master','cmp_id',$chat_cmp_id);
          echo $cmp['cmp_name'];
        // }
        // else{
        //   $sender="company";
        //   $reciever="candidate";
        //   $cmp=$con->select_up("company_master","serial_key",$_SESSION['C_key']);
        //   $s_id=$cnd['cmp_id'];
        //   $r_id=$chat_cnd_id;
        //   $cnd=$con->select_up('candidate_master','cnd_id',$chat_cnd_id);
        //   echo $cnd['f_name']." ".$cnd['l_name'];
        // }
        ?>
        <div class="mini">-</div>
    </div>
    <?php $qry="select * from chat where reciever='company' and sender='candidate' and s_id=$s_id and r_id=$r_id or reciever='candidate' and sender='company' and  s_id=$r_id and r_id=$s_id";
      $res=mysqli_query($con->con,$qry);
     ?>
    <div id="messages" class="messages">
        <ul>
            <?php while($m=mysqli_fetch_array($res)) {
            if($m['sender']=='company'){ ?>
            <li>
                <span class="left"><?php echo $m['msg']; }else{ ?> </span>
                <div class="clear"></div>
            </li> 
            <li>
                <span class="right"><?php  echo $m['msg'];}  ?></span>
                <div class="clear"></div>
            </li> <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="input-box">
      <input type="hidden" id="s_id" value="<?php echo $s_id;?>">
      <input type="hidden" id="r_id" value="<?php echo $r_id;?>">
      <input type="hidden" id="type" value="company">
        <input type="text" name="mess" id="mess" onKeydown="Javascript: if (event.keyCode==13) fun('<?php echo $sender; ?>','<?php echo $reciever;?>','<?php echo $s_id;?>','<?php echo $r_id;?>',this.value);" placeholder="Enter message">
    </div>
</div>
<?php if(@$chat_mini!="hide"){?>
<div class="def-btn btn-bg-blue mini_chat"><i class="fa fa-comments-o"></i></div>
<?php }?>
<script type="text/javascript">
    var elem = document.getElementById('messages');
    elem.scrollTop = elem.scrollHeight;
    $(document).ready(function(){
      setInterval(function(){chat_box()},1000);
      $('.mini').on('click',function() {
        $('.chat-box').hide();
        $('.mini_chat').show();
      });
      $('.mini_chat').on('click',function() {
        $('.chat-box').show();
        $('.mini_chat').hide();
      });
  });
</script>
<?php }//chat is active end?>