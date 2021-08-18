<?php
include 'header.php';
?>
           
         <div class="banner_section layout_padding">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital"><span class="font_size_90">50%</span> Discount Online Shop</h4>
                                 <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration </p>
                                 <div class="book_bt"><a href="shop.php">Shop Now</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                        <form method="post" action="search.php">
                        <div class="button_main"><input type="text" class="Enter_text" placeholder="Enter keywords" name="search">
                        <button type="submit" name="searchbtn" class="search_text">Search</button></div>
                     </div>
                  </form>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital"><span class="font_size_90">50%</span> Discount Online Shop</h4>
                                 <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration </p>
                                 <div class="book_bt"><a href="shop.php">Shop Now</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                        <div class="button_main"><button class="all_text">All</button><input type="text" class="Enter_text" placeholder="Enter keywords" name=""><button class="search_text">Search</button></div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital"><span class="font_size_90">50%</span> Discount Online Shop</h4>
                                 <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration </p>
                                 <div class="book_bt"><a href="#">Shop Now</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                  </div>
               </div>
               
               <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class=""><img src="images/left-icon.png"></i>
               </a>
               <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class=""><img src="images/right-icon.png"></i>
               </a>
            </div>
         </div>
         <!--banner section end -->
      </div>
   
          <?php
              include 'footer.php';
              ?>

