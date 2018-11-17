<?php
   require_once(__DIR__.'/../_includes/header.php');
   require_once(__DIR__.'/../_includes/nav.php');
?>

<main role="main-home-wrapper" class="container">
   <div class="row">
      <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
         <article role="pge-title-content">
            <header>
               <h2><span>3HC</span> Hip hop Connexion <br>& Haz'art</h2>
            </header>
            <p>Vos associations de danse à Franconville et Plessis Bouchard.</p>
            <p><?php if(!empty($notice)){ echo "<p class='alert alert-success'>$notice</p>"; } ?></p>
         </article>
      </section>
      <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
         <figure class="effect-oscar">
            <img src="images/home-images/image-1.jpg" alt="" class="img-responsive"/>
            <figcaption>
               <h2>L'ACTU<span></span></h2>
               <p>Les informations importantes.</p>
               <a href="works-details.html">PLUS</a>
            </figcaption>
         </figure>
      </section>
      <div class="clearfix"></div>
      <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
         <ul class="grid-lod effect-2" id="grid">
            <li>
               <figure class="effect-oscar">
                  <img src="images/home-images/image-2.jpg" alt="" class="img-responsive"/>
                  <figcaption>
                     <h2>Nos <span>Professeurs</span></h2>
                     <p>Rétrouvez tous nos professeurs</p>
                     <a href="">PLUS</a>
                  </figcaption>
               </figure>
            </li>
            <li>
               <figure class="effect-oscar">
                  <img src="images/home-images/image-4.jpg" alt="" class="img-responsive"/>
                  <figcaption>
                     <h2>Le <span>Staff</span></h2>
                     <p>Le staff de l'association au complet</p>
                     <a href="">PLUS</a>
                  </figcaption>
               </figure>
            </li>
            <li>
               <figure class="effect-oscar">
                  <img src="images/home-images/image-2.jpg" alt="" class="img-responsive"/>
                  <figcaption>
                     <h2>Nos <span>cous</span></h2>
                     <p>Vous pourrez ici vous abonner a vos cours preferé</p>
                     <a href="/abonnement">PLUS</a>
                  </figcaption>
               </figure>
            </li>
            <li>
               <figure class="effect-oscar">
                  <img src="images/home-images/image-4.jpg" alt="" class="img-responsive"/>
                  <figcaption>
                     <h2>Nos <span>Salles</span></h2>
                     <p>Pour obtenir plus d'informations sur nos salles de danses</p>
                     <a href="">PLUS</a>
                  </figcaption>
               </figure>
            </li>
        </ul>
      </section>
      <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
         <ul class="grid-lod effect-2" id="grid">
            <li>
               <figure class="effect-oscar">
                  <img src="images/home-images/image-3.jpg" alt="" class="img-responsive"/>
                  <figcaption>
                     <h2>Contact <span></span></h2>
                     <p>Notre formulaire de contact</p>
                     <a href="">PLUS</a>
                  </figcaption>
               </figure>
            </li>
            <li>
               <figure class="effect-oscar">
                  <img src="images/home-images/image-5.jpg" alt="" class="img-responsive"/>
                  <figcaption>
                     <h2>Inscription<span></span></h2>
                     <p>Inscrivez vous afin de pouvoir vous abonner à une des disciplines</p>
                     <a href="/contact/form">View more</a>
                  </figcaption>
               </figure>
            </li>
            <li>
               <figure class="effect-oscar">
                  <img src="images/home-images/image-3.jpg" alt="" class="img-responsive"/>
                  <figcaption>
                     <h2>formules <span></span></h2>
                     <p>Plus d'information sur nos formules</p>
                     <a href="">PLUS</a>
                  </figcaption>
               </figure>
            </li>
            <li>
               <figure class="effect-oscar">
                  <img src="images/home-images/image-5.jpg" alt="" class="img-responsive"/>
                  <figcaption>
                     <h2>Le <span>Planning</span></h2>
                     <p>Les horraires de vos cours</p>
                     <a href="">PLUS</a>
                  </figcaption>
               </figure>
            </li>
         </ul>
      </section>
      <div class="clearfix"></div>
   </div>
</main>

<?php
   require_once(__DIR__.'/../_includes/footer.php');
?>