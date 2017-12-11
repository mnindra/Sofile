<h1>Position</h1>
<div class="row">
  <div class="col-md-8 col-lg-8">
    <table class="table table-hover table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Position Name</th>
        <th>Salary</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>
  </div>

  <div class="col-md-4 col-lg-4">
    <form action="" id="formCreate">
      <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Create Position</h4>
          <p class="card-text">Create new position for employee</p>

          <div class="form-group">
            <label for="position">Position</label>
            <input type="text" id="position" class="form-control" placeholder="Position Name">
          </div>

          <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" id="salary" class="form-control" placeholder="Salary">
          </div>

          <div class="form-group">
            <label for="position_description">Description</label>
            <input type="text" id="position_description" class="form-control" placeholder="Description">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="position_id_edit">

          <div class="form-group">
            <label for="position_edit">Position</label>
            <input type="text" id="position_edit" class="form-control" placeholder="Position Name">
          </div>

          <div class="form-group">
            <label for="salary_edit">Salary</label>
            <input type="text" id="salary_edit" class="form-control" placeholder="Salary">
          </div>

          <div class="form-group">
            <label for="position_description_edit">Description</label>
            <input type="text" id="position_description_edit" class="form-control" placeholder="Description">
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
    let load_data = () => {
        $.get("<?= SITE_URL . '?page=admin/Position&action=all' ?>", (data) => {
            $("#table-body").empty();
            window.data_master = JSON.parse(data);
            window.data_master.forEach((row, index) => {
                $("#table-body").append(`
            <tr>
              <td>${index + 1}</td>
              <td>${row.position}</td>
              <td>${row.salary}</td>
              <td>${row.position_description}</td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_edit_form(${row.position_id})">Edit</button>
                <button type="button" class="btn btn-danger" onclick="destroy(${row.position_id})">Delete</button>
              </td>
            </tr>
          `);
            });
        });
    };

    let create = () => {
        let position = $("#position").val();
        let salary = $("#salary").val();
        let position_description = $("#position_description").val();
        $.post("<?= SITE_URL . '?page=admin/Position&action=store' ?>", {
            position,
            salary,
            position_description
        }, (data) => {
            load_data();
            $("#formCreate").trigger("reset");
            console.log(data);
        });
    };

    let update = () => {
        let id = $("#position_id_edit").val();
        $.post("<?= SITE_URL . '?page=admin/Position&action=update&id=' ?>" + id, {
            position: $("#position_edit").val(),
            salary: $("#salary_edit").val(),
            position_description: $("#position_description_edit").val()
        }, (data) => {
            load_data();
            $('#form_edit').modal('hide');
            console.log(data);
        });
    };

    let destroy = (id) => {
        $.get("<?= SITE_URL . '?page=admin/Position&action=destroy&id=' ?>" + id, (data) => {
            load_data();
        });
    };

    let show_edit_form = (id) => {
        window.data_master.map(row => {
           if(row.position_id == id) {
               $("#position_id_edit").val(row.position_id);
               $("#position_edit").val(row.position);
               $("#salary_edit").val(row.salary);
               $("#position_description_edit").val(row.position_description);
           }
        });

        $('#form_edit').modal('show');
    };

    load_data();
</script>