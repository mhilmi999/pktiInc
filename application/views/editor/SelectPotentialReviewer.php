<section id="maincontent">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="tagline centered">
					<div class="row">
						<div class="span12">
							<div class="tagline_text">
								<br />
								<h2>Select Potential Reviewer</h2>
								<p>
									A new task has been added successfully.
								</p>
								<div align="center">
									<form action="<?php echo base_url() . 'index.php/editorCtl/addingPotential'; ?>" method="post">
										<table>
											<tr>
												<td>Id Task</td>
												<td><input type="text" id="id_task" name="id_task" width="100" value="<?php echo $task['id_task']; ?>" readonly /></td>
											</tr>
											<tr>
												<td>Judul</td>
												<td><input type="text" id="judul" name="judul" width="100" value="<?php echo $task['judul']; ?>" readonly /></td>
											</tr>
											<tr>
												<td>Kata kunci</td>
												<td><input type="text" id="keywords" name="keywords" width="100" value="<?php echo $task['keywords']; ?>" readonly /></td>
											</tr>
											<tr>
												<td>Reviewer</td>
												<td>
													<select id="reviewer" name="reviewer">
														<?php foreach ($reviewers as $dd) { ?>
															<option value="<?php echo $dd['id_reviewer']; ?>"><?php echo $dd['nama']; ?> </option>
														<?php } ?>
													</select>
												</td>
											</tr>
										</table>
										<input type="submit" value="Simpan">
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