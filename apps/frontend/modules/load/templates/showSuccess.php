<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $transport_load->getId() ?></td>
    </tr>
    <tr>
      <th>Customer:</th>
      <td><?php echo $transport_load->getCustomerId() ?></td>
    </tr>
    <tr>
      <th>Transporter:</th>
      <td><?php echo $transport_load->getTransporterId() ?></td>
    </tr>
    <tr>
      <th>From:</th>
      <td><?php echo $transport_load->getFrom() ?></td>
    </tr>
    <tr>
      <th>To:</th>
      <td><?php echo $transport_load->getTo() ?></td>
    </tr>
    <tr>
      <th>Load description:</th>
      <td><?php echo $transport_load->getLoadDescription() ?></td>
    </tr>
    <tr>
      <th>Package:</th>
      <td><?php echo $transport_load->getPackageId() ?></td>
    </tr>
    <tr>
      <th>Weight:</th>
      <td><?php echo $transport_load->getWeight() ?></td>
    </tr>
    <tr>
      <th>Arrive before:</th>
      <td><?php echo $transport_load->getArriveBefore() ?></td>
    </tr>
    <tr>
      <th>Arrive after:</th>
      <td><?php echo $transport_load->getArriveAfter() ?></td>
    </tr>
    <tr>
      <th>Expired at:</th>
      <td><?php echo $transport_load->getExpiredAt() ?></td>
    </tr>
    <tr>
      <th>Bid:</th>
      <td><?php echo $transport_load->getBid() ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $transport_load->getComment() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $transport_load->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $transport_load->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('load/edit?id='.$transport_load->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('load/index') ?>">List</a>
