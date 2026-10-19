<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-logo">
                <img src="/img/LogoIPPAT.png" width="200">
            </div>
            <form action="/pendaftaranpelatihan/daftar_proc" method="post">
                <div class="row">
                    <div class="col-12 btn btn-success btn-block">
                        <?= $warning; ?>
                    </div>
                </div>
                <p></p>
                <input type="text" class="form-control text-center" id="tbiduser" name="tbiduser" value="<?= $detailuser['id_user']; ?>" hidden>
                <input type="text" class="form-control text-center" id="tbidpelatihanr" name="tbidpelatihanr" value="<?= $idpelatihan; ?>" hidden>
                <div class="input-group mb-3">
                    <div class="col-12">
                        <input type="text" class="form-control text-center" id="tbemail" name="tbemail" placeholder="Email" value="<?= $detailuser['email']; ?>">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="col-12">
                        <input type="text" class="form-control text-center" id="tbtlp" name="tbtlp" placeholder="No WA" value="<?= $detailuser['no_tlp']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">
                            <font style="color:white; font-size:13px">Daftar</font>
                        </button>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-danger btn-block" href="/anggota/datauser/<?= $detailuser['id_user']; ?>">
                            <font style="color:white; font-size:13px">Cancel</font>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>