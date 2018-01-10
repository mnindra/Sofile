<div class="row">
  <div class="col-md-12 col-lg-12">

    <div class="row">
      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label for="company">Company</label>
          <input type="text" id="company" class="form-control" placeholder="Company Name">
        </div>
      </div>

      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" class="form-control" placeholder="Email">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" id="phone" class="form-control" placeholder="Phone">
        </div>
      </div>

      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" id="address" class="form-control" placeholder="Address">
        </div>
      </div>
    </div>

    <button type="button" class="btn btn-primary" onclick="update()">Submit</button>
  </div>
</div>

<script>
    window.activePage = "setting_menu";

    let load_data = () => {
        $.get("<?= SITE_URL . '?page=admin/Setting&action=all' ?>", (data) => {
            window.data_master = JSON.parse(data);
            $("#company").val(window.data_master.company);
            $("#email").val(window.data_master.email);
            $("#phone").val(window.data_master.phone);
            $("#address").val(window.data_master.address);
        });
    };

    let update = () => {
        $.post("<?= SITE_URL . '?page=admin/Setting&action=update' ?>", {
            company: $("#company").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            address: $("#address").val(),
        }, (data) => {
            clear_form();
            load_data();
            console.log(data);
        });
    };

    let clear_form = () => {
        $("#company").val("");
        $("#email").val("");
        $("#phone").val("");
        $("#address").val("");
    };

    load_data();
</script>