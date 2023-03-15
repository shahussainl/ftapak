
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
       <?php include'headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Latest Updates</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Details</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-8 col-md-7 m-b10">
                        <!-- blog start -->
                        <div class="blog-post blog-single blog-style-1">
							<div class="dez-post-meta">
								<ul class="d-flex align-items-center">
									<li class="post-date"><i class="fa fa-calendar"></i><?php echo date('d M Y',strtotime($newsDetail['n_u_date'])) ;?></li>
									<li class="post-author"><i class="fa fa-user"></i>By <a href="#"><?php echo $newsDetail['user_fullname']; ?></a> </li>
									<!-- <li class="post-comment"><i class="fa fa-comments-o"></i><a href="#">5k</a> </li> -->
								</ul>
							</div>
                            <div class="dez-post-title">
                                <h4 class="post-title m-t0"><a href="blog-details.html"><?php echo $newsDetail['n_u_title'];?></a></h4>
                            </div>
                            <div class="dez-post-media dez-img-effect zoom-slow m-t20"> <a href="#">
                                <img src="<?php echo base_url('uploads/'.$newsDetail['img']);?>" alt=""></a> </div>
                                <div class="dez-post-title">
                                <h4 class="post-title mt-3"><a href="blog-details.html"><?php echo $newsDetail['n_u_short_desc'];?></a></h4>
                            </div>
                            <div class="dez-post-text">
                                <p><?php echo $newsDetail['n_u_long_desc']; ?></p>

                            
                            </div>
                      <!--       <div class="dez-post-tags clear">
                                <div class="post-tags">
									<a href="javascript:void(0);">Child </a> 
									<a href="javascript:void(0);">Eduction </a> 
									<a href="javascript:void(0);">Money </a> 
									<a href="javascript:void(0);">Resturent </a> 
								</div>
                            </div> -->
							<div class="dez-divider bg-gray-dark op4"><i class="icon-dot c-square"></i></div>
					<!-- 		<div class="share-details-btn">
								<ul>
									<li><h5 class="m-a0">Share Post</h5></li>
									<li><a href="javascript:void(0);" class="site-button facebook button-sm"><i class="fa fa-facebook"></i> Facebook</a></li>
									<li><a href="javascript:void(0);" class="site-button google-plus button-sm"><i class="fa fa-google-plus"></i> Google Plus</a></li>
									<li><a href="javascript:void(0);" class="site-button linkedin button-sm"><i class="fa fa-linkedin"></i> Linkedin</a></li>
									<li><a href="javascript:void(0);" class="site-button instagram button-sm"><i class="fa fa-instagram"></i> Instagram</a></li>
									<li><a href="javascript:void(0);" class="site-button twitter button-sm"><i class="fa fa-twitter"></i> Twitter</a></li>
									<li><a href="javascript:void(0);" class="site-button whatsapp button-sm"><i class="fa fa-whatsapp"></i> Whatsapp</a></li>
								</ul>
							</div> -->
                        </div>
             <!--            <div class="clear" id="comment-list ">
                            <div class="comments-area" id="comments">
                                <h2 class="comments-title">8 Comments</h2>
                                <div class="clearfix m-b20 myCommentDiv">
                                     comment list END -->
                                    <!-- <ol class="comment-list">
                                        <li class="comment">

                                         <?php
                                        //foreach ($comment as $commentRow) 

                                        {
                                        ?>     
                                            <div class="comment-body">
                                                <div class="comment-author vcard"> 
                                                    <img  class="avatar photo" src="<?php //echo base_url('front_asset/images/testimonials/pic1.jpg');?>" alt=""> 
                                                    <cite class="fn"><?php //echo $commentRow['coment']->name;?></cite> <span class="says">says:</span> </div>
                                                <div class="comment-meta"> <a href="javascript:void(0);">October 6, 2015 at 7:15 am</a> </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae neqnsectetur adipiscing elit. Nam viae neqnsectetur adipiscing elit.
                                                    Nam vitae neque vitae sapien malesuada aliquet. </p>
                                                <div class="reply"> 
                                                    <a href="" id="<?php //echo $commentRow['coment']->comment_id;?> " class="comment-reply-link btn_edit" data-toggle="modal" data-target="#replyModel" >Reply</a> 
                                                </div>
                                            </div>
                                        -->
                                  <!--           <ol class="children">
                                                <li class="comment odd parent">
                                                    <?php
                                                       //foreach($commentRow['replyy'] as $re)
                                                      {
                                                    ?> 

                                                         
                                                   <div class="comment-body">
                                                        <div class="comment-author vcard"> 
                                                            <img  class="avatar photo" src="<?php //echo base_url('front_asset/images/testimonials/pic2.jpg');?>" alt=""> 
                                                            <cite class="fn"><?php //echo $re['name']; ?></cite> 
                                                            <span class="says">says:</span> 
                                                        </div>
                                                        <div class="comment-meta"> 
                                                            <a href="javascript:void(0);">October 6, 2015 at 7:15 am</a> 
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae neque vitae sapien malesuada aliquet. 
                                                            In viverra dictum justo in vehicula. Fusce et massa eu ante ornare molestie. Sed vestibulum sem felis, 
                                                            ac elementum ligula blandit ac.</p>
                                                        <div class="reply"> <a href="" id="<?php //echo $commentRow['coment']->comment_id;?> "class="comment-reply-link btn_edit" data-toggle="modal" data-target="#replyModel">Reply</a> </div>
                                                    </div>


                                                    <?php 
                                                      }
                                                    ?> -->
                                          
                                              
                                                    <!-- list END -->
                                    <!--             </li>
                                            </ol>
                                              <?php
                                        }
                                        ?>  -->
                                            <!-- list END -->
                                    <!--     </li>
                               
                                    
                                       
                                    </ol> -->
                                    <!-- comment list END -->
                                    <!-- Form -->
                             <!--        <div class="comment-respond" id="respond">
                                        <h4 class="comment-reply-title" id="reply-title">Leave a Reply <small> <a style="display:none;" href="javascript:void(0);" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a> </small> </h4>
                                        <form class="comment-form myfrminsert">
                                            <p class="comment-form-author">
                                                <label for="author">Name <span class="required">*</span></label>
                                                <input type="text"  name="author"  placeholder="Author" id="author">
                                            </p>
                                            <p class="comment-form-email">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input type="text"  placeholder="Email" name="email" id="email">
                                            </p>
                                            <p class="comment-form-url">
                                                <label for="url">Contact</label>
                                                <input type="text"   placeholder="Contact"  name="contact" id="url">
                                            </p>
                                            <p class="comment-form-comment">
                                                <label for="comment">Comment</label>
                                                <textarea rows="8" name="comment" placeholder="Comment" id="comment"></textarea>
                                                <input type="hidden" name="idd" value="<?php //echo $newsDetail['n_u_id']; ?>">
                                            </p>
                                            <p class="form-submit">
                                                <input type="submit" value="Post Comment" class="submit site-button" id="submit" name="submit">
                                            </p>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>  -->
                        <!-- blog END -->
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-4 col-md-5 sticky-top">
                        <aside  class="side-bar">
                            <div class="widget">
                                <h6 class="widget-title style-1">Search</h6>
                                <div class="search-bx style-1">
                                    <form role="search" method="post">
                                        <div class="input-group">
                                            <input name="text" class="form-control" placeholder="Enter your keywords..." type="text">
                                            <span class="input-group-btn">
												<button type="submit" class="fa fa-search text-primary"></button>
                                            </span> 
										</div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget recent-posts-entry">
                                <h6 class="widget-title style-1">Recent Posts</h6>
                                <div class="widget-post-bx">
                                    <?php
                                      foreach ($recentNews as $key => $rowRecent) 
                                      {
                                    ?>

                                      <div class="widget-post clearfix">
                                        <div class="dez-post-media"> 
                                            <img src="<?php echo base_url('uploads/'.$rowRecent['img']);?>" width="200" height="143" alt=""> 
                                        </div>
                                        <div class="dez-post-info">
                                            <div class="dez-post-header">
                                                <h6 class="post-title">
                                                    <a href="<?php echo base_url('Pages/newsFeedDetail/'.$rowRecent['n_u_id']);?>">
                                                    <?php echo $rowRecent['n_u_title'];?>      
                                                    </a>
                                                </h6>
                                            </div>
											<div class="dez-post-meta">
												<ul class="d-flex align-items-center">
													<li class="post-date"><i class="fa fa-calendar"></i><?php echo date('d M Y',strtotime($rowRecent['n_u_date'])); ?>
                                                    </li>
													<li class="post-comment"><a href="#"><i class="fa fa-comments-o"></i>5k</a> 
                                                    </li>
												</ul>
											</div>
                                         </div>
                                       </div>
                                   
                                    <?php     
                                      }
                                    ?>
                                </div>
                            </div>
							
							<!--     <div class="widget widget_gallery gallery-grid-3">
                                <h6 class="widget-title style-1">Our services</h6>
                                <ul>
                                    <li><div class="dez-post-thum">
										<a href="javascript:void(0);" class="dez-img-overlay1 dez-img-effect zoom-slow">
											<img src="<?php //echo base_url('front_asset/images/gallery/pic2.jpg');?>" alt="">
										</a></div>
									</li>
                                    <li><div class="dez-post-thum">
										<a href="javascript:void(0);" class="dez-img-overlay1 dez-img-effect zoom-slow">
											<img src="<?php //echo base_url('front_asset/images/gallery/pic1.jpg');?>" alt="">
										</a></div>
									</li>
                                    <li><div class="dez-post-thum">
										<a href="javascript:void(0);" class="dez-img-overlay1 dez-img-effect zoom-slow">
											<img src="<?php //echo base_url('front_asset/images/gallery/pic5.jpg');?>" alt="">
										</a></div>
									</li>
                                    <li><div class="dez-post-thum">
										<a href="javascript:void(0);" class="dez-img-overlay1 dez-img-effect zoom-slow">
											<img src="<?php //echo base_url('front_asset/images/gallery/pic7.jpg');?>" alt="">
										</a></div>
									</li>
                                    <li><div class="dez-post-thum">
										<a href="javascript:void(0);" class="dez-img-overlay1 dez-img-effect zoom-slow">
											<img src="<?php //echo base_url('front_asset/images/gallery/pic8.jpg');?>" alt="">
										</a></div>
									</li>
                                    <li><div class="dez-post-thum">
										<a href="javascript:void(0);" class="dez-img-overlay1 dez-img-effect zoom-slow">
											<img src="<?php //echo base_url('front_asset/images/gallery/pic9.jpg');?>" alt="">
										</a></div>
									</li>
                                </ul>
                            </div>
							
						
							
						<div class="widget widget-newslatter">
                                <h6 class="widget-title style-1">Newsletter</h6>
                                <div class="news-box">
									<p>Enter your e-mail and subscribe to our newsletter.</p>
                                    <form class="dzSubscribe" action="script/mailchamp.php" method="post">
										<div class="dzSubscribeMsg"></div>
                                        <div class="input-group">
                                            <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email"/>
											<button name="submit" value="Submit" type="submit" class="site-button btn-block">Subscribe Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                        </aside>
                    </div>
                    <!-- Side bar END -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->
	<!-- Modal Box -->
	<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body row m-a0 clearfix">
					<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(<?php echo base_url('front_asset/images/background/bg3.jpg');?>);  background-position:center; background-size:cover;">
						<div class="form-info text-white align-self-center">
							<h3 class="m-b15">Login To You Now</h3>
							<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>
							<ul class="list-inline m-a0">
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 p-a0">
						<div class="lead-form browse-job text-left">
							<form>
								<h3 class="m-t0">Personal Details</h3>
								<div class="form-group">
									<input value="" class="form-control" placeholder="Name"/>
								</div>	
								<div class="form-group">
									<input value="" class="form-control" placeholder="Mobile Number"/>
								</div>
								<div class="clearfix">
									<button type="button" class="btn-primary site-button btn-block">Submit </button>
								</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<!-- Modal Box End -->
	




<style type="text/css">
    .modal-backdrop{
        z-index: 0 !important;
    }
</style>



  <!-- The Modal -->
  <div class="modal fade bd-example-modal-md" id="replyModel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reply</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
           <form  class="modalInsert" method="post">

               <div class="form-group">
                 <label for="pwd">Name :</label>
                 <input type="text" name="name" class="form-control" id="pwd">
                 <input type="hidden" name="id" class="form-control" id="pwd">
               </div>
               <div class="form-group">
                 <label for="email">Email :</label>
                 <input type="email" name="email" class="form-control" id="email">
               </div>
               <div class="form-group">
                 <label for="pwd">Contact :</label>
                 <input type="text" name="contact" class="form-control" id="pwd">
               </div>
                <div class="form-group">
                 <label for="pwd">Comment :</label>
                 <textarea class="form-control" name="comment_msg" rows="6"></textarea>
               </div>
              
               <input  type="submit" name="submit"  value="submit">
         </form>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div> 



