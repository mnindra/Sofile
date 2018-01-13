<!-- Header -->
<header class="masthead">
  <div class="container">
    <div class="intro-text">
      <div class="intro-lead-in">Welcome To <?= $setting->company ?></div>
      <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
<!--      <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>-->
    </div>
  </div>
</header>

<!-- Services -->
<section id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Services</h2>
        <h3 class="section-subheading text-muted">Our Best Service For You</h3>
      </div>
    </div>
    <div class="row text-center">
      <?php foreach ($service as $item) { ?>
      <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa <?= $item->service_icon ?> fa-stack-1x fa-inverse"></i>
            </span>
        <h4 class="service-heading"><?= $item->service ?></h4>
        <p class="text-muted"><?= $item->service_description ?></p>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Portfolio</h2>
        <h3 class="section-subheading text-muted">Our Best Works We Have Done</h3>
      </div>
    </div>
    <div class="row">
      <?php foreach ($project as $item) { ?>
      <div class="col-md-4 col-sm-6 portfolio-item">
        <a class="portfolio-link" href="<?= $item->link ?>">
          <div class="portfolio-hover">
            <div class="portfolio-hover-content">
              <i class="fa fa-plus fa-3x"></i>
            </div>
          </div>
          <img class="img-fluid" src="<?= PATH ?>public/img/portfolio/02-thumbnail.jpg" alt="">
        </a>
        <div class="portfolio-caption">
          <h4><?= $item->title ?></h4>
          <p class="text-muted"><?= $item->project_description ?></p>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Testimonial -->
<section class="bg-light" id="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">What Our Clients Say</h2>
      </div>
    </div>
    <div class="row">
      <?php foreach ($testimonial as $item) { ?>
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="<?= PATH ?>public/img/team/1.jpg" alt="">
          <h4><?= $item->name ?></h4>
          <p class="text-muted"><?= $item->company ?></p>
          <p class="text-muted"><?= $item->testimonial ?></p>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Contact Us</h2>
        <h3 class="section-subheading text-muted">Tell Us What You Need</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form id="formCreate">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" id="name" type="text" placeholder="Your Name *">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="company" type="text" placeholder="Your Company *">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="email" type="email" placeholder="Your Email *">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" id="title" type="text" placeholder="Title">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="file" type="file" placeholder="Enter Attachment *pdf">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <textarea class="form-control" id="content" placeholder="Your Message *"></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button type="button" onclick="create()" id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
    let create = () => {
      let file = $('#file')[0].files[0];

      if(file.type == 'application/pdf') {
        let formData = new FormData();
        formData.append('name', $("#name").val());
        formData.append('company', $("#company").val());
        formData.append('email', $("#email").val());
        formData.append('phone', $("#phone").val());
        formData.append('title', $("#title").val());
        formData.append('content', $("#content").val());
        formData.append('file', file);

        $.ajax({
          url: '<?= SITE_URL ?>?page=Message&action=store',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function (data) {
            $("#formCreate").trigger('reset');
            alert('Message Sent');
          }
        })
      } else {
        alert('please choose pdf file');
      }
    };
</script>
