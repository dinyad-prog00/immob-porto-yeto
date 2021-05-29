<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

  <div style="background-color: #6351ce;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Projet Web</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 fb-white text-light text-center text-md-right">

          <!-- Facebook -->
          ImmobPorto vient répondre à des problèmes en facilitant la recherche de logements que ce soit pour l’achat ou la location en répondant aux exigences des utilisateurs d’une part et en permettant à ces derniers d’y publier des annonces de demandes ou d’offres.
          
          
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Immob Porto</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Vendre, louer et acheter des immobiliers du moments. <br>
          Faire connaitre vos biens immobiliers au monde en postant des offres de vente ou de location.
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      
      <!-- Grid column -->

      <!-- Grid column -->
      
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contacts</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i>Dangbo IMSP</p>
        <p>
          <i class="fas fa-envelope mr-3"></i>donatien.yeto@imsp-uac.org</p>
        <p>
          <i class="fas fa-phone mr-3"></i> +229 66928690</p>
          <hr class="my-4">
        @guest
        <a class="text-info" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
      
           <br>
      
        <a class="text-info" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
        <hr class="my-2">
        @else
        
            <a class="nav-link" href="{{ route('home') }}">{{ __('Tableau de bord') }}</a>
        @endguest
      </div>
      <!-- Grid column -->
      
        
      

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright 
    <a href="#">Immob Porto</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->