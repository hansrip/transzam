<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $customer->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $customer->getName() ?></td>
    </tr>
    <tr>
      <th>Username:</th>
      <td><?php echo $customer->getUsername() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $customer->getPassword() ?></td>
    </tr>
    <tr>
      <th>Mobile number:</th>
      <td><?php echo $customer->getMobileNumber() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $customer->getToken() ?></td>
    </tr>
    <tr>
      <th>User type:</th>
      <td><?php echo $customer->getUserType() ?></td>
    </tr>
    <tr>
      <th>Number of trucks:</th>
      <td><?php echo $customer->getNumberOfTrucks() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('customer/edit?id='.$customer->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('customer/index') ?>">List</a>
