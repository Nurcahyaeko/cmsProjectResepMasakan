<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Tabel_masakan</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_masakan</label>
                    <input type="text" name="id_masakan" class="form-control" placeholder="" value="<?php echo $dataedit->id_masakan?>" readonly>
            </div>
	  <div class="form-group">
            <label>nama_masakan</label>
            <input type="text" name="nama_masakan" class="form-control" value="<?php echo $dataedit->nama_masakan?>">
    </div>
	  <div class="form-group">
            <label>resep_masakan</label>
            <input type="text" name="resep_masakan" class="form-control" value="<?php echo $dataedit->resep_masakan?>">
    </div>
	  <div class="form-group">
            <label>cara_masak</label>
            <input type="text" name="cara_masak" class="form-control" value="<?php echo $dataedit->cara_masak?>">
    </div>
	  <div class="form-group">
            <label>gambar_masakan</label>
            <input type="text" name="gambar_masakan" class="form-control" value="<?php echo $dataedit->gambar_masakan?>">
    </div>
	  <div class="form-group">
            <label>jenis_makanan</label>
            <input type="text" name="jenis_makanan" class="form-control" value="<?php echo $dataedit->jenis_makanan?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
