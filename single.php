<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dreamway_Media
 */

get_header();
?>
<style>
.copyMessage {
  display: none;
  color: green;
  transition: opacity 0.5s;
}

.copyMessage.show {
  display: inline-block;
  opacity: 1;
}
 #submit{
	 width: 100%;
    height: 50px;
    background: #101010;
    color: #fff;
    font-weight: bold;
    font-size: 14px;
    margin-top: 30px;
    border-radius: 6px;
    border: none;
    outline: none;
 }
</style>
<!--header slider-->
<section class="header-slider-wrap inner-header-slider-wrap"> 
 
		<?php
		while ( have_posts() ) :
			the_post();
			$post_id = get_the_ID();
			$blog_sidebar_image = get_field('blog_sidebar_image',$post_id);
			?>
			
			
		
  <!--slider-->
  <section class="blog-single-wrap">
    <div class="container">
      <h1> <?php the_title(); ?></h1>
      <p> Posted on <?php the_date(); ?> </p>
      <span> <?php echo get_the_category( $post_id )[0]->name;?> </span> </div>
  </section>
  <!--slider--> 
  
</section>
<!--header slider--> 
<!--content-->
<section class="content-main-wrap"> 
  
  <!--slider image-->
  <div class="container">
    <div class="blog-image-wrap"> <img src="<?php echo  wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))?>" alt="<?php the_title(); ?> "> </div>
  </div>
  <!--slider image--> 
  
  <!--blog detail-->
  <div class="blog-detail-wrap">
    <div class="container">
      <div class="row"> 
         <!--detail-->
        <div class="col-md-9">
          <div class="blog-detail-wraper">
			<?php the_content(); ?>
        
			<div class="Share-this-post-wrap">
              <h5> Share this post </h5>
						<div id="shareButtons">
							  <a href="<?php echo get_the_permalink() ?>" id="twitterLink">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/twiiter.svg" alt="twitter"> Share on Twitter
							  </a>
							  <span class="copyMessage" id="twitterMessage">Copied</span>

							  <a href="<?php echo get_the_permalink() ?>" id="facebookLink">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/facebook.svg" alt="facebook"> Share on Facebook
							  </a>
							  <span class="copyMessage" id="facebookMessage">Copied</span>

							  <a href="<?php echo get_the_permalink() ?>" id="linkedInLink">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/linked.svg" alt="linkedin"> Share on LinkedIn
							  </a>
							  <span class="copyMessage" id="linkedInMessage">Copied</span>
						</div>

					
				<div class="leave-comment-wrap">
							<?php 

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
				?>
				</div>
			</div>

<?php 
		endwhile; // End of the loop.
		?>
  </div>
    </div>
	 <div class="col-md-3">
          <div class="right-blog-wrap"> <img src="<?php echo $blog_sidebar_image['url'];?>" alt="<?php echo $blog_sidebar_image['alt'];?>"> </div>
        </div>
      </div>
    </div>
  </div>
  <!--cta-->
  <div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="zoom-out-down" class="aos-init aos-animate"> Ready to unlock the full potential <br>
        of your business with a dynamic <br>
        digital strategy? </h2>
      <div class="btn-cta-wrap aos-init aos-animate" data-aos="fade-up"><a href="#">Start now </a></div>
    </div>
  </div>
  <!--cta--> 
  
</section>
<!--content--> 
<?php
//get_sidebar();
get_footer();
?>
<script>
// Function to copy a given text to the clipboard
function copyTextToClipboard(text) {
  const textArea = document.createElement("textarea");
  textArea.value = text;
  document.body.appendChild(textArea);
  textArea.select();
  document.execCommand("copy");
  document.body.removeChild(textArea);
}

// Function to show and hide a message element
function showMessage(messageElement) {
  messageElement.classList.add("show");
  setTimeout(() => {
    messageElement.classList.remove("show");
  }, 2000); // Hide the message after 2 seconds (adjust the duration as needed)
}

// Get the share buttons and messages containers
const twitterButton = document.getElementById("twitterLink");
const facebookButton = document.getElementById("facebookLink");
const linkedInButton = document.getElementById("linkedInLink");

const twitterMessage = document.getElementById("twitterMessage");
const facebookMessage = document.getElementById("facebookMessage");
const linkedInMessage = document.getElementById("linkedInMessage");

// Add click event listeners to each button
twitterButton.addEventListener("click", function (event) {
  event.preventDefault();
  copyTextToClipboard(twitterButton.getAttribute("href"));
  showMessage(twitterMessage);
});

facebookButton.addEventListener("click", function (event) {
  event.preventDefault();
  copyTextToClipboard(facebookButton.getAttribute("href"));
  showMessage(facebookMessage);
});

linkedInButton.addEventListener("click", function (event) {
  event.preventDefault();
  copyTextToClipboard(linkedInButton.getAttribute("href"));
  showMessage(linkedInMessage);
});


</script>