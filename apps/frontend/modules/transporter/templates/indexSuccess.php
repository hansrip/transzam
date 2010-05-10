<h1>Transporters List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Sf guard user</th>
      <th>Company</th>
      <th>District</th>
      <th>Address</th>
      <th>Email address</th>
      <th>Tel</th>
      <th>Cell</th>
      <th>Comment</th>
      <th>Sms number</th>
      <th>User type</th>
      <th>Number of trucks</th>
      <th>Business</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transporters as $transporter): ?>
    <tr>
      <td><a href="<?php echo url_for('transporter/show?id='.$transporter->getId()) ?>"><?php echo $transporter->getId() ?></a></td>
      <td><?php echo $transporter->getSfGuardUserId() ?></td>
      <td><?php echo $transporter->getCompany() ?></td>
      <td><?php echo $transporter->getDistrictId() ?></td>
      <td><?php echo $transporter->getAddress() ?></td>
      <td><?php echo $transporter->getEmailAddress() ?></td>
      <td><?php echo $transporter->getTel() ?></td>
      <td><?php echo $transporter->getCell() ?></td>
      <td><?php echo $transporter->getComment() ?></td>
      <td><?php echo $transporter->getSmsNumber() ?></td>
      <td><?php echo $transporter->getUserType() ?></td>
      <td><?php echo $transporter->getNumberOfTrucks() ?></td>
      <td><?php echo $transporter->getBusiness() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('transporter/new') ?>">New</a>
