
<?php require_once "../component/header.php"; ?>

<!-- Sidebar Start -->
<?php require_once "../component/sidebar.php"; ?>
<!-- Sidebar End -->
    <h6 class="mb-4">Users List</h6>

    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>

            <?php
                $rs = $crud->common_select("users", "*");
                if($rs && $rs['status']){
                    foreach($rs['data'] as $row){
            ?>
                <tr>
                    <td><?= $row->id ?></td>
                    <td><?= $row->name ?></td>
                    <td><?= $row->email ?></td>
                    <td><?= $row->contact_no ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $row->id ?>">Edit</a> |
                        <a onclick="return confirm('Are you sure you want to delete this user?');" href="delete_user.php?id=<?= $row->id ?>">Delete</a>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>

<?php require_once "../component/footer.php"; ?>