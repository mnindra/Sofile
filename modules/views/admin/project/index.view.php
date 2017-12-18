
<div class="row">
  <div class="col-md-9 col-lg-9">
    <table id="table-data" class="table table-hover table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Service Name</th>
        <th>Title</th>
        <th>Description</th>
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
          <h4 class="card-title">Create Project</h4>
          <p class="card-text">Create new project</p>

          <div class="form-group">
            <label for="service_id">Service Name</label>
            <div>
              <select id="service_id" class="custom-select" required>
                <option selected disabled>Select Project Service</option>
                <?php foreach ($service as $item) { ?>
                  <option value="<?= $item->service_id ?>"><?= $item->service ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" placeholder="Project Title">
          </div>

          <div class="form-group">
            <label for="project_description">Description</label>
            <input type="text" id="project_description" class="form-control" placeholder="Project Description">
          </div>

          <div class="form-group">
            <label for="link">Link</label>
            <input type="text" id="link" class="form-control" placeholder="Project Link">
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
          <input type="hidden" id="project_id_edit">

          <div class="form-group">
            <label for="service_id_edit">Service Name</label>
            <div>
              <select id="service_id_edit" class="custom-select" required>
                <option selected disabled>Select Project Service</option>
                <?php foreach ($service as $item) { ?>
                  <option value="<?= $item->service_id ?>"><?= $item->service ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="title_edit">Title</label>
            <input type="text" id="title_edit" class="form-control" placeholder="Project Title">
          </div>

          <div class="form-group">
            <label for="project_description_edit">Description</label>
            <input type="text" id="project_description_edit" class="form-control" placeholder="Project Description">
          </div>

          <div class="form-group">
            <label for="link_edit">Link</label>
            <input type="text" id="link_edit" class="form-control" placeholder="Project Link">
          </div>

          <div class="form-group">
            <label for="portfolio_edit">Publish as Portfolio</label>
            <div>
              <select id="portfolio_edit" class="custom-select" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
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
        $.get("<?= SITE_URL . '?page=admin/Project&action=all' ?>", (data) => {
            $("#table-body").empty();
            window.data_master = JSON.parse(data);
            window.data_master.forEach((row, index) => {
                $("#table-body").append(`
            <tr>
              <td>${index + 1}</td>
              <td>${row.service}</td>
              <td>
                <a href="${row.link}">${row.title}</a>
              </td>
              <td>${row.project_description}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_edit_form(${row.project_id})">Edit</button>
                  <button type="button" class="btn btn-danger" onclick="destroy(${row.project_id})">Delete</button>
                </div>

                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-dark" data-toggle="modal" onclick="gotoTeam(${row.project_id})">Team</button>
                  <button type="button" class="btn btn-success" onclick="gotoTestimonial(${row.project_id})">Testimonial</button>
                </div>
              </td>
            </tr>
          `);
            });
        });
    };

    let create = () => {
        let service_id = $("#service_id").val();
        let title = $("#title").val();
        let project_description = $("#project_description").val();
        let link = $("#link").val();
        $.post("<?= SITE_URL . '?page=admin/Project&action=store' ?>", {
            service_id,
            title,
            project_description,
            link
        }, (data) => {
            load_data();
            $("#formCreate").trigger("reset");
            console.log(data);
        });
    };

    let update = () => {
        let id = $("#project_id_edit").val();
        $.post("<?= SITE_URL . '?page=admin/Project&action=update&id=' ?>" + id, {
            service_id: $("#service_id_edit").val(),
            title: $("#title_edit").val(),
            project_description: $("#project_description_edit").val(),
            link: $("#link_edit").val(),
            portfolio: $("#portfolio_edit").val(),
        }, (data) => {
            load_data();
            $('#form_edit').modal('hide');
            console.log(data);
        });
    };

    let destroy = (id) => {
        $.get("<?= SITE_URL . '?page=admin/Project&action=destroy&id=' ?>" + id, (data) => {
            load_data();
        });
    };

    let show_edit_form = (id) => {
        window.data_master.map(row => {
            if(row.project_id == id) {
                $("#project_id_edit").val(row.project_id);
                $("#service_id_edit").val(row.service_id);
                $("#title_edit").val(row.title);
                $("#project_description_edit").val(row.project_description);
                $("#link_edit").val(row.link);
                $("#portfolio_edit").val(row.portfolio);
            }
        });

        $('#form_edit').modal('show');
    };

    let gotoTeam = (id) => {
        window.location = '<?= SITE_URL ?>?page=admin/ProjectTeam&id=' + id;
    };

    let gotoTestimonial = (id) => {
        window.location = '<?= SITE_URL ?>?page=admin/Testimonial&id=' + id;
    };

    load_data();
</script>