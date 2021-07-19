<div class="row">
    <div class="col-lg-5">
            <div class="card-box">
              <div class="contact-card">
              <a class="pull-left" href="#">
                          <img alt="image" src="<?php echo base_url().'assets/foto/'.$user->row_array()['foto']; ?>" class="rounded-circle author-box-picture" width="30px">
                      </a>
                      <div class="member-info">
                          <p class="text-muted"><i class=" glyphicon glyphicon-user"></i> <?php echo $user->row_array()['username']; ?></p>
                          <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $user->row_array()['namaPengguna']; ?></small></p>
                          <div class="m-t-20">
                          <a href="#" class="btn btn-purple waves-effect waves-light btn-sm">Profile</a>
                        </div>
                      </div>
                      
            </div>
            </div>
          </div>
      <div class="col-lg-7">
          <div class="card-box">
            <h4 class="m-t-0 header-title">Ubah Profile</h4>
            <form method="post" action="<?php echo base_url(); ?>profile/simpan">
              <div class="form-group"><br>
                <label for="userName">Nama Pengguna</label>
                <input type="text" name="namaPengguna" id="namaPengguna" required="" placeholder="Nama Pengguna" class="form-control" value="<?php echo $user->row_array()['namaPengguna']; ?>" >
              </div>
              <div class="form-group">
                <label for="emailAddress">Username</label>
                <input type="text" name="username" id="username" required="" placeholder="Username" class="form-control" value="<?php echo $user->row_array()['username']; ?>">
              </div>
              <div class="form-group" style="padding-top:10px;">
                <input class="control" type="radio" name="ubahPass" id="ubahPass" value="tidak" onChange="$('.pass').hide();" checked>
                <label class="form-check-label" for="ubahPass">
                  Tidak Ubah Password
                </label>
              </div>
              <div class="form-group">
                <input class="control" type="radio" name="ubahPass" id="ubahPass" value="rubah" onChange="$('.pass').show();">
                <label class="form-check-label" for="ubahPass">
                  Ubah Password
                </label>
              </div>                            
              <div class="form-group pass">
                <label for="exampleInputPassword1" class="form-label">Password Lama</label> 
                <input type="password" class="form-control" id="passLama" name="passLama">
                </input>
              </div>
              <div class="form-group pass">
                <label for="exampleInputPassword1" class="form-label">Password Baru</label> 
                <input type="password" class="form-control" id="passBaru" name="passBaru">
                </input>
              </div>
              <div class="form-group pass">
                <label for="exampleInputPassword1" class="form-label">Ulangi Password Baru</label> 
                <input type="password" class="form-control" id="passBaru2" name="passBaru2">
                </input>
              </div>
              <div class="form-group text-right m-b-0">
                <button class="btn btn-primary waves-effect waves-light" type="submit">
                  Simpan
                </button>
                <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                  Batal
                </button>
              </div>
            </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.pass').hide();
</script> 