<div class="row">
  <div class="col-md-8 col-lg-8">
    <table id="table-data" class="table table-hover table-striped">
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

          <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
          </div>

          <button type="button" class="btn btn-primary" onclick="create()">Submit</button>

        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="form_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="position_edit">Position</label>
                <input type="text" id="position_edit" class="form-control" placeholder="Position Name">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="salary_edit">Salary</label>
                <input type="text" id="salary_edit" class="form-control" placeholder="Salary">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="position_description_edit">Description</label>
                <input type="text" id="position_description_edit" class="form-control" placeholder="Description">
              </div>

              <div class="form-group">
                <label for="open_edit">Open Position</label>
                <div>
                  <select id="open_edit" class="custom-select" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <img src="" alt="" id="img_photo" style="border-radius: 50%; margin: auto; display: block;" width="225" height="225">
                <br><br>
                <input type="file" name="photo" id="photo_edit" class="form-control">
              </div>
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
    window.activePage = "position_menu";

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
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_edit_form(${row.position_id})">Edit</button>
                  <button type="button" class="btn btn-danger" onclick="destroy(${row.position_id})">Delete</button>
                </div>
              </td>
            </tr>
          `);
            });
        });
    };

    let create = () => {
        let formData = new FormData();
        formData.append('position', $("#position").val());
        formData.append('salary', $("#salary").val());
        formData.append('position_description', $("#position_description").val());
        formData.append('photo', $("#photo")[0].files[0]);

        $.ajax({
            url: '<?= SITE_URL ?>?page=admin/Position&action=store',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                load_data();
                $("#formCreate").trigger("reset");
            }
        });
    };

    let update = () => {
        let id = $("#position_id_edit").val();
        let formData = new FormData();
        formData.append('position', $("#position_edit").val());
        formData.append('salary', $("#salary_edit").val());
        formData.append('position_description', $("#position_description_edit").val());
        formData.append('open', $("#open_edit").val());

        let photo = $("#photo_edit")[0].files[0];
        if(photo) {
            formData.append('photo', photo);
        }

        $.ajax({
            url: '<?= SITE_URL ?>?page=admin/Position&action=update&id=' + id,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                load_data();
                $('#form_edit').modal('hide');
            }
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
               $("#open_edit").val(row.open);
               $("#img_photo").attr('src', 'public/upload/position/' + row.photo);
           }
        });

        $('#form_edit').modal('show');
    };

    load_data();
</script>