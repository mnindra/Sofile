<!-- Header -->
<header class="masthead" style="background-image: url('<?= PATH ?>public/img/header-bg2.jpg')">
  <div class="container">
    <div class="intro-text">
      <div class="intro-lead-in">We Are Open Minded</div>
      <div class="intro-heading text-uppercase">Come Join Us</div>
      <!--      <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>-->
    </div>
  </div>
</header>

<!-- Position -->
<section class="bg-light" id="position">
  <div class="container">
    <div class="row">
      <?php foreach ($position as $item) { ?>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="<?= PATH ?>public/img/team/1.jpg" alt="">
            <h4><?= $item->position ?></h4>
            <p class="text-muted"><?= $item->position_description ?></p>
            <?php if($item->open == 1) { ?>
            <p style="color: #1db86c">Open Position</p>
            <?php } ?>
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
        <h3 class="section-subheading text-muted">Tell Us Who You Are</h3>
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
        let name = $("#name").val();
        let company = $("#company").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let title = $("#title").val();
        let content = $("#content").val();
        let file = $("#file").prop('files')[0];
        $.post("<?= SITE_URL . '?page=Message&action=store' ?>", {
            name,
            company,
            email,
            phone,
            title,
            content,
            job_app: 1
        }, (data) => {
            $("#formCreate").trigger("reset");
            console.log(data);
            alert('Message Sent');
        });
    };
</script>