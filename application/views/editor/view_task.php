<section id="intro">

  <head>
    <style>
      #view_task {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #view_task td,
      #view_task th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #view_task tr:nth-child(even) {
        background-color: #e0e0e0;
      }

      #view_task tr:hover {
        background-color: #ddd;
      }

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
      <h2>My Task List</h2>
      <table  id="view_task">
        <tr>
          <th width="20px">No</th>
          <th width="220px">Title</th>
          <th width="220px">Keywords</th>
          <th width="220px">Filename</th>
          <th width="220px">Pages</th>
          <th width="220px">Submitted</th>
          <th width="220px">Progress</th>
          <th width="220px">Payment</th>
          <th width="800px">Reviewed by Reviewer</th>
        </tr>

        <?php
        $i = 0;
        foreach ($tasks as $item) {
          $i++;
        ?>
          <tr>
            <td style="text-align: center"><?= $i; ?></td>
            <td style="text-align: center"><?= $item['judul']; ?></td>
            <td style="text-align: center"><?= $item['keywords']; ?></td>
            <td><a href="<?= base_url() . 'index.php/ApplicationCtl/download/' . $item['id_task']; ?>" target="_blank"><?= $item['file_location']; ?></a></td>
            <td style="text-align: center"><?= $item['page']; ?></td>
            <td style="text-align: center"><?= date("d M Y", strtotime($item['date_created'])); ?></td>
            <td style="text-align: center"><?= $item['nama_status']; ?></td>
            <?php if ($item['status'] == 4) : ?>
              <td style="text-align: center"><a href="<?= base_url() . 'index.php/PaymentCtl/AddPayment/' . $item['id_assign'] . '/' . $item['id_task'] ?>">Add Payment</a></td>
            <?php else : ?>
              <td style="text-align: center">Add Payment</td>

            <?php endif; ?>
            <?php if ($item['status'] == 6) : ?>
              <td style="text-align: center"><a href="<?= base_url() . 'index.php/ApplicationCtl/downloadCompleted/' . $item['id_assign']; ?>">Download</a></td>
            <?php else : ?>
              <td style="text-align: center">Download</td>

            <?php endif; ?>
          </tr>
        <?php }  ?>
      </table>
    </div>
  </div>
  </div>
</section>