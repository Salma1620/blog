<!-- FOOTER -->
<footer id="footer">
      <div class="container footer">
  
        <div class="card footer__content">
  
          <div class=" footer-top footer__container">
  
            <div class="footer-list">
  
              <a href="index.php" class="nav_logo footer-logo">BlogBurst</a>            
              <p class="footer-text">
              Stay informed with our blog, where we share insights, tips, and inspiration for a better online experience ! 
              </p>
            </div>
            <div class="footer-list">
    <p class="footer-list-title">Categories</p>
    <?php
    $recent_categories_query = "SELECT * FROM categories ORDER BY date_time ASC LIMIT 5";
    $recent_categories = mysqli_query($connexion, $recent_categories_query);
    if ($recent_categories) {
        while ($category = mysqli_fetch_assoc($recent_categories)) {
            echo '<ul>';
            echo '<li>';
            echo '<a href="' . ROOT_URL . 'category-posts.php?id=' . $category['id'] . '" class="category__buttons-container hover-2">' . $category['title'] . '</a>';
            echo '</li>';
            echo '</ul>';
        }
    }
    ?>
</div>

            <div class="footer-list">
              <p class="footer-list-title">Permalinks</p>
              <ul>
              
                  <li>
                    <a href="" class="footer-link hover-2">Home</a>
                  </li>
                  <li>
                    <a href="" class="footer-link hover-2">Blog</a>
                  </li>
                  <li>
                    <a href="" class="footer-link hover-2">Contact</a>
                  </li>
              </ul>
            </div>
            <div class="footer-list">
  
              <p class="footer-list-title">Join Our Community</p>
  
              <p class="footer-text">
              Subscribe to our newsletter and stay up to date with the latest articles, news, and updates.
              </p>    
              <?php if (isset($_SESSION['user-id'])) : ?>
              <a href="index.php" class="sub_button"><p>Sign Up</p></a>
              <?php else: ?>
                <a href="<?= ROOT_URL?>signup.php" class="sub_button"><p>Sign Up</p></a>
                <?php endif ?>
  
            </div>
          </div>
  
          <div class="footer-bottom">

            <div class="footer__socials">
              <p class="sm-header">Follow Us On</p>
              <div class="line"></div>
              <ul class="social-list">
                <li class="social-item">
                  <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="social-item">
                  <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="social-item">
                  <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="social-item">
                  <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                </li>
              </ul>
            </div>

            <p class="footer__copyright">
              &copy; Developed By <a href="#" class="footer__copyright-link">ENSAO Engineers</a>
            </p>

          </div>
        </div>
  
      </div>
    </footer>
    <!--END OF FOOTER-->
    <script src="<?= ROOT_URL?>js\main.js"></script>
    <script src="<?= ROOT_URL?>js\swiper.js"></script>
    </body>
</html>