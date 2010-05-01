<h1>Customers List</h1>

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
    <?php foreach ($customers as $customer): ?>
    <tr>
      <td><a href="<?php echo url_for('customer/show?id='.$customer->getId()) ?>"><?php echo $customer->getId() ?></a></td>
      <td><?php echo $customer->getName() ?></td>
      <td><?php echo $customer->getUsername() ?></td>
      <td><?php echo $customer->getPassword() ?></td>
      <td><?php echo $customer->getMobileNumber() ?></td>
      <td><?php echo $customer->getToken() ?></td>
      <td><?php echo $customer->getUserType() ?></td>
      <td><?php echo $customer->getNumberOfTrucks() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('customer/new') ?>">New</a>
