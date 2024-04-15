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

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
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

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('backend/assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">SIG</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('backend/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('/') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/insert') }}">
          <i class="bi bi-grid"></i>
          <span>Insert Data</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/view') }}">
          <i class="bi bi-card-list"></i>
          <span>View Data</span>
        </a>
      </li><!-- End Register Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Insert Data</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
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
              iconUrl: '{{ asset('backend/assets/img/icon.png') }}',
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

    <div class="card">
      <div class="card-body">
          @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <h5 class="card-title">Form Input Data</h5>
          <!-- No Labels Form -->
          <form class="row g-3" method="POST" action="{{ route('data.store') }}"
              enctype="multipart/form-data">
              @csrf
              <div class="col-md-12">
                  <input type="text" class="form-control" name="nama_rs" placeholder="Nama Rumah Sakit">
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control" name="latitude" placeholder="Latitude">
              </div> 
              <div class="col-md-12">
                <input type="text" class="form-control" name="longtitude" placeholder="Longtitude">
              </div>           
              <div class="text-center">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-secondary">Batal</button>
              </div>
          </form><!-- End No Labels Form -->
      </div>
  </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>

</body>

</html>