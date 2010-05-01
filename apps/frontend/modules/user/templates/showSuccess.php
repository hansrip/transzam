<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $user->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $user->getName() ?></td>
    </tr>
    <tr>
      <th>Username:</th>
      <td><?php echo $user->getUsername() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $user->getPassword() ?></td>
    </tr>
    <tr>
      <th>Mobile number:</th>
      <td><?php echo $user->getMobileNumber() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $user->getToken() ?></td>
    </tr>
    <tr>
      <th>User type:</th>
      <td><?php echo $user->getUserType() ?></td>
    </tr>
    <tr>
      <th>Number of trucks:</th>
      <td><?php echo $user->getNumberOfTrucks() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('user/index') ?>">List</a>
