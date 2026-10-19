<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-logo">
                <img src="/img/LogoIPPAT.png" width="200" alt="IPPAT Logo">
            </div>
            <form action="<?= base_url('Login/process') ?>" method="post">
                <div class="input-group mb-3">
                    <input id="tbemail" name="tbemail" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="tbpass" name="tbpass" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <p class="login-box-msg"><?= $warning; ?></p>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            <p class="login-box-msg">
                <a href="" class="text-center">Forgot Password</a> |
                <a href="/alb/add" class="text-center">Register ALB</a>
            </p>
        </div>
    </div>
</div>