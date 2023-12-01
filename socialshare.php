<style>
/* Social share widget */

.ssbats-social-share {
  display: flex;
  align-content: center;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: wrap;
}

.ssbats-social-share-label {
  margin-right: 14px;
  font-weight: 700;
}

.ssbats-social-share-buttons a {
  display: inline-block;
  color: #333333;
  background-color: #ffffff;
  text-decoration: none;
  font-size: 14px;
  font-weight: 400;
  border: 1px solid #999999;
  padding: 2px 10px;
  border-radius: 4px;
  margin: 5px 5px 5px 0;
  cursor: pointer;
  box-shadow: 1px 1px 2px rgba(0,0,0,.25);
  transition: 150ms ease-in-out;
}

.ssbats-social-share-buttons a span:before {
  content: '';
  width: 14px;
  height: 14px;
  display: inline-block;
  font-weight: 400;
  margin-right: 5px;
  margin-bottom: -1px;
  background-repeat: none;
  filter: invert(100%) brightness(20%);
  transition: 150ms ease-in-out;
}

.ssbats-social-share-buttons a.ssbats-share-facebook span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/facebook.svg');
}

.ssbats-social-share-buttons a.ssbats-share-twitter span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/twitter.svg');
}

.ssbats-social-share-buttons a.ssbats-share-linkedin span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/linkedin.svg');
}

.ssbats-social-share-buttons a.ssbats-share-pinterest span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/pinterest.svg');
}

.ssbats-social-share-buttons a.ssbats-share-tumblr span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/tumblr.svg');
}

.ssbats-social-share-buttons a.ssbats-share-reddit span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/reddit.svg');
}

.ssbats-social-share-buttons a.ssbats-share-whatsapp span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/whatsapp.svg');
}

.ssbats-social-share-buttons a.ssbats-share-telegram span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/telegram.svg');
}

.ssbats-social-share-buttons a.ssbats-share-pocket span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/pocket.svg');
}

/* Social share widget hover state */

.ssbats-social-share-buttons a:hover {
  background-color: #333333;
  color: #ffffff;
  box-shadow: 0 0 6px rgba(0,0,0,.5);
}

.ssbats-social-share-buttons a:hover span:before {
  filter: invert(100%);
}

.ssbats-social-share-buttons a.ssbats-share-facebook:hover {
  background-color: #1877f2;
  border-color: #1877f2;
}

.ssbats-social-share-buttons a.ssbats-share-twitter:hover {
  background-color: #1da1f2;
  border-color: #1da1f2;
}

.ssbats-social-share-buttons a.ssbats-share-linkedin:hover {
  background-color: #0077b5;
  border-color: #0077b5;
}

.ssbats-social-share-buttons a.ssbats-share-pinterest:hover {
  background-color: #bd081c;
  border-color: #bd081c;
}

.ssbats-social-share-buttons a.ssbats-share-tumblr:hover {
  background-color: #36465d;
  border-color: #36465d;
}

.ssbats-social-share-buttons a.ssbats-share-reddit:hover {
  background-color: #ff4500;
  border-color: #ff4500;
}

.ssbats-social-share-buttons a.ssbats-share-whatsapp:hover {
  background-color: #25d366;
  border-color: #25d366;
}

.ssbats-social-share-buttons a.ssbats-share-telegram:hover {
  background-color: #2ca5e0;
  border-color: #2ca5e0;
}

.ssbats-social-share-buttons a.ssbats-share-pocket:hover {
  background-color: #ef3f56;
  border-color: #ef3f56;
}
</style>
<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$postcontent = $rs['title'] . " : " . $actual_link;
?>
<!-- Share Widget Starts Here -->
  <div class="ssbats-social-share">
    <span class="ssbats-social-share-label">Share on:</span>
    <div class="ssbats-social-share-buttons">
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" class="ssbats-share-facebook ssbats-share-popup"><span>facebook</span></a>
      <a href="https://www.twitter.com/intent/tweet?url=<?php echo $postcontent; ?>" class="ssbats-share-twitter ssbats-share-popup"><span>twitter</span></a>
      <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $actual_link; ?>" class="ssbats-share-linkedin ssbats-share-popup"><span>linkedin</span></a>
      <a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-custom="true" class="ssbats-share-pinterest"><span>pinterest</span></a>
       <a href="https://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $actual_link; ?>" class="ssbats-share-tumblr ssbats-share-popup"><span>tumblr</span></a>
      <a href="https://www.reddit.com/submit?url=<?php echo $actual_link; ?>" class="ssbats-share-reddit ssbats-share-popup"><span>reddit</span></a>
      <a href="https://api.whatsapp.com/send?text=<?php echo $postcontent; ?>" class="ssbats-share-whatsapp"><span>whatsapp</span></a>
      <a href="https://telegram.me/share/url?url=<?php echo $postcontent; ?>" class="ssbats-share-telegram ssbats-share-popup"><span>telegram</span></a>
    </div>
  </div>
  <script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<!-- Share Widget Ends Here -->
<script>
document.querySelectorAll('.ssbats-share-popup').forEach( item =>
      item.addEventListener('click', (event) => {
      var window_size = "width=530,height=400";
      var social = item.href.split("/")[2];
      switch(social) {
          case "www.facebook.com":
              window_size = "width=530,height=640";
              break;
          case "www.twitter.com":
              window_size = "width=585,height=261";
              break;
          case "www.linkedin.com":
              window_size = "width=585,height=600";
              break;
          case "tumblr.com":
              window_size = "width=540,height=600";
              break;
          case "www.reddit.com":
              window_size = "width=600,height=600";
              break;
      }
      window.open(item.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' + window_size);
      event.preventDefault();
      return false;
}));

document.querySelectorAll('.ssbats-social-share a').forEach( item => {
    item.href = item.href.replace( "URL_HERE", document.URL);
});
</script>