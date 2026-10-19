<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $judul; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="/anggota/edit_proc" method="post" enctype="multipart/form-data">
                <input type="hidden" id="tbid" name="tbid" value="<?= $detailuser['id_user']; ?>">
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
                                        <input type="text" class="form-control text-center" id="tbnama" name="tbnama" placeholder="Nama Anggota" value="<?= $detailuser['nama']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbtgllahir" class="col-sm-4 col-form-label">Tmpt / Tgl Lahir <font style="color:red">*</font></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control text-center" id="tbtempatlahir" name="tbtempatlahir" placeholder="Tempat" value="<?= $detailuser['tempat_lahir']; ?>">
                                    </div>
                                    <div class="input-group date col-sm-5" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="tbtgllahir" name="tbtgllahir" data-target="#reservationdate" value="<?= $detailuser['tgl_lahir']; ?>" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbalamat" class="col-sm-4 col-form-label">Alamat Tinggal <font style="color:red">*</font></label>
                                    <div class="col-sm-8">
                                        <textarea rows="5" class="form-control text-center" id="tbalamat" name="tbalamat" placeholder="Alamat Tinggal"><?= $detailuser['alamat_tinggal']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_alamatkantor; ?>>
                                    <label for="tbalamatkantor" class="col-sm-4 col-form-label">Alamat Kantor <font style="color:red">*</font></label>
                                    <div class="col-sm-8">
                                        <textarea rows="5" class="form-control text-center" id="tbalamatkantor" name="tbalamatkantor" placeholder="Alamat Kantor"><?= $detailuser['alamat_kantor']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_lokasimagang; ?>>
                                    <label for="tblokasimagang" class="col-sm-4 col-form-label">Lokasi Magang <font style="color:red">*</font></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control text-center" id="tblokasimagang" name="tblokasimagang" placeholder="Lokasi Magang" value="<?= $detailuser['lokasi_magang']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbtlp" class="col-sm-4 col-form-label">No Tlp <font style="color:red">*</font></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control text-center" id="tbtlp" name="tbtlp" placeholder="No Tlp" value="<?= $detailuser['no_tlp']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbnoktp" class="col-sm-4 col-form-label">KTP <font style="color:red">*</font></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control text-center" id="tbnoktp" name="tbnoktp" placeholder="Nomor Ktp" value="<?= $detailuser['no_ktp']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cbpengda" class="col-sm-4 col-form-label">Pengda <font style="color:red">*</font></label>
                                    <div class="col-sm-8">
                                        <select class="form-control text-center" id="cbpengda" name="cbpengda">
                                            <option value="0">Please Select</option>
                                            <?php foreach ($cbpengda as $pengda) :
                                                if (sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']) == sprintf("%02d", $detailuser['id_pengwil']) . sprintf("%02d", $detailuser['id_pengda'])) { ?>
                                                    <option value="<?= sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']); ?>" selected><?= $pengda['pengda']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= sprintf("%02d", $pengda['id_pengwil']) . sprintf("%02d", $pengda['id_pengda']); ?>"><?= $pengda['pengda']; ?></option>
                                            <?php }
                                            endforeach; ?>
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
                                    <label for="tbemail" class="col-sm-4 col-form-label">Email <font style="color:red">*</font></label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control text-center" id="tbemail" name="tbemail" placeholder="Email" value="<?= $detailuser['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbpass" class="col-sm-4 col-form-label">Password <font style="color:red">*</font></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control text-center" id="tbpass" name="tbpass" placeholder="Password" value="<?= $password; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tbnosk" class="col-sm-5 col-form-label">No SK Pengangkatan <font style="color:red">*</font></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control text-center" id="tbnosk" name="tbnosk" placeholder="No SK Pengangkatan" value="<?= $detailuser['no_sk']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_skpengangkatan; ?>>
                                    <label for="fskjabatan" class="col-sm-5 col-form-label">SK Pengangkatan <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file ">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="fskjabatan" name="fskjabatan">
                                            <label class="custom-file-label" for="fskjabatan"><?= $sk_jabatan; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbtglsk" class="col-sm-5 col-form-label">Tgl SK Pengangkatan <font style="color:red">*</font></label>
                                    <div class="input-group date col-sm-7" id="skdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="tbtglsk" name="tbtglsk" data-target="#skdate" value="<?= $detailuser['tanggal_sk']; ?>" />
                                        <div class="input-group-append" data-target="#skdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbnobas" class="col-sm-5 col-form-label">No BAS Jabatan <font style="color:red">*</font></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control text-center" id="tbnobas" name="tbnobas" placeholder="No BAS Jabatan" value="<?= $detailuser['no_bas']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_basjabatan; ?>>
                                    <label for="fbasjabatan" class="col-sm-5 col-form-label">BAS Jabatan <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file ">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="fbasjabatan" name="fbasjabatan">
                                            <label class="custom-file-label" for="fbasjabatan"><?= $bas_jabatan; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tbtglbas" class="col-sm-5 col-form-label">Tgl BAS Jabatan <font style="color:red">*</font></label>
                                    <div class="input-group date col-sm-7" id="basdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="tbtglbas" name="tbtglbas" data-target="#basdate" value="<?= $detailuser['tanggal_bas']; ?>" />
                                        <div class="input-group-append" data-target="#basdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_keteranganalb; ?>>
                                    <label for="fketalb" class="col-sm-5 col-form-label">Keterangan ALB <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="fketalb" name="fketalb">
                                            <label class="custom-file-label" for="fketalb"><?= $ket_alb; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_rekpengda; ?>>
                                    <label for="frekpengda" class="col-sm-5 col-form-label">Rek Pengda <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="frekpengda" name="frekpengda">
                                            <label class="custom-file-label" for="frekpengda"><?= $rek_pengda; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_ijasah; ?>>
                                    <label for="fijazah" class="col-sm-5 col-form-label">Ijazah <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file ">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="fijazah" name="fijazah">
                                            <label class="custom-file-label" for="fijazah"><?= $ijasah; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_transkrip; ?>>
                                    <label for="ftranskript" class="col-sm-5 col-form-label">Transkrip <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="ftranskript" name="ftranskript">
                                            <label class="custom-file-label" for="ftranskript"><?= $transkrip; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_copyktp; ?>>
                                    <label for="ffotoktp" class="col-sm-5 col-form-label">Copy KTP <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="ffotoktp" name="ffotoktp">
                                            <label class="custom-file-label" for="ffotoktp"><?= $foto_ktp; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_kwitansi; ?>>
                                    <label for="fuangpangkal" class="col-sm-5 col-form-label">Kwitansi Uang Pangkal <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="fuangpangkal" name="fuangpangkal">
                                            <label class="custom-file-label" for="fuangpangkal"><?= $uang_pangkal; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" <?= $display_protokol; ?>>
                                    <label for="fspst" class="col-sm-5 col-form-label">Sertifikat Protokol Serah Terima <font style="color:red">*</font></label>
                                    <div class="input-group col-sm-7">
                                        <div class="custom-file ">
                                            <input type="file" accept="application/pdf" class="custom-file-input" id="fspst" name="fspst">
                                            <label class="custom-file-label" for="fspst"><?= $sertifikat_protokol; ?></label>
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
                                <a type="button" class="btn btn-danger" href="/dashboardanggota/index">Cancel</a>
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