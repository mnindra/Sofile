<div class="row">
  <div class="col-md-9 col-lg-9">
    <table id="table-data" class="table table-hover table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Company</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>
  </div>

  <div class="col-md-3 col-lg-3">
    <form action="" id="formCreate">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Testimonial</h4>
          <p class="card-text">Create a new testimonial</p>

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" placeholder="Name">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email">
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" class="form-control" placeholder="Phone">
          </div>

          <div class="form-group">
            <label for="company">Company</label>
            <input type="text" id="company" class="form-control" placeholder="Company">
          </div>

          <div class="form-group">
            <label for="testimonial">Testimonial</label>
            <textarea name="testimonial" id="testimonial" class="form-control"></textarea>
          </div>

          <button type="button" class="btn btn-primary" onclick="create()">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="form_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="testimonial_id_edit">

          <div class="form-group">
            <label for="name_edit">Name</label>
            <input type="text" id="name_edit" class="form-control" placeholder="Name">
          </div>

          <div class="form-group">
            <label for="email_edit">Email</label>
            <input type="email" id="email_edit" class="form-control" placeholder="Email">
          </div>

          <div class="form-group">
            <label for="phone_edit">Phone</label>
            <input type="text" id="phone_edit" class="form-control" placeholder="Phone">
          </div>

          <div class="form-group">
            <label for="company_edit">Company</label>
            <input type="text" id="company_edit" class="form-control" placeholder="Company">
          </div>

          <div class="form-group">
            <label for="testimonial_edit">Testimonial</label>
            <textarea id="testimonial_edit" class="form-control" placeholder="Testimonial"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="update()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    window.activePage = "project";

    let load_data = () => {
        $.get("<?= SITE_URL . '?page=admin/Testimonial&action=all&id=' . $_GET['id'] ?>", (data) => {
            $("#table-body").empty();
            window.data_master = JSON.parse(data);
            window.data_master.forEach((row, index) => {
                $("#table-body").append(`
            <tr>
              <td>${index + 1}</td>
              <td>${row.name}</td>
              <td>${row.email}</td>
              <td>${row.company}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_edit_form(${row.testimonial_id})">Edit</button>
                  <button type="button" class="btn btn-danger" onclick="destroy(${row.testimonial_id})">Delete</button>
                </div>
              </td>
            </tr>
          `);
            });
        });
    };

    let create = () => {
        let project_id = <?= $_GET['id'] ?>;
        let name = $("#name").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let company = $("#company").val();
        let testimonial = $("#testimonial").val();
        $.post("<?= SITE_URL . '?page=admin/Testimonial&action=store' ?>", {
            project_id,
            name,
            email,
            phone,
            company,
            testimonial,
        }, (data) => {
            load_data();
            $("#formCreate").trigger("reset");
            console.log(data);
        });
    };

    let update = () => {
        let id = $("#testimonial_id_edit").val();
        $.post("<?= SITE_URL . '?page=admin/Testimonial&action=update&id=' ?>" + id, {
            name: $("#name_edit").val(),
            email: $("#email_edit").val(),
            phone: $("#phone_edit").val(),
            company: $("#company_edit").val(),
            testimonial: $("#testimonial_edit").val(),
        }, (data) => {
            load_data();
            $('#form_edit').modal('hide');
            console.log(data);
        });
    };

    let destroy = (id) => {
        $.get("<?= SITE_URL . '?page=admin/Testimonial&action=destroy&id=' ?>" + id, (data) => {
            load_data();
        });
    };

    let show_edit_form = (id) => {
        window.data_master.map(row => {
            if(row.testimonial_id == id) {
                $("#testimonial_id_edit").val(row.testimonial_id);
                $("#name_edit").val(row.name);
                $("#email_edit").val(row.email);
                $("#phone_edit").val(row.phone);
                $("#company_edit").val(row.company);
                $("#testimonial_edit").val(row.testimonial);
            }
        });

        $('#form_edit').modal('show');
    };

    load_data();
</script>