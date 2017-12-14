
<div class="row">
  <div class="col-md-8 col-lg-8">
    <table id="table-data" class="table table-hover table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Team Name</th>
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
          <h4 class="card-title">Create Team</h4>
          <p class="card-text">Create new team</p>
          <div class="form-group">
            <label for="team">Team</label>
            <input type="text" id="team" class="form-control" placeholder="Team Name">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="team_id_edit">

          <div class="form-group">
            <label for="team_edit">Team</label>
            <input type="text" id="team_edit" class="form-control" placeholder="Team Name">
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
        $.get("<?= SITE_URL . '?page=admin/Team&action=all' ?>", (data) => {
            $("#table-body").empty();
            window.data_master = JSON.parse(data);
            window.data_master.forEach((row, index) => {
                $("#table-body").append(`
            <tr>
              <td>${index + 1}</td>
              <td>${row.team}</td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_edit_form(${row.team_id})">Edit</button>
                <button type="button" class="btn btn-danger" onclick="destroy(${row.team_id})">Delete</button>
              </td>
            </tr>
          `);
            });
        });
    };

    let create = () => {
        let team = $("#team").val();
        $.post("<?= SITE_URL . '?page=admin/Team&action=store' ?>", {
            team
        }, (data) => {
            load_data();
            $("#formCreate").trigger("reset");
            console.log(data);
        });
    };

    let update = () => {
        let id = $("#team_id_edit").val();
        $.post("<?= SITE_URL . '?page=admin/Team&action=update&id=' ?>" + id, {
            team: $("#team_edit").val(),
        }, (data) => {
            load_data();
            $('#form_edit').modal('hide');
            console.log(data);
        });
    };

    let destroy = (id) => {
        $.get("<?= SITE_URL . '?page=admin/Team&action=destroy&id=' ?>" + id, (data) => {
            load_data();
        });
    };

    let show_edit_form = (id) => {
        window.data_master.map(row => {
           if(row.team_id == id) {
               $("#team_id_edit").val(row.team_id);
               $("#team_edit").val(row.team);
           }
        });

        $('#form_edit').modal('show');
    };

    load_data();
</script>