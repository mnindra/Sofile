
<div class="row">
  <div class="col-md-9 col-lg-9">
    <table id="table-data" class="table table-hover table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Team Name</th>
        <th>Task</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>
  </div>

  <div class="col-md-3 col-lg-3">
    <form action="" id="formCreate">
      <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Join Team</h4>
          <p class="card-text">Join new team to project</p>

          <div class="form-group">
            <label for="team_id">Team Name</label>
            <div>
              <select id="team_id" class="custom-select" required>
                <option selected disabled>Select Team Name</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="task">Task</label>
            <input type="text" id="task" class="form-control" placeholder="Team Task">
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
          <input type="hidden" id="project_team_id_edit">
          <div class="form-group">
            <label for="task_edit">Task</label>
            <input type="text" id="task_edit" class="form-control" placeholder="Team Task">
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
        $.get("<?= SITE_URL . '?page=admin/ProjectTeam&action=all&id=' . $_GET['id'] ?>", (data) => {
            $("#table-body").empty();
            window.data_master = JSON.parse(data);
            window.data_master.forEach((row, index) => {
                $("#table-body").append(`
            <tr>
              <td>${index + 1}</td>
              <td>${row.team}</td>
              <td>${row.task}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_edit_form(${row.project_team_id})">Edit</button>
                  <button type="button" class="btn btn-danger" onclick="destroy(${row.project_team_id})">Delete</button>
                </div>
              </td>
            </tr>
          `);
            });
        });

        load_team();
    };

    let create = () => {
        let team_id = $("#team_id").val();
        let project_id = <?= $_GET['id'] ?>;
        let task = $("#task").val();
        $.post("<?= SITE_URL . '?page=admin/ProjectTeam&action=store' ?>", {
            team_id,
            project_id,
            task,
        }, (data) => {
            load_data();
            $("#formCreate").trigger("reset");
            console.log(data);
        });
    };

    let update = () => {
        let id = $("#project_team_id_edit").val();
        $.post("<?= SITE_URL . '?page=admin/ProjectTeam&action=update&id=' ?>" + id, {
            task: $("#task_edit").val()
        }, (data) => {
            load_data();
            $('#form_edit').modal('hide');
            console.log(data);
        });
    };

    let destroy = (id) => {
        $.get("<?= SITE_URL . '?page=admin/ProjectTeam&action=destroy&id=' ?>" + id, (data) => {
            load_data();
        });
    };

    let show_edit_form = (id) => {
        window.data_master.map(row => {
            if(row.project_team_id == id) {
                $("#project_team_id_edit").val(row.project_team_id);
                $("#task_edit").val(row.task);
            }
        });

        $('#form_edit').modal('show');
    };

    let load_team = () => {
        $.get("<?= SITE_URL . '?page=admin/ProjectTeam&action=team&id=' . $_GET['id'] ?>", (data) => {
            $('#team_id').children('option:not(:first)').remove();
            window.data_team = JSON.parse(data);
            window.data_team.forEach((row) => {
                $("#team_id").append(`<option value="${row.team_id}">${row.team}</option>`);
            });
        });
    };


    load_data();
</script>