<div class="row">
  <div class="col-md-12 col-lg-12">
    <table id="table-data" class="table table-hover table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Date</th>
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
</div>

<!-- Modal -->
<div class="modal fade" id="form_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Judul Pesan Disini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <h2></h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-6">
            <h6>
              <span class="inline-icon">
                <i class="material-icons">person</i>
                <span id="name">M. Nindra Zaka</span>
              </span>
            </h6>
            <p class="small text-muted">
              <span class="inline-icon text-right">
                <span id="email">mnindrazaka@gmail.com</span>
              </span>
            </p>
            <p class="small text-muted">
              <span class="inline-icon text-right">
                <span id="company">pt zaka</span>
              </span>
            </p>
            <p class="small text-muted">
              <span class="inline-icon text-right">
                <span id="phone">085331247098</span>
              </span>
            </p>
          </div>

          <div class="col-md-6 col-lg-6">
            <p class="text-muted">
              <span class="inline-icon">
                <i class="material-icons">today</i>
                <span id="date">6 Januari 2018</span>
              </span>
            </p>
            <p class="text-muted">
              <span class="inline-icon">
                <i class="material-icons">access_time</i>
                <span id="time">6 Januari 2018</span>
              </span>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p id="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aliquid, animi est excepturi expedita id incidunt itaque magnam nam placeat quo quod repellat rerum sapiente tempora tempore ullam ut!</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    window.activePage = "message";

    let load_data = () => {
        $.get("<?= SITE_URL . '?page=admin/Message&action=all' ?>", (data) => {
            $("#table-body").empty();
            window.data_master = JSON.parse(data);
            window.data_master.forEach((row, index) => {
                $("#table-body").append(`
            <tr>
              <td>${index + 1}</td>
              <td>${$.format.date(row.datetime, 'dd/MM/yyyy on hh:mm')}</td>
              <td>${row.name}</td>
              <td>${row.email}</td>
              <td>${row.company}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-secondary" data-toggle="modal" onclick="seeAttachment('${row.file}')">Attachment</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" onclick="show_detail(${row.message_id})">Detail</button>
                  <button type="button" class="btn btn-danger" onclick="destroy(${row.message_id})">Delete</button>
                </div>
              </td>
            </tr>
          `);
            });
        });
    };

    let destroy = (id) => {
        $.get("<?= SITE_URL . '?page=admin/Message&action=destroy&id=' ?>" + id, (data) => {
            load_data();
        });
    };

    let show_detail = (id) => {
        window.data_master.map(row => {
            if(row.message_id == id) {
                $("#name").html(row.name);
                $("#email").html(row.email);
                $("#date").html($.format.date(row.datetime, 'dd/MM/yyyy'));
                $("#time").html($.format.date(row.datetime, 'hh:mm:ss'));
                $("#title").html(row.title);
                $("#content").html(row.content);
                $("#company").html(row.company);
                $("#phone").html(row.phone);
            }
        });
        $('#form_detail').modal('show');
    };

    let seeAttachment = (file) => {
        window.location = '<?= PATH ?>public/upload/' + file;
    };

    load_data();
</script>