<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Tabel_user</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_pengguna</label>
                    <input type="text" name="id_pengguna" class="form-control" placeholder="" value="<?php echo $dataedit->id_pengguna?>" readonly>
            </div>
	  <div class="form-group">
            <label>username_pengguna</label>
            <input type="text" name="username_pengguna" class="form-control" value="<?php echo $dataedit->username_pengguna?>">
    </div>
	  <div class="form-group">
            <label>email_pengguna</label>
            <input type="text" name="email_pengguna" class="form-control" value="<?php echo $dataedit->email_pengguna?>">
    </div>
	  <div class="form-group">
            <label>password</label>
            <input type="text" name="password" class="form-control" value="<?php echo $dataedit->password?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
