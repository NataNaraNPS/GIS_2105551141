<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
  crossorigin=""/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
 integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
 crossorigin=""></script>

  <title>GIS_2105551141</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="{{ asset('frontend/assets/css/variables.css') }}" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    #mapid { height: 500px; }

    .leaflet-popup-content {
        width: 250px;
        height: 100px;
    }

    .col {
        float: left;
        width: 35%;
    }
    .col2 {
        float: left;
        width: 65%;
        text-align: right;
    }
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
  </style>

</head>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>SIG<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="index.html#map">Map</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

      <a class="btn-getstarted scrollto" href="{{ url('/login') }}">Get Started</a>

    </div>
  </header><!-- End Header -->

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="{{ asset('frontend/assets/img/hero-carousel/hero-carousel-3.svg') }}" class="img-fluid animated">
      <h2>Sistem Informasi <span>Geografis</span></h2>
      <p>Website untuk menguji fitur-fitur Sistem Informasi Geografis.</p>
      <div class="d-flex">
        <a href="{{ url('/login') }}" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </section>

  <main id="main">

    <!-- ======= Map Section ======= -->
    <section id="map" class="map">
      <div class="container">
        <div class="section-header">
          <h2>Map</h2>
          <p>Uji marker dengan cara klik map di bawah ini.<br>
          (Jika ingin mendapatkan fitur lengkap, login dengan cara klik tombol Get Started diatas)</p>
        </div>
      </div>

    <div class="container-fluid">

      <div id="mapid"></div>
  
      <!--script src="bzip2.js"></script-->
      <script>
          // Menampilkan peta
          var mymap = L.map('mapid').setView([-8.4095188,115.188919], 11);
  
          // Menambahkan layer peta
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
              maxZoom: 18,
          }).addTo(mymap);
  
          // Array markers
          var markers = [];
  
          // Is On Drag
          var isOnDrag = false;
  
          // Membuat icon dari gambar PNG
          var myIcon = L.icon({
              iconUrl: 'assets/img/icon.png',
              iconSize: [40, 40],
              iconAnchor: [20, 40],
          });
  
          // Format popup content
          formatContent = function(lat, lng, index){
              return `
                  <div class="wrapper">
                      <div class="row">
                          <div class="cell merged" style="text-align:center">Marker [ ${index+1} ]</div>
                      </div>
                      <div class="row">
                          <div class="col">Latitude</div>
                          <div class="col2">${lat}</div>
                      </div>
                      <div class="row">
                          <div class="col">Longitude</div>
                          <div class="col2">${lng}</div>
                      </div>
                      <div class="row">
                          <div class="col">Left click</div>
                          <div class="col2">New marker / show popup</div>
                      </div>
                      <div class="row">
                          <div class="col">Right click</div>
                          <div class="col2">Delete marker</div>
                      </div>
                  </div>
              `;
          }
  
          addMarker =  function(latlng,index){
  
              // Menambahkan marker
              var marker = L.marker(latlng,{
                  icon: myIcon,
                  draggable: true
              }).addTo(mymap);
  
              // Membuat popup baru
              var popup = L.popup({ offset: [0, -30]})
                  .setLatLng(latlng);
              
              // Binding popup ke marker
              marker.bindPopup(popup);
  
              // Menambahkan event listener pada marker
              marker.on('click', function() {
                  popup.setLatLng(marker.getLatLng()),
                  popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng,index));
              });
  
              marker.on('dragstart', function(event) {
                  isOnDrag = true;
              });
  
              // Menambahkan event listener pada marker
              marker.on('drag', function(event) {
                  popup.setLatLng(marker.getLatLng()),
                  popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng,index));
                  marker.openPopup();
              });
  
              marker.on('dragend', function(event) {
                  setTimeout(function() {
                      isOnDrag = false;
                  }, 500);
              });
  
              marker.on('contextmenu', function(event) {
                  // Hapus semua marker dari array markers
                  markers.forEach(function (m,i) {
                      if(marker == m){
                          m.removeFrom(mymap); // hapus marker dari peta
                          markers.splice(i, 1);
                      }
                  });
                  //console.log(markers);
              });
  
              // Return marker
              return marker;
          }
  
          // Tambahkan event listener click pada peta
          mymap.on('click', function(e) {
              console.log(isOnDrag);
              if(!isOnDrag){
                  // Buat marker baru
                  var newMarker = addMarker(e.latlng,markers.length);
                  
                  // Tambahkan marker ke array markers
                  markers.push(newMarker);
          console.log(markers);
              }
          });
  
          // Ambil data dari server dalam format JSON menggunakan method fetch()
          fetch("baca.php").then(function(response) {
                  // return response.text();
                  return response.json();
              })
              .then(function(data) {
                   console.log(data);
                   //const originalData = ArchUtils.bz2.decode(data);
                   //console.log(originalData);
                   //console.log(JSON.stringify(data).length);
  
                  data.forEach(function(c,i){
                      let latlng = L.latLng(c[0], c[1]);
                      var newMarker = addMarker(latlng,markers.length);
                      markers.push(newMarker);
                  })
              })
              .catch(function(error) {
                  console.log(error);
              });
          
      </script>
    </div>

    </section><!-- End Map Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>HeroBiz</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>