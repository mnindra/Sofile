
<div class="row">
  <div class="col-md-8 col-lg-8">
    <table id="table-data" class="table table-hover table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Service Name</th>
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
          <h4 class="card-title">Create Service</h4>
          <p class="card-text">Create new service</p>
          <div class="form-group">
            <label for="service">Service</label>
            <input type="text" id="service" class="form-control" placeholder="Service Name">
          </div>
          <div class="form-group">
            <label for="service_icon">Icon</label>
            <input type="text" id="service_icon" class="form-control" placeholder="Service Icon">
          </div>
          <div class="form-group">
            <label for="service_description">Description</label>
            <input type="text" id="service_description" class="form-control" placeholder="Service Description">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="service_id_edit">

          <div class="form-group">
            <label for="service_edit">Service</label>
            <input type="text" id="service_edit" class="form-control" placeholder="Service Name">
          </div>

          <div class="form-group">
            <label for="service_icon_edit">Icon</label>
            <input type="text" id="service_icon_edit" class="form-control" placeholder="Service Icon">
          </div>

          <div class="form-group">
            <label for="service_description_edit">Description</label>
            <input type="text" id="service_description_edit" class="form-control" placeholder="Service Description">
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
    window.activePage = "service_menu";

    let load_data = () => {
        $.get("<?= SITE_URL . '?page=admin/Service&action=all' ?>", (data) => {
            $("#table-body").empty();
            window.data_master = JSON.parse(data);
            window.data_master.forEach((row, index) => {
                $("#table-body").append(`
            <tr>
              <td>${index + 1}</td>
              <td>${row.service}</td>
              <td>${row.service_description}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_edit_form(${row.service_id})">Edit</button>
                  <button type="button" class="btn btn-danger" onclick="destroy(${row.service_id})">Delete</button>
                </div>
              </td>
            </tr>
          `);
            });
        });
    };

    let create = () => {
        let service = $("#service").val();
        let service_description = $("#service_description").val();
        let service_icon = $("#service_icon").val();

        $.post("<?= SITE_URL . '?page=admin/Service&action=store' ?>", {
            service,
            service_description,
            service_icon
        }, (data) => {
            load_data();
            $("#formCreate").trigger("reset");
            console.log(data);
        });
    };

    let update = () => {
        let id = $("#service_id_edit").val();
        $.post("<?= SITE_URL . '?page=admin/Service&action=update&id=' ?>" + id, {
            service: $("#service_edit").val(),
            service_description: $("#service_description_edit").val(),
            service_icon: $("#service_icon_edit").val()
        }, (data) => {
            load_data();
            $('#form_edit').modal('hide');
            console.log(data);
        });
    };

    let destroy = (id) => {
        $.get("<?= SITE_URL . '?page=admin/Service&action=destroy&id=' ?>" + id, (data) => {
            load_data();
        });
    };

    let show_edit_form = (id) => {
        window.data_master.map(row => {
            if(row.service_id == id) {
                $("#service_id_edit").val(row.service_id);
                $("#service_edit").val(row.service);
                $("#service_description_edit").val(row.service_description);
                $("#service_icon_edit").val(row.service_icon);
            }
        });

        $('#form_edit').modal('show');
    };

    load_data();
</script>