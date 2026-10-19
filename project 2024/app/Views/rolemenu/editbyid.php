<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Role <?= $role['nama_role']; ?></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->
    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
            <form action="/RoleMenu/editbyid_proc/<?= $role['id_role']; ?>" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!--/.card-header -->
                            <div class="card-body" id="divTableDataHolder" style="font-size:10px;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Menu</th>
                                            <th>Akses</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Download</th>
                                            <th>Upload</th>
                                            <th>Approve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listmenu as $lmenu) : ?>
                                            <tr>
                                                <td>
                                                    <?= $lmenu['menu_name']; ?>
                                                </td>
                                                <?php if (is_int(array_search($lmenu['id_menu'], array_column($listaccess, 'id_menu')))) {
                                                ?>
                                                    <td>
                                                        <input type="checkbox" id="Akses<?= $lmenu['id_menu']; ?>" name="Akses<?= $lmenu['id_menu']; ?>" checked />
                                                    </td>
                                                    <td>
                                                        <?php if ($listaccess[array_search($lmenu['id_menu'], array_column($listaccess, 'id_menu'))]['add'] == '1') { ?>
                                                            <input type="checkbox" id="Add<?= $lmenu['id_menu']; ?>" name="Add<?= $lmenu['id_menu']; ?>" checked />
                                                        <?php } else { ?>
                                                            <input type="checkbox" id="Add<?= $lmenu['id_menu']; ?>" name="Add<?= $lmenu['id_menu']; ?>" />
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($listaccess[array_search($lmenu['id_menu'], array_column($listaccess, 'id_menu'))]['edit'] == '1') { ?>
                                                            <input type="checkbox" id="Edit<?= $lmenu['id_menu']; ?>" name="Edit<?= $lmenu['id_menu']; ?>" checked />
                                                        <?php } else { ?>
                                                            <input type="checkbox" id="Edit<?= $lmenu['id_menu']; ?>" name="Edit<?= $lmenu['id_menu']; ?>" />
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($listaccess[array_search($lmenu['id_menu'], array_column($listaccess, 'id_menu'))]['delete'] == '1') { ?>
                                                            <input type="checkbox" id="Delete<?= $lmenu['id_menu']; ?>" name="Delete<?= $lmenu['id_menu']; ?>" checked />
                                                        <?php } else { ?>
                                                            <input type="checkbox" id="Delete<?= $lmenu['id_menu']; ?>" name="Delete<?= $lmenu['id_menu']; ?>" />
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($listaccess[array_search($lmenu['id_menu'], array_column($listaccess, 'id_menu'))]['download'] == '1') { ?>
                                                            <input type="checkbox" id="Download<?= $lmenu['id_menu']; ?>" name="Download<?= $lmenu['id_menu']; ?>" checked />
                                                        <?php } else { ?>
                                                            <input type="checkbox" id="Download<?= $lmenu['id_menu']; ?>" name="Download<?= $lmenu['id_menu']; ?>" />
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($listaccess[array_search($lmenu['id_menu'], array_column($listaccess, 'id_menu'))]['upload'] == '1') { ?>
                                                            <input type="checkbox" id="Upload<?= $lmenu['id_menu']; ?>" name="Upload<?= $lmenu['id_menu']; ?>" checked />
                                                        <?php } else { ?>
                                                            <input type="checkbox" id="Upload<?= $lmenu['id_menu']; ?>" name="Upload<?= $lmenu['id_menu']; ?>" />
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($listaccess[array_search($lmenu['id_menu'], array_column($listaccess, 'id_menu'))]['approve'] == '1') { ?>
                                                            <input type="checkbox" id="Approve<?= $lmenu['id_menu']; ?>" name="Approve<?= $lmenu['id_menu']; ?>" checked />
                                                        <?php } else { ?>
                                                            <input type="checkbox" id="Approve<?= $lmenu['id_menu']; ?>" name="Approve<?= $lmenu['id_menu']; ?>" />
                                                        <?php } ?>
                                                    </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td>
                                                        <input type="checkbox" id="Akses<?= $lmenu['id_menu']; ?>" name="Akses<?= $lmenu['id_menu']; ?>" />
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" id="Add<?= $lmenu['id_menu']; ?>" name="Add<?= $lmenu['id_menu']; ?>" />
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" id="Edit<?= $lmenu['id_menu']; ?>" name="Edit<?= $lmenu['id_menu']; ?>" />
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" id="Delete<?= $lmenu['id_menu']; ?>" name="Delete<?= $lmenu['id_menu']; ?>" />
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" id="Download<?= $lmenu['id_menu']; ?>" name="Download<?= $lmenu['id_menu']; ?>" />
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" id="Upload<?= $lmenu['id_menu']; ?>" name="Upload<?= $lmenu['id_menu']; ?>" />
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" id="Approve<?= $lmenu['id_menu']; ?>" name="Approve<?= $lmenu['id_menu']; ?>" />
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a type="button" class="btn btn-danger" href="/RoleMenu/index">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="http://www.arsyscaturangga.co.id">Arsyscaturangga</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
</div>