<h1>Users List</h1>

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
    <?php foreach ($users as $user): ?>
    <tr>
      <td><a href="<?php echo url_for('user/show?id='.$user->getId()) ?>"><?php echo $user->getId() ?></a></td>
      <td><?php echo $user->getName() ?></td>
      <td><?php echo $user->getUsername() ?></td>
      <td><?php echo $user->getPassword() ?></td>
      <td><?php echo $user->getMobileNumber() ?></td>
      <td><?php echo $user->getToken() ?></td>
      <td><?php echo $user->getUserType() ?></td>
      <td><?php echo $user->getNumberOfTrucks() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
