<h1>Transporters List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Username</th>
      <th>Password</th>
      <th>Mobile number</th>
      <th>Token</th>
      <th>User type</th>
      <th>Number of trucks</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transporters as $transporter): ?>
    <tr>
      <td><a href="<?php echo url_for('transporter/show?id='.$transporter->getId()) ?>"><?php echo $transporter->getId() ?></a></td>
      <td><?php echo $transporter->getName() ?></td>
      <td><?php echo $transporter->getUsername() ?></td>
      <td><?php echo $transporter->getPassword() ?></td>
      <td><?php echo $transporter->getMobileNumber() ?></td>
      <td><?php echo $transporter->getToken() ?></td>
      <td><?php echo $transporter->getUserType() ?></td>
      <td><?php echo $transporter->getNumberOfTrucks() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('transporter/new') ?>">New</a>
