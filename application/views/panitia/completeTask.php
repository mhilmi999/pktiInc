<section id="maincontent">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="tagline centered">
          <div class="row">
            <div class="span12">
              <div class="tagline_text">
                <br />
                <h2>Already complete for this task?</h2>
                <p>
                  Let's send back to the Authors for collecting the credits.
                </p>
                <div align="center">
                  <?= form_open_multipart(base_url() . 'index.php/reviewerCtl/completingReviewTask/' . $id_assign); ?>
                  <?php
                  foreach ($tasks as $item) {
                  ?>

                    <table>
                      <tr>
                        <td>Title </td>
                        <td><input type="text" id="judul" name="judul" width="100" value="<?= $item['judul'] ?>" readonly /></td>
                      </tr>
                      <tr>
                        <td>Keywords</td>
                        <td><input type="text" id="keywords" name="keywords" width="100" value="<?= $item['keywords'] ?>" readonly /></td>
                      </tr>
                      <tr>
                        <td>Reviewed by</td>
                        <td><input type="text" id="username" name="username" width="100" value="<?= $namareviewer; ?>" readonly></td>
                      </tr>
                      <tr>
                        <td>Assign Reviewed Task</td>
                        <td class="col-lg-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="userfile" name="userfile"></input>
                          </div>
                        </td>
                      </tr>

                    </table>
                    <div class="form-group row">
                      <div class="col-sm">
                        <button type="submit" class="btn btn-primary">Change</button>
                      </div>
                    </div>
                    </form>
                  <?php }  ?>
                  <?= form_close(); ?>
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