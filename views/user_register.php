<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->include("_part/header.php"); ?>
</head>
<body>
    <div class="container">
        <?= $this->include("_part/kepala.php"); ?>        
        <div class="columns is-centered">
            <div class="column is-4">
                <section class="section has-text-centered">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Create New Account
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <form action="#" method="post" class="control" id="kambing">
                                    <div class="field">
                                        <label class="label">Username</label>
                                        <div class="control">
                                            <input required class="input" type="text" placeholder="Text input" name="username">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Password</label>
                                        <div class="control">
                                            <input required class="input" type="password" placeholder="Text input" name="password">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Confirm Password</label>
                                        <div class="control">
                                            <input required class="input" type="password" placeholder="Text input" name="password_c">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Name</label>
                                        <div class="control">
                                            <input required class="input" type="text" placeholder="Text input" name="name">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Phone</label>
                                        <div class="control">
                                            <input required class="input" type="phone" placeholder="Text input" name="phone">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Address</label>
                                        <div class="control">
                                            <input required class="input" type="text" placeholder="Text input" class="addr">
                                        </div>
                                    </div>
                                    <div class="control">
                                        <button class="button is-primary" id="btnReg">Register</button>
                                        <a href="/" class="button">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="modal" id="reg_modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                <div class="card-content has-text-centered">
                    <strong class="has-text-success">Congratulations!</strong> Your account has been registered.<br/>
                    You now may login to our service.
                </div>
                <footer class="card-footer">
                    <a href="/" class="card-footer-item">Login</a>
                    <a href="#" data-trigger="close-modal" class="card-footer-item">Cancel</a>
                </footer>
            </div>
        </div>
        <button class="modal-close is-large" data-trigger="close-modal" aria-label="close"></button>
    </div>
    <div class="modal" id="error_modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <article class="message is-warning">
                <div class="message-header">
                    <p>Warning!</p>
                    <button class="delete" data-trigger="close-modal" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    Your password doesn't match!
                </div>
            </article>
        </div>
        <button class="modal-close is-large" data-trigger="close-modal" aria-label="close"></button>
    </div>
    <?= $this->include("_part/footer.php"); ?>
    <script>
        $(document).ready(()=>{
            $("#kambing").submit((e)=>{
                e.preventDefault();
                let data = {
                    username: $("input[name='username']").val(),
                    password: $("input[name='password']").val(),
                    address: $("input[name='address']").val(),
                    phone: $("input[name='phone']").val(),
                }
                if(data.password != $("input[name='password_c']").val()) {
                    $("#error_modal").addClass("is-active");
                    return;
                }

                $("form input, form button").attr("disabled", "disabled");
                $("form button").addClass("is-loading");
                
                $.ajax({
                    url: "/user/register",
                    method:"post",
                    data: JSON.stringify(data),
                    contentType: 'application/json'
                }).done((dat)=>{
                    if(dat.status) {
                        $("#reg_modal").addClass("is-active");
                    }
                    $("form input, form button").attr("disabled", null);
                    $("form button").removeClass("is-loading");
                    
                });
            });
        });
    </script>
</body>
</html>