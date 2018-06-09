<div class="row my-2">
  <div class="carousel slide text-center mx-auto" id="myCarousel" data-ride="carousel">

    <ul class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{!! asset('image/jumbotron_bg1.png') !!}" alt="About Me" width="100%">
        <div class="carousel-caption">
          <h3>About Me</h3>
          <p>Do you need more information about me ? Please check about me page.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{!! asset('image/jumbotron_bg2.png') !!}" alt="Skills" width="100%">
        <div class="carousel-caption">
          <h3>Skills</h3>
          <p>Do you think i can be usefull for you ? Check my skills page.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{!! asset('image/jumbotron_bg3.jpg') !!}" alt="Github" width="100%">
        <div class="carousel-caption">
          <h3>Github</h3>
          <p>We can help eachothers. Check my github page. Send me pull requests. Mutual aid can boost us professionality.</p>
        </div>
      </div>

      <!-- Left and Right Controls -->
      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <style>
      .carousel-item img{
        width: 800px;
        height: 400px;
      }
    </style>
  </div>
</div>
