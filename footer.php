<?php
    require_once "./logic/database/connection.php";
    include('logic/services/modalError.php');
?>


  <footer class=" text-center text-white" id="footer">
    <div class="container p-4">
      <section class="mb-4">
        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fa-brands fa-facebook-f"></i></a>
        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>
      </section>
      
      <section class="">
        <form method="POST" action="./logic/services/newsLetterService.php">
          <div class="row d-flex justify-content-center">
            <div class="col-auto">
              <p class="pt-2">
                <strong>Sign up for our newsletter</strong>
              </p>
            </div>
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example2" class="form-control" placeholder="Email Addres" name="email"/>
              </div>
            </div>

            <div class="col-auto">
              <button type="submit" class="btn btn-outline-light mb-4" name="newsInd">
                Subscribe
              </button>
            </div>
          </div>
        </form>
      </section>

    </div>
    <div class="text-center p-3" id="copyright">
      © 2023 Copyright:
      <a class="text-white" href="#"> PandaWork </a>
    </div>
</footer>