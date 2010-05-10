<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $transporter->getId() ?></td>
    </tr>
    <tr>
      <th>Sf guard user:</th>
      <td><?php echo $transporter->getSfGuardUserId() ?></td>
    </tr>
    <tr>
      <th>Company:</th>
      <td><?php echo $transporter->getCompany() ?></td>
    </tr>
    <tr>
      <th>District:</th>
      <td><?php echo $transporter->getDistrictId() ?></td>
    </tr>
    <tr>
      <th>Address:</th>
      <td><?php echo $transporter->getAddress() ?></td>
    </tr>
    <tr>
      <th>Email address:</th>
      <td><?php echo $transporter->getEmailAddress() ?></td>
    </tr>
    <tr>
      <th>Tel:</th>
      <td><?php echo $transporter->getTel() ?></td>
    </tr>
    <tr>
      <th>Cell:</th>
      <td><?php echo $transporter->getCell() ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $transporter->getComment() ?></td>
    </tr>
    <tr>
      <th>Sms number:</th>
      <td><?php echo $transporter->getSmsNumber() ?></td>
    </tr>
    <tr>
      <th>User type:</th>
      <td><?php echo $transporter->getUserType() ?></td>
    </tr>
    <tr>
      <th>Number of trucks:</th>
      <td><?php echo $transporter->getNumberOfTrucks() ?></td>
    </tr>
    <tr>
      <th>Business:</th>
      <td><?php echo $transporter->getBusiness() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('transporter/edit?id='.$transporter->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('transporter/index') ?>">List</a>
