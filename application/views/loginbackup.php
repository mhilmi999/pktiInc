<section id="maincontent">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="tagline centered">
          <div class="row">
            <div class="span12">
              <div class="tagline_text">
                <br />
                <h2>Please Login</h2>
                <p>
                  You should login to the system before you can submit or review any article.
                </p>
                <?= $this->session->flashdata('message');?>
                <div align-item="center">
                  <form action="<?php echo base_url() . 'index.php/accountCtl/checkingLogin'; ?>" method="post">
                    <table>
                      <tr>
                        <td>Username:</td>
                        <td><input type="text" id="username" name="username" width="100" /></td>
                      </tr>
                      <tr>
                        <td>Password:</td>
                        <td><input type="password" id="katasandi" name="katasandi" width="100" /></td>
                      </tr>
                    </table>
                    <div class="form-group row">
                      <div class="col-sm">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                  </form>
                  <p>If you haven't had an account, please <a href="<?php echo base_url() . 'index.php/welcome/signup'; ?>" />Sign-Up</a></>
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