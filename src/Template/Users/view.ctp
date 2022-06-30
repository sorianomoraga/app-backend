<h4>View user</h4>

<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Name</th>
    <th>Last name</th>
    <th>Role</th>
  </tr>
  <tbody>
      <tr>
        <td><?= $user->id ?></td>
        <td><?= $user->username ?></td>
        <td><?= $user->first_name ?></td>
        <td><?= $user->last_name ?></td>
        <td><?= $user->role ?></td>
      </tr>

  </tbody>
</table>

<div>
  <a href="<?= FULL_BASE_URL ?>users/index" class="btn btn-primary">BACK</a>
</div>
