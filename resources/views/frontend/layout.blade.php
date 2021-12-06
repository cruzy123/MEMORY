<!DOCTYPE html>
<!--
Template Name: Foxclore
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->

<head>
  <title>SystGesAct</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="{{ asset('assets/layout/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">

  <link defer rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

  <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body id="top">
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- Top Background Image Wrapper -->
  <div class="bgded overlay" style="background-image:url('assets/images/demo/backgrounds/01.png');">
    <!-- ################################################################################################ -->
    <header id="header" class="hoc clear">
      <!-- ################################################################################################ -->
      <div id="logo" class="one_quarter first">
        <h1><a href="index.html">SystGesAct</a></h1>
        <p>Gestion des demandes</p>
      </div>
      <div class="three_quarter">
        <ul class="nospace clear">
          <li class="one_third first">
            <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Appelez-nous:</strong>
                +229 67236671</span></div>
          </li>
          <li class="one_third">
            <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Envoyez-nous un
                  mail:</strong> support@domain.com</span></div>
          </li>
          <li class="one_third">
            <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Lun. - Sam.:</strong>
                08.00am - 18.00pm</span></div>
          </li>
        </ul>
      </div>
      <!-- ################################################################################################ -->
    </header>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <section id="navwrapper" class="hoc clear">
      <!-- ################################################################################################ -->
      <nav id="mainav">
        <ul class="clear">
          <li class="active"><a href="/frontend/index">Acceuil</a></li>
          <li><a href="/login">Se connecter</a></li>
          <li><a href="/frontend/services">Services</a></li>
          <li><a href="/frontend/suivre">Suivre une demande</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </section>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div id="pageintro" class="hoc clear">
      <!-- ################################################################################################ -->
      <article>
        <h4 class="heading">Le partenaire des travailleurs</h4>
        <p>Vous etes employés de l'université d'Abomey-Calavi</p>
        <p>Facilitez-vous la vie en éffectuant nos demandes depuis cette plateforme</p>
      </article>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
  </div>
  <!-- End Top Background Image Wrapper -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    @yield('content')
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="bgded overlay row4" style="background-image:url('assets/images/demo/backgrounds/01.png');">
    <footer id="footer" class="hoc clear">
      <!-- ################################################################################################ -->

      <div class="center btmspace-50">
        <ul class="faico clear">
          <li><a class="faicon-dribble" href="#"><i class="fab fa-dribbble"></i></a></li>
          <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
          <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
        </ul>
        <p class="nospace">Contactez-nous</p>
      </div>
      <!-- ################################################################################################ -->

      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
    </footer>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear">
      <!-- ################################################################################################ -->
      <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
      <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="{{ asset('assets/layout/scripts/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/layout/scripts/jquery.backtotop.js') }}"></script>
  <script src="{{ asset('assets/layout/scripts/jquery.mobilemenu.js') }}"></script>
</body>

</html>