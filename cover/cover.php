<div class="cover" id="cover">
  <header>
    <svg width="0" height="0">
      <defs>
        <clipPath id="round">
          <circle cx="120" cy="120" r="120">
        </clipPath>
      </defs>
    </svg>
    <a href="http://leibrug.pl" id="avatar">
      <img style="clip-path:url(#round);"
           src="<?php echo get_stylesheet_directory_uri(); ?>/cover/michal-gurbiel-avatar.jpg"
           srcset="<?php echo get_stylesheet_directory_uri(); ?>/cover/michal-gurbiel-avatar.jpg 1x,
                   <?php echo get_stylesheet_directory_uri(); ?>/cover/michal-gurbiel-avatar-2x.jpg 2x">
    </a>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum sapien nunc, pretium euismod purus dignissim a. Aliquam risus libero, volutpat id tellus aliquam, accumsan rutrum odio.</p>
  </header>
  <main>
    <div>
      <section>
        <h2>Work</h2>
        <ul>
          <li>
            <a href="http://leibrug.pl/blog/cinema-citizen/">Cinema Citizen</a><small>web</small>
            <p>
              Movie marathon planning app.<br>
              <a href="http://cctzn.leibrug.pl">http://cctzn.leibrug.pl</a>
            </p>
          </li>
          <li>
            <a href="http://leibrug.pl/blog/na-swoim/">Na swoim</a><small>web</small>
            <p>
              Real estate website for Lublin developer.<br>
              <a href="http://naswoim.lublin.pl">http://naswoim.lublin.pl</a>
            </p>
          </li>
          <li>
            <a href="http://leibrug.pl/blog/licytujkase-pl-rebranding/">licytujkase.pl rebranding</a><small>gfx</small>
            <p>
              New logo for All-pay games website.
            </p>
          </li>
        </ul>
        <p>
          <a href="http://leibrug.pl" id="seall">See all projects</a>
        </p>
      </section>
      <section>
<?php
  $cover_recent_posts = wp_get_recent_posts(array(
    'numberposts' => 5,
    'category' => 7
  ));
?>
        <h2>Blog</h2>
        <ul>
<?php foreach ($cover_recent_posts as $post) { ?>
          <li><a href="<?php echo get_permalink($post["ID"]); ?>"><?php echo $post["post_title"]; ?></a></li>
<?php } ?>
          </ul>
        <p>
          <a href="http://leibrug.pl/blog/category/blog/">See all posts</a>
        </p>
      </section>
      <section>
        <h2>Contact</h2>
        <ul>
          <li><a href="http://leibrug.pl/cv">CV</a></li>
          <li><a href="mailto:lachim@leibrug.pl">lachim@leibrug.pl</a></li>
          <li><a href="https://github.com/leibrug">GitHub</a></li>
          <li><a href="http://codepen.io/leibrug">CodePen</a></li>
          <li><a href="https://twitter.com/leibrug">Twitter</a></li>
        </ul>
      </section>
    </div>
  </main>
  <script>
    $(function() {
      $('#avatar, #seall').on('click', function(e) {
        e.preventDefault();
        $('#front').hide();
      });
    });
  </script>
</div>
