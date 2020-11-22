<section id="intro">
<head>
<style>
#view_task {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#view_task td, #view_task th {
  border: 1px solid #ddd;
  padding: 8px;
}
#view_task tr:nth-child(even) {
        background-color: #e0e0e0;
      }

#view_task tr:hover {background-color: #ddd;}

#view_task th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #9acd32;
  color: white;
}
</style>
</head>
    <div class="jumbotron masthead">
      <div class="container">
          <h2>Task Request </h2>
          <table border="1", id="view_task">
            <tr>
              <th style="text-align: center" width="20px">No</th>
              <th style="text-align: center" width="220px">Title</th>
              <th style="text-align: center" width="220px">Authors</th>
              <th style="text-align: center" width="220px">Filename</th>
              <th style="text-align: center" width="220px">Submitted </th>
              <th style="text-align: center" width="220px">Request</th>
            </tr>

            <?php
        $i = 0;
        foreach ($tasks as $item) {
          $i++;
        ?>
          <tr>
            <td style="text-align: center"><?= $i; ?></td>
            <td style="text-align: center"><?= $item['judul']; ?></td>
            <td style="text-align: center"><?= $item['authors']; ?></td>
            <td style="text-align: center"><a href="<?= base_url() . 'index.php/ApplicationCtl/download/' . $item['id_task']; ?>" target="_blank"><?= $item['file_location']; ?></a></td>
            <td style="text-align: center"><?= date("d M Y", strtotime($item['date_created'])); ?></td>
            <td>
              <a href="<?php echo site_url('reviewerCtl/accepted/' . $item['id_task']) ?>" class="badge badge-success">accept</a>
              <a href="<?php echo site_url('reviewerCtl/rejected/' . $item['id_task']) ?>" class="badge badge-info">reject</a>
            </td>          </tr>
        <?php }  ?>
          </table>
        </div>
      </div>
    </div>
</section>