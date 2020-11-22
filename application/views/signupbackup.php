<section id="maincontent">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="tagline centered">
          <div class="row">
            <div class="span12">
              <div class="tagline_text">
                <br />
                <h2>Sign-Up Form</h2>
                <p>
                  Please fill in your account details! Field with <span style="color:red">*</span> is mandatory.
                  <?php if (strlen($error) > 0) {  ?>
                    <br /><span style="color:red"><?php echo $error; ?> </span>
                  <?php }  ?>
                </p>
                <div align="center">
                  <form action="<?= base_url() . 'index.php/AccountCtl/creatingAccount'; ?>" method="post">
                    <table>
                      <tr>
                        <td>*Nama:</td>
                        <td><input type="text" id="nama" name="nama" width="100" /></td>
                      </tr>
                      <tr>
                        <td>*Username:</td>
                        <td><input type="text" id="username" name="username" width="100" /></td>
                      </tr>
                      <tr>
                        <td>*Password:</td>
                        <td><input type="password" id="password" name="password" width="100" /></td>
                      </tr>
                      <tr>
                        <td>*Email:</td>
                        <td><input type="text" id="email" name="email" width="100"></td>
                      </tr>
                      <tr>
                        <td>*Roles:</td>
                        <td>
                          <input type="checkbox" id="editor" name="roles[]" value="1" CHECKED /> Editor<br />
                          <input type="checkbox" id="reviewer" name="roles[]" value="2" />Reviewer
                        </td>
                      </tr>
                      <tr>
                      <tr id="norek" style="display: none">
                          <td>No. Rekening</td>
                          <td><input type="text" id="no_rek" name="no_rek" width="100">
                          </td>
                      </tr>
                      <tr id="kompetensi" style="display: none">
                          <td>Kompetensi</td>
                          <td>
                            <textarea id="kompetensi" name="kompetensi"></textarea>
                          </td>
                      </tr>
                    </table>
                    <div class="form-group row">
                      <div class="col-sm">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end tagline -->
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
   document.getElementById("reviewer").addEventListener("click", function(){
    var x = document.getElementById("reviewer").checked;
    if (x == true) {
      document.getElementById("norek").style.display='';
      document.getElementById("kompetensi").style.display='';
    } else {
      document.getElementById("norek").style.display='none';
      document.getElementById("kompetensi").style.display='none';
    }
});
 </script>