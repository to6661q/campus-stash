        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Edit Data</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <form action="/anggota/editbyid_proc" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="tbid" name="tbid" value="<?= $detail['id_user']; ?>">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="alert <?= $displayc; ?> alert-dismissible" <?= $displayw; ?>>
                                            <?= $warning; ?>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fphoto" class="col-sm-4 col-form-label">Pas photo (3x4) <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="custom-file-input" id="fphoto" name="fphoto">
                                                    <label class="custom-file-label" for="fphoto"><?= $foto; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbnama" class="col-sm-4 col-form-label">Nama <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbnama" name="tbnama" placeholder="Nama Anggota" value="<?= $detail['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbtgllahir" class="col-sm-4 col-form-label">Tmpt / Tgl Lahir <font style="color:red">*</font></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control text-center" id="tbtempatlahir" name="tbtempatlahir" placeholder="Tempat" value="<?= $detail['tempat_lahir']; ?>">
                                            </div>
                                            <div class="input-group date col-sm-5" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" id="tbtgllahir" name="tbtgllahir" data-target="#reservationdate" value="<?= $detail['tgl_lahir']; ?>" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbalamat" class="col-sm-4 col-form-label">Alamat Tinggal <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <textarea rows="5" class="form-control text-center" id="tbalamat" name="tbalamat" placeholder="Alamat Tinggal"><?= $detail['alamat_tinggal']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbalamatkantor" class="col-sm-4 col-form-label">Alamat Kantor <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <textarea rows="5" class="form-control text-center" id="tbalamatkantor" name="tbalamatkantor" placeholder="Alamat Kantor"><?= $detail['alamat_kantor']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbtlp" class="col-sm-4 col-form-label">No Tlp <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbtlp" name="tbtlp" placeholder="No Tlp" value="<?= $detail['no_tlp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbnoktp" class="col-sm-4 col-form-label">KTP <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbnoktp" name="tbnoktp" placeholder="Nomor Ktp" value="<?= $detail['no_ktp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cbpengda" class="col-sm-4 col-form-label">Pengda <font style="color:red">*</font></label>
                                            <div class="col-sm-8">
                                                <select class="form-control text-center" id="cbpengda" name="cbpengda">
                                                    <?php
                                                    foreach ($cbpengda as $pengda) :
                                                        if (($detailuser['id_pengwil'] == $pengda['id_pengwil'] && $detailuser['id_pengda'] == $pengda['id_pengda']) || $detailuser['id_role'] == '1' || $detailuser['id_role'] == '2' || $detailuser['id_role'] == '9') {
                                                            if (sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']) == sprintf("%02d", $detail['id_pengwil']) . sprintf("%02d", $detail['id_pengda'])) { ?>
                                                                <option value="<?= sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']); ?>" selected><?= $pengda['pengda']; ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']); ?>"><?= $pengda['pengda']; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="tbemail" class="col-sm-4 col-form-label">Email </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbemail" name="tbemail" placeholder="Email" value="<?= $detail['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbpass" class="col-sm-4 col-form-label">Password </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control text-center" id="tbpass" name="tbpass" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="tbnosk" class="col-sm-5 col-form-label">No SK Pengangkatan </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control text-center" id="tbnosk" name="tbnosk" placeholder="No SK Pengangkatan" value="<?= $detail['no_sk']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbskjabatan" class="col-sm-5 col-form-label">SK Pengangkatan </label>
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fskjabatan" name="fskjabatan">
                                                    <label class="custom-file-label" for="fskjabatan"><?= $sk_jabatan; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbtglsk" class="col-sm-5 col-form-label">Tgl SK Pengangkatan </label>
                                            <div class="input-group date col-sm-7" id="skdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" id="tbtglsk" name="tbtglsk" data-target="#skdate" value="<?= $detail['tanggal_sk']; ?>" />
                                                <div class="input-group-append" data-target="#skdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbnobas" class="col-sm-5 col-form-label">No BAS Jabatan </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control text-center" id="tbnobas" name="tbnobas" placeholder="No BAS Jabatan" value="<?= $detail['no_bas']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbbasjabatan" class="col-sm-5 col-form-label">BAS Jabatan </label>
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fbasjabatan" name="fbasjabatan">
                                                    <label class="custom-file-label" for="fbasjabatan"><?= $bas_jabatan; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbtglbas" class="col-sm-5 col-form-label">Tgl BAS Jabatan </label>
                                            <div class="input-group date col-sm-7" id="basdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" id="tbtglbas" name="tbtglbas" data-target="#basdate" value="<?= $detail['tanggal_bas']; ?>" />
                                                <div class="input-group-append" data-target="#basdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbketalb" class="col-sm-5 col-form-label">Keterangan ALB </label>
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fketalb" name="fketalb">
                                                    <label class="custom-file-label" for="fketalb"><?= $ket_alb; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tbrekpengda" class="col-sm-5 col-form-label">Rek Pengda <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="frekpengda" name="frekpengda">
                                                    <label class="custom-file-label" for="frekpengda"><?= $rek_pengda; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row" <?= $display_sertifikatpeningkatan; ?>>
                                            <label for="fspk" class="col-sm-5 col-form-label">Sertifikat Peningkatan Kualitas <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file ">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fspk" name="fspk">
                                                    <label class="custom-file-label" for="fspk"><?= $sertifikat_peningkatan; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row" <?= $display_skperpanjang; ?>>
                                            <label for="fskperpanjang" class="col-sm-5 col-form-label">SK Perpanjangan <font style="color:red">*</font></label>
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file ">
                                                    <input type="file" accept="application/pdf" class="custom-file-input" id="fskperpanjang" name="fskperpanjang">
                                                    <label class="custom-file-label" for="fskperpanjang"><?= $sk_perpanjangan; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a type="button" class="btn btn-danger" href="/anggota/index">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.container-fluid -->
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