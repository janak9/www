 <section class="testimonial-3 banner-overlay" style="background: url(assets/images/banner-4.jpg); background-size: cover; background-attachment: fixed;">
      <div class="overlay"></div>
      <div class="container sec-pad">
        
        <div class="testimonial-3-slider">
        <?php
          $qry="select * from review order by id DESC limit 4";
          $res=mysqli_query($con->con,$qry);
          while ($review_row=mysqli_fetch_array($res)) {
            $user_info=$con->select_up("candidate_master","cnd_id",$review_row[1]);
        ?>          
          <div class="testimonial-item col-md-4 col-sm-4 animated wow fadeIn" data-wow-delay="0s">
              <div class="col-md-12 text-center">
                <div class="photo-wrap" style="overflow: hidden;">
                  <img src="../assets/image/cnd_image/<?php echo $user_info['cnd_img'];?>" style="height: 100%;width: 100%;">
                </div>
              </div>
              <div class="col-md-12">
                <div class="content">
                  <h4><?php echo $user_info['f_name']." ".$user_info['l_name']; ?></h4>
                  <span><?php 
                    $cmp=$con->select_up("company_master","cmp_id",$review_row[2]);
                    $job=$con->select_up("jobpost_master","j_id",$review_row[3]);
                    echo $cmp['cmp_name']."(".$job['j_name'].")";
                    ?></span>
                  <p><?php echo $review_row['des'];?></p>
                  <?php
                      $star=$review_row['rate'];
                      if($star>=1)
                          echo '<span><i class="fa fa-star orange"></i></span>';
                      elseif ($star==0.5)
                          echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                      
                      if($star>=2)
                          echo '<span><i class="fa fa-star orange"></i></span>';
                      elseif ($star==1.5)
                          echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                
                      if($star>=3)
                          echo '<span><i class="fa fa-star orange"></i></span>';
                      elseif ($star==2.5)
                          echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                      
                      if($star>=4)
                          echo '<span><i class="fa fa-star orange"></i></span>';
                      elseif ($star==3.5)
                          echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                      
                      if($star>=5)
                          echo '<span><i class="fa fa-star orange"></i></span>';
                      elseif ($star==4.5)
                          echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                  ?>
                </div>
              </div>
          </div><!--/.testimonial-item -->
          <?php }?>
        </div>

      </div>
    </section>