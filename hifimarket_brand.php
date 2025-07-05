<style>
.footer-brands {
  background-color: #111213; /* Footer background color */
  padding: 5px 0;
}

.brand-marquee {
  overflow: hidden;
  white-space: nowrap;
  display: flex;
  align-items: center;
}

.marquee-content {
  display: flex;
  animation: scroll-left 30s linear infinite;
}

.brand-logo {
  padding: 0 20px;
}

.brand-logo img {
  max-width: 150px;
  height: 60px;
}

@keyframes scroll-left {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(-100%);
  }
}

</style>

<section class="footer-brands py-12">
  <div class="brand-marquee">
    <div class="marquee-content">
      <div class="brand-logo">
        <img src="https://cdn-site-assets.veed.io/cdn-cgi/image/width=640,quality=75,format=auto/meta_5d91e3dc70/meta_5d91e3dc70.png" alt="Brand 1">
      </div>
      <div class="brand-logo">
        <img src="https://cdn-site-assets.veed.io/cdn-cgi/image/width=640,quality=75,format=auto/google_09644c00ae/google_09644c00ae.png" alt="Brand 2">
      </div>
 <div class="brand-logo">
        <img src="https://cdn-site-assets.veed.io/cdn-cgi/image/width=640,quality=75,format=auto/netflix_53cebd27b1/netflix_53cebd27b1.png" alt="Brand 2">
      </div>
 <div class="brand-logo">
        <img src="https://cdn-site-assets.veed.io/cdn-cgi/image/width=640,quality=75,format=auto/amazon_6eb4586569/amazon_6eb4586569.png" alt="Brand 2">
      </div>

 <div class="brand-logo">
        <img src="https://in.bmscdn.com/webin/common/icons/logo.svg" alt="Brand 2">
      </div>

 <div class="brand-logo">
        <img src="https://static.website-files.org/a/2d9805fde/_next/static/media/autodesk.5b44514a.png" alt="Brand 2">
      </div>

<div class="brand-logo">
        <img src="https://img10.hotstar.com/image/upload/f_auto,q_90,w_256/v1656431456/web-images/logo-d-plus.svg" alt="Brand 2">
      </div>
<div class="brand-logo">
        <img src="https://images.squarespace-cdn.com/content/v1/59f7c0c68fd4d20232a24b84/1514058041994-B9TCRG9KFTUMF4XDSDJQ/BrandLogos-Intel.png" alt="Brand 2">
      </div>
<div class="brand-logo">
        <img src="https://www.webviewgold.com/assets/review_images/envatotuts.webp" alt="Brand 2">
      </div>
<div class="brand-logo">
        <img src="https://www.webviewgold.com/assets/review_images/startupbwsummit.webp" alt="Brand 2">
      </div>

<div class="brand-logo">
        <img src="https://www.webviewgold.com/assets/review_images/trustpilot.webp" alt="Brand 2">
      </div>
<div class="brand-logo">
        <img src="https://www.carlogos.org/car-logos/tesla-logo-2004-black-download.png" alt="Brand 2">
      </div>

<div class="brand-logo">
        <img src="https://cdn.prod.website-files.com/603fea6471d9d8559d077603/66616bdf217f58d57aca6452_Microsoft.png" alt="Brand 2">
      </div>

<div class="brand-logo">
        <img src="https://cdn.prod.website-files.com/603fea6471d9d8559d077603/66b9f5fe0d6ab6a1d8ac341f_Cloudflare-Logo.svg" alt="Brand 2">
      </div>
<div class="brand-logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Binance_logo.svg/1280px-Binance_logo.svg.png" alt="Brand 2">
      </div>

<div class="brand-logo">
        <img src="https://www.luncmetrics.com/src/static/img/logos/kucoin-logo.png" alt="Brand 2">
      </div>

<div class="brand-logo">
        <img src="https://goviralhost.com/clientarea/assets/img/logo.png" alt="Brand 2">
      </div>


<div class="brand-logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/GoDaddy_logo.svg/2560px-GoDaddy_logo.svg.png" alt="Brand 2">
      </div>
<div class="brand-logo">
        <img src="https://corporate.indiamart.com/wp-content/uploads/2024/07/indiamart-logo.png" alt="Brand 2">
      </div>
<div class="brand-logo">
        <img src="https://vyaparapp.in/v/z/wp-content/uploads/2022/12/logo.webp" alt="Brand 2">
      </div>
<div class="brand-logo">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/4/4f/Life_Insurance_Corporation_of_India_%28logo%29.svg/1200px-Life_Insurance_Corporation_of_India_%28logo%29.svg.png" alt="Brand 2">
      </div>


<div class="brand-logo">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbqj9Ii13d6hx5a9kyLnC5A8A96LDSaSZv_w&s" alt="Brand 2">
      </div>



    </div>
  </div>
</section>

<script>
// Example: Add this script to control the animation on hover
const marquee = document.querySelector('.marquee-content');

marquee.addEventListener('mouseenter', () => {
  marquee.style.animationPlayState = 'paused';
});

marquee.addEventListener('mouseleave', () => {
  marquee.style.animationPlayState = 'running';
});

</script>
