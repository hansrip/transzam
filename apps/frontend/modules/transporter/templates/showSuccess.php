<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $transporter->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $transporter->getName() ?></td>
    </tr>
    <tr>
      <th>Username:</th>
      <td><?php echo $transporter->getUsername() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $transporter->getPassword() ?></td>
    </tr>
    <tr>
      <th>Mobile number:</th>
      <td><?php echo $transporter->getMobileNumber() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $transporter->getToken() ?></td>
    </tr>
    <tr>
      <th>User type:</th>
      <td><?php echo $transporter->getUserType() ?></td>
    </tr>
    <tr>
      <th>Number of trucks:</th>
      <td><?php echo $transporter->getNumberOfTrucks() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('transporter/edit?id='.$transporter->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('transporter/index') ?>">List</a>
