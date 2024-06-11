<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOLO MOLO - connexion</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-6 d-none d-md-flex bg-image"></div>
            <div class="col-md-6 bg-light">
                <div class="signin d-flex aligns-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">CONNEXION</h3>
                                <p class="text-muted mb-4">vous n'avez pas de compte? <a href="./?sign=up">Sign up</a></p>
                                <form action="" method="POST" class="form-signin" >
                                    <input type="hidden" name="action" value="signin" >
                                    <div class="form-group mb-3">
                                        <input type="text" name="username" id="" placeholder="username ou email" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" name="password" id="" placeholder="mot de passe" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" name="" id="customcheck1" class="custom-control-input">
                                        <label for="customcheck1" class="custom-control-label">se rappeler de moi</label>
                                    </div>
                                    <input type="reset" value="effacer" class="btn btn-secondary btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">connexion</button>
                                    <div class="text-right">
                                        <a href="#" class="text-muted">mot de passe oublié?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>