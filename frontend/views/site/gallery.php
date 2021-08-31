  <div class="container">
    <div class="row row-50">
      <div class="col-12 text-center">
        <h3 class="section-title wow-outer"><span class="wow slideInUp">Gallery</span></h3>
      </div>
      <div class="col-12 isotope-wrap">
        <div class="isotope offset-top-2" data-isotope-layout="masonry" data-lightgallery="group" data-lg-thumbnail="false">
          <div class="row row-30">
            <?php
              if($gallery){
                foreach($gallery as $gal ){
                ?>
                <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                                <!-- Thumbnail Corporate-->
                                <article class="thumbnail-corporate wow slideInDown"><img class="thumbnail-corporate-image" src="/<?= $gal->image?>" alt="" width="370" height="256"/>
                                  <div class="thumbnail-corporate-caption">
                                    <p class="thumbnail-corporate-title"><a href="#"><?= $gal->title?></a></p>
                                    <p><?= $gal->description ?></p><a class="thumbnail-corporate-link" href="/images/gallery-original-1.jpg" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                                  </div>
                                  <div class="thumbnail-corporate-dummy"></div>
                                </article>
                </div>
              <?php
                  }
              }else{
              ?>
              <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                              <!-- Thumbnail Corporate-->
                              <article class="thumbnail-corporate wow slideInDown"><img class="thumbnail-corporate-image" src="/images/gallery-masonry-1-370x256.jpg" alt="" width="370" height="256"/>
                                <div class="thumbnail-corporate-caption">
                                  <p class="thumbnail-corporate-title"><a href="#">Migratory Birds in Loktak Pat</a></p>
                                  <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the Imphal.</p><a class="thumbnail-corporate-link" href="/images/gallery-original-1.jpg" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                                </div>
                                <div class="thumbnail-corporate-dummy"></div>
                              </article>
              </div>
              <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                              <article class="thumbnail-corporate thumbnail-corporate-lg wow slideInDown"><img class="thumbnail-corporate-image" src="/images/gallery-masonry-2-370x464.jpg" alt="" width="370" height="464"/>
                                <div class="thumbnail-corporate-caption">
                                  <p class="thumbnail-corporate-title"><a href="#">Migratory Birds in Keibul Lamjao</a></p>
                                  <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the Imphal.</p><a class="thumbnail-corporate-link" href="/images/gallery-original-2.jpg" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                                </div>
                                <div class="thumbnail-corporate-dummy"></div>
                              </article>
              </div>
              <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                              <article class="thumbnail-corporate wow slideInUp"><img class="thumbnail-corporate-image" src="/images/gallery-masonry-3-370x256.jpg" alt="" width="370" height="256"/>
                                <div class="thumbnail-corporate-caption">
                                  <p class="thumbnail-corporate-title"><a href="#">Migratory Birds in Sendra</a></p>
                                  <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the Imphal.</p><a class="thumbnail-corporate-link" href="/images/gallery-original-3.jpg" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                                </div>
                                <div class="thumbnail-corporate-dummy"></div>
                              </article>
              </div>
              <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                              <article class="thumbnail-corporate thumbnail-corporate-lg wow slideInUp"><img class="thumbnail-corporate-image" src="/images/gallery-masonry-4-370x464.jpg" alt="" width="370" height="464"/>
                                <div class="thumbnail-corporate-caption">
                                  <p class="thumbnail-corporate-title"><a href="#">Sink Church in Thoubal Dam</a></p>
                                  <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the Imphal.</p><a class="thumbnail-corporate-link" href="/images/gallery-original-4.jpg" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                                </div>
                                <div class="thumbnail-corporate-dummy"></div>
                              </article>
              </div>
              <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                              <article class="thumbnail-corporate thumbnail-corporate-lg wow slideInDown"><img class="thumbnail-corporate-image" src="/images/gallery-masonry-6-370x464.jpg" alt="" width="370" height="464"/>
                                <div class="thumbnail-corporate-caption">
                                  <p class="thumbnail-corporate-title"><a href="#">Dzukou River</a></p>
                                  <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the Imphal.</p><a class="thumbnail-corporate-link" href="/images/gallery-original-6.jpg" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                                </div>
                                <div class="thumbnail-corporate-dummy"></div>
                              </article>
              </div>
              <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                              <article class="thumbnail-corporate wow slideInDown"><img class="thumbnail-corporate-image" src="/images/gallery-masonry-5-370x256.jpg" alt="" width="370" height="256"/>
                                <div class="thumbnail-corporate-caption">
                                  <p class="thumbnail-corporate-title"><a href="#">Loktak Pat</a></p>
                                  <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the Imphal.</p><a class="thumbnail-corporate-link" href="/images/gallery-original-5.jpg" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                                </div>
                                <div class="thumbnail-corporate-dummy"></div>
                              </article>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
