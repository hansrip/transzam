<h1>Transport loads List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Customer</th>
      <th>Transporter</th>
      <th>From</th>
      <th>To</th>
      <th>Load description</th>
      <th>Package</th>
      <th>Weight</th>
      <th>Arrive before</th>
      <th>Arrive after</th>
      <th>Expired at</th>
      <th>Bid</th>
      <th>Comment</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transport_loads as $transport_load): ?>
    <tr>
      <td><a href="<?php echo url_for('load/show?id='.$transport_load->getId()) ?>"><?php echo $transport_load->getId() ?></a></td>
      <td><?php echo $transport_load->getCustomerId() ?></td>
      <td><?php echo $transport_load->getTransporterId() ?></td>
      <td><?php echo $transport_load->getFrom() ?></td>
      <td><?php echo $transport_load->getTo() ?></td>
      <td><?php echo $transport_load->getLoadDescription() ?></td>
      <td><?php echo $transport_load->getPackageId() ?></td>
      <td><?php echo $transport_load->getWeight() ?></td>
      <td><?php echo $transport_load->getArriveBefore() ?></td>
      <td><?php echo $transport_load->getArriveAfter() ?></td>
      <td><?php echo $transport_load->getExpiredAt() ?></td>
      <td><?php echo $transport_load->getBid() ?></td>
      <td><?php echo $transport_load->getComment() ?></td>
      <td><?php echo $transport_load->getCreatedAt() ?></td>
      <td><?php echo $transport_load->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('load/new') ?>">New</a>
