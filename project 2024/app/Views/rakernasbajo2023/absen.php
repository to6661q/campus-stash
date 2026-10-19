<div class="login-box">

    <div class="card">

        <div class="card-body login-card-body">

            <div class="login-logo">

                <img src="/img/LogoIPPAT.png" width="200">

            </div>

            <form action="/pendaftaranpelatihan/approveabsen" method="post">

                <input type="text" class="form-control text-center" id="tbiduser" name="tbiduser" value="<?= $detail['id_user']; ?>" hidden>

                <p class="login-box-msg"><?= $warning; ?></p>

                <div class="input-group mb-3">

                    <div class="col-12">

                        <input type="text" class="form-control text-center" id="tbpin" name="tbpin" placeholder="PIN">

                    </div>

                </div>

                <input type="radio" name="rbpelatihan" value="blank" checked hidden>

                <?php foreach ($listpelatihan as $pelatihan) : ?>

                    <div class="input-group mb-3">

                        <label class="btn btn-success col-12" for="<?= $pelatihan['id_peserta']; ?>">

                            <input type="radio" name="rbpelatihan" id="<?= $pelatihan['id_peserta']; ?>" value="<?= $pelatihan['id_peserta']; ?>">

                            <font style="color:white; font-size:13px"><?= $pelatihan['nama_pelatihan']; ?></font>

                        </label>

                    </div>

                <?php endforeach; ?>

                <div class="row">

                    <div class="col-12">

                        <button type="submit" class="btn btn-primary btn-block">

                            <font style="color:white; font-size:13px">Approve</font>

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>