<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <!-- Load Bootstrap CSS -->

</head>

<body>
    <div class="container">  
        <form action="<?= BASEURL ?>/login/login" method="POST">
        <a href="<?= BASEURL?>/login/login"><img class="mb-4" src="<?=IMG?>/logo-01.png" alt="" width="72" height="57"></a>
        <h1 class="text-center my-5">PAL Login</h1>

        <?= Flasher::flash() ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="nama_user" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Sebagai: </label>
                            <select class="form-control input-border-bottom" name="sebagai" required>
                                <option value="laboran">Laboran</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                        </div>

                    </div>
                    <center>
                        <div class="mb-3">
                            <button  class="btn btn-outline-success" type="submit">Login</button>
                        </div>
                        <p class="mt-5 mb-3 text-muted">&copy;1999–2023 Laboratorium Terpadu Fakultas Ilmu Komputer</p>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>

</html>