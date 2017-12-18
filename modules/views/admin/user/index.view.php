
<div class="row">
  <div class="col-md-12 col-lg-12">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form_create">
      Create User
    </button>
    <br><br>

    <table id="table-data" class="table table-hover table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Position</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Username</th>
        <th>Team</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>
  </div>
</div>

<!-- Modal FORM CREATE -->
<div class="modal fade" id="form_create" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modelTitleId">Create New User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCreate">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label class="custom-control custom-radio">
                    <input id="gender_male" name="gender" type="radio" value="1" class="custom-control-input" checked>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Male</span>
                  </label>
                  <label class="custom-control custom-radio">
                    <input id="gender_female" name="gender" type="radio" value="0" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Female</span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="position_id">Position</label>
                <div>
                  <select id="position_id" class="custom-select" required>
                    <option selected disabled>Select User Position</option>
                    <?php foreach ($position as $item) { ?>
                      <option value="<?= $item->position_id ?>"><?= $item->position ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="team_id">Team</label>
                <div>
                  <select id="team_id" class="custom-select" required>
                    <option selected disabled>Select User Team</option>
                    <?php foreach ($team as $item) { ?>
                      <option value="<?= $item->team_id ?>"><?= $item->team ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="date">Birthdate</label>
                <input type="date" name="date" id="date" class="form-control" placeholder="Birthdate" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
              </div>
            </div>

            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required>
              </div>
            </div>

            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="create()">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal FORM EDIT -->
<div class="modal fade" id="form_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="user_id_edit">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="name_edit">Name</label>
                <input type="text" name="name" id="name_edit" class="form-control" placeholder="Name" required>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label class="custom-control custom-radio">
                    <input id="gender_male_edit" name="gender_edit" type="radio" value="1" class="custom-control-input" checked>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Male</span>
                  </label>
                  <label class="custom-control custom-radio">
                    <input id="gender_female_edit" name="gender_edit" type="radio" value="0" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Female</span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="position_id_edit">Position</label>
                <div>
                  <select id="position_id_edit" class="custom-select" required>
                    <option selected disabled>Select User Position</option>
                    <?php foreach ($position as $item) { ?>
                      <option value="<?= $item->position_id ?>"><?= $item->position ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="team_id_edit">Team</label>
                <div>
                  <select id="team_id_edit" class="custom-select" required>
                    <option selected disabled>Select User Team</option>
                    <?php foreach ($team as $item) { ?>
                      <option value="<?= $item->team_id ?>"><?= $item->team ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="date_edit">Birthdate</label>
                <input type="date" name="date" id="date_edit" class="form-control" placeholder="Birthdate" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="address_edit">Address</label>
                <input type="text" name="address" id="address_edit" class="form-control" placeholder="Address" required>
              </div>
            </div>

            <div class="col-md-4 col-lg-4">
              <div class="form-group">
                <label for="phone_edit">Phone</label>
                <input type="text" name="phone" id="phone_edit" class="form-control" placeholder="Phone" required>
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
    window.activePage = "user";

    let load_data = () => {
        $.get("<?= SITE_URL . '?page=admin/User&action=all' ?>", (data) => {
            $("#table-body").empty();
            window.data_master = JSON.parse(data);
            window.data_master.forEach((row, index) => {
                $("#table-body").append(`
            <tr>
              <td>${index + 1}</td>
              <td>${row.position}</td>
              <td>${row.name}</td>
              <td>${row.phone}</td>
              <td>${row.email}</td>
              <td>${row.username}</td>
              <td>${row.team}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_edit_form(${row.user_id})">Edit</button>
                  <button type="button" class="btn btn-danger" onclick="destroy(${row.user_id})">Delete</button>
                </div>
              </td>
            </tr>
          `);
            });
        });
    };

    let create = () => {
        let position_id = $("#position_id").val();
        let team_id = $("#team_id").val();
        let name = $("#name").val();
        let gender = $("input[name=gender]:checked").val();
        let date = $("#date").val();
        let address = $("#address").val();
        let phone = $("#phone").val();
        let email = $("#email").val();
        let username = $("#username").val();
        let password = $("#password").val();

        console.log(date);

        $.post("<?= SITE_URL . '?page=admin/User&action=store' ?>", {
            position_id,
            team_id,
            name,
            gender,
            date,
            address,
            phone,
            email,
            username,
            password,
        }, (data) => {
            load_data();
            $("#form_create").modal("hide");
            $("#formCreate").trigger("reset");
            console.log(data);
        });
    };

    let update = () => {
        let id = $("#user_id_edit").val();
        $.post("<?= SITE_URL . '?page=admin/User&action=update&id=' ?>" + id, {
            team_id: $("#team_id_edit").val(),
            position_id: $("#position_id_edit").val(),
            name: $("#name_edit").val(),
            date: $("#date_edit").val(),
            address: $("#address_edit").val(),
            phone: $("#phone_edit").val(),
            gender: $("input[name=gender_edit]:checked").val()
        }, (data) => {
            load_data();
            $('#form_edit').modal('hide');
            console.log(data);
        });
    };

    let destroy = (id) => {
        $.get("<?= SITE_URL . '?page=admin/User&action=destroy&id=' ?>" + id, (data) => {
            load_data();
        });
    };

    let show_edit_form = (id) => {
        window.data_master.map(row => {
            if(row.user_id == id) {
                $("#user_id_edit").val(row.user_id);
                $("#position_id_edit").val(row.position_id);
                $("#team_id_edit").val(row.team_id);
                $("#name_edit").val(row.name);
                $("#date_edit").val(row.date);
                $("#address_edit").val(row.address);
                $("#phone_edit").val(row.phone);

                if(row.gender === "1")
                    $("#gender_male_edit").prop("checked", true);
                else
                    $("#gender_female_edit").prop("checked", true);


            }
        });

        $('#form_edit').modal('show');
    };

    load_data();
</script>