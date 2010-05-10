<h1>Transport loads List</h1>

<table>
  <thead>
    <tr>
      <th>Created at</th>
      <th>From</th>
      <th>To</th>
      <th>Load Type</th>
      <th>Load description</th>
      <th>Weight</th>
      <th>Arrive after</th>
      <th>Arrive before</th>
      <th>Bid</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transport_loads as $transport_load): ?>
    <tr>
      <td><a href="<?php echo url_for('load/show?id='.$transport_load->getId()) ?>"><?php echo $transport_load->getId() ?></a></td>
      <td><?php echo $transport_load->getCreatedAt() ?></td>
      <td><?php echo $transport_load->getFrom() ?></td>
      <td><?php echo $transport_load->getTo() ?></td>
      <td><?php echo $transport_load->getPackageId() ?></td>
      <td><?php echo $transport_load->getLoadDescription() ?></td>
      <td><?php echo $transport_load->getWeight() ?></td>
      <td><?php echo $transport_load->getArriveAfter() ?></td>
      <td><?php echo $transport_load->getArriveBefore() ?></td>
      <td><?php echo $transport_load->getBid() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('load/new') ?>">New</a>
