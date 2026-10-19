    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Pendaftaran Rakernas & Upgrading</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="/rakernasippat2022/addnonkta_proc" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-body">
                                    Data pendaftaran berikut juga digunakan sebagai data untuk pembuatan KTA.
                                </div>
                            </div>
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="alert <?= $displayc; ?> alert-dismissible" <?= $displayw; ?>>
                                        <?= $warning; ?>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fphoto" class="col-sm-5 col-form-label">Pas photo 3x4 (.jpg) <font style="color:red">*</font></label>
                                        <div class="input-group col-sm-7">
                                            <div class="custom-file">
                                                <input type="file" accept="image/jpg" class="custom-file-input" id="fphoto" name="fphoto">
                                                <label class="custom-file-label" for="fphoto">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbnama" class="col-sm-5 col-form-label">Nama <font style="color:red">*</font></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control text-center" id="tbnama" name="tbnama" placeholder="Nama Anggota">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbnoktp" class="col-sm-5 col-form-label">KTP <font style="color:red">*</font></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control text-center" id="tbnoktp" name="tbnoktp" placeholder="Nomor Ktp">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbtgllahir" class="col-sm-5 col-form-label">Tmpt / Tgl Lahir <font style="color:red">*</font></label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control text-center" id="tbtempatlahir" name="tbtempatlahir" placeholder="Tempat">
                                        </div>
                                        <div class="input-group date col-sm-4" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="tbtgllahir" name="tbtgllahir" data-target="#reservationdate" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbalamat" class="col-sm-5 col-form-label">Alamat Tinggal</label>
                                        <div class="col-sm-7">
                                            <textarea rows="5" class="form-control text-center" id="tbalamat" name="tbalamat" placeholder="Alamat Tinggal"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbalamatkantor" class="col-sm-5 col-form-label">Alamat Kantor <font style="color:red">*</font></label>
                                        <div class="col-sm-7">
                                            <textarea rows="5" class="form-control text-center" id="tbalamatkantor" name="tbalamatkantor" placeholder="Alamat Kantor"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbtlp" class="col-sm-5 col-form-label">No Tlp <font style="color:red">*</font></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control text-center" id="tbtlp" name="tbtlp" placeholder="No Tlp Rumah">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cbpengda" class="col-sm-5 col-form-label">Pengda <font style="color:red">*</font></label>
                                        <div class="col-sm-7">
                                            <select class="form-control text-center" id="cbpengda" name="cbpengda">
                                                <option value="0">Please Select</option>
                                                <?php foreach ($cbpengda as $pengda) : ?>
                                                    <option value="<?= sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']); ?>"><?= $pengda['pengda']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="tbemail" class="col-sm-5 col-form-label">Email <font style="color:red">*</font></label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control text-center" id="tbemail" name="tbemail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbpass" class="col-sm-5 col-form-label">Password <font style="color:red">*</font></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control text-center" id="tbpass" name="tbpass" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbkpass" class="col-sm-5 col-form-label">Konfirmasi Password <font style="color:red">*</font></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control text-center" id="tbkpass" name="tbkpass" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fktp" class="col-sm-6 col-form-label">Foto KTP (.pdf)<font style="color:red">*</font></label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" accept="application/pdf" class="custom-file-input" id="fktp" name="fktp">
                                                <label class="custom-file-label" for="fktp">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbnosk" class="col-sm-6 col-form-label">No SK Pengangkatan <font style="color:red">*</font></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control text-center" id="tbnosk" name="tbnosk" placeholder="No SK Pengangkatan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fskjabatan" class="col-sm-6 col-form-label">SK Pengangkatan (.pdf)<font style="color:red">*</font></label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" accept="application/pdf" class="custom-file-input" id="fskjabatan" name="fskjabatan">
                                                <label class="custom-file-label" for="fskjabatan">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbtglsk" class="col-sm-6 col-form-label">Tgl SK Pengangkatan <font style="color:red">*</font></label>
                                        <div class="input-group date col-sm-6" id="skdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="tbtglsk" name="tbtglsk" data-target="#skdate" />
                                            <div class="input-group-append" data-target="#skdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbnobas" class="col-sm-6 col-form-label">No BA Sumpah </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control text-center" id="tbnobas" name="tbnobas" placeholder="No BAS Jabatan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fbasjabatan" class="col-sm-6 col-form-label">BA Sumpah (.pdf) <font style="color:red">*</font></label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" accept="application/pdf" class="custom-file-input" id="fbasjabatan" name="fbasjabatan">
                                                <label class="custom-file-label" for="fbasjabatan">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tbtglbas" class="col-sm-6 col-form-label">Tgl BA Sumpah <font style="color:red">*</font></label>
                                        <div class="input-group date col-sm-6" id="basdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="tbtglbas" name="tbtglbas" data-target="#basdate" />
                                            <div class="input-group-append" data-target="#basdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden>
                                        <label for="frekpengda" class="col-sm-6 col-form-label">Rekomendasi Pengda (.pdf) <font style="color:red">*</font></label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" accept="application/pdf" class="custom-file-input" id="frekpengda" name="frekpengda">
                                                <label class="custom-file-label" for="frekpengda">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-body">
                                    Data yang saya berikan adalah benar dan segala kesalahan dan pemalsuan menjadi tanggungjawab saya.
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a type="button" class="btn btn-danger" href="/rakernasippat2022/index">Cancel</a>
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