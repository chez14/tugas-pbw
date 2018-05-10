<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->include("_part/header.php"); ?>
</head>
<body>
    <?= $this->include("_part/navbar.php"); ?>
    <div class="container">
        <div class="columns">
            <?= $this->include("_part/sidebar.php"); ?>       
            
            <div class="column">
                <div class="content">
                    <h2 class="is-title">Profil</h2>
                    <?= $this->include("_part/message.php"); ?>
                    <div class="columns">
                        <div class="column">
                            <firgure class="image is-128x128">
                                <img src="/assets/img/profile.jpg" alt="" class="">
                            </firgure>
                        </div>
                        <div class="column">
                            <p>Press this button to update:</p>
                            <a href="#" class="button is-primary" data-trigger="profile-edit">Update Profile</a>
                            <p id="status" class="has-text-success"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ganti -->
    <div class="modal is-active" id="profile-edit">
        <div class="modal-background"></div>
        <div class="modal-content">
        <div class="card">
                <div class="card-content">
                    <h3 class="is-title">Update Profil</h3>
                    <form action="#" id="profiler">
                        <div class="columns">
                            <div class="column">
                                <p>Personal Profile</p>
                                <div class="field">
                                    <label class="label">Name</label>
                                    <div class="control">
                                        <input required class="input" type="text" value="<?= $user['nama'] ?>" name="nama">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Telepon</label>
                                    <div class="control">
                                        <input required class="input" type="tel" value="<?= $user['telepon'] ?>" name="telepon">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Alamat</label>
                                    <div class="control">
                                        <input required class="input" type="text" value="<?= $user['alamat'] ?>" name="alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <p>Login Information Update</p>
                                <small>Isi jika anda ingin mengubah password juga.</small>
                                <div class="field">
                                    <label for="password" class="label">Password</label>
                                    <div class="control">
                                        <input type="password" name="password" class="input">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="password" class="label">Confirm Password</label>
                                    <div class="control">
                                        <input type="password" name="password_c" class="input">
                                    </div>
                                </div>

                                <p class="has-text-danger" id="err"></p>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column has-text-centered">
                                <button class="button is-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <button class="modal-close is-large" data-trigger="close-modal"></button>
    </div>
    <?= $this->include("_part/footer.php"); ?>
    <script>
        $(document).ready(()=>{
            $("[data-trigger='profile-edit']").click((e)=>{
                $("#profile-edit").addClass("is-active");
            });
            $("#profiler").submit(function(e) {
                e.preventDefault();
                let data = {
                    nama: $("[name='nama']").val(),
                    telepon: $("[name='telepon']").val(),
                    alamat: $("[name='alamat']").val(),
                    password: $("[name='password']").val()
                }
                if($("[name='password']").val() && $("[name='password']").val() != $("[name='password_c']").val()) {
                    $("#err").text("Error: Password tidak sama!");
                    return;
                }

                $("#profiler input").attr("disabled", "disabled");
                $("#profiler button").addClass("is-loading");

                $.ajax({
                    url: "/user/profil",
                    method:"post",
                    data: JSON.stringify(data),
                    contentType: 'application/json'
                }).done((dat)=>{
                    $("#profiler input").attr("disabled", null);
                    $("#profiler button").removeClass("is-loading");
                    $("#profile-edit").removeClass("is-active");
                    $("#status").text("Update sukses!");
                });
            });
        });
    </script>
</body>
</html>