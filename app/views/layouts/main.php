<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= $this->getMeta(); ?>
    <link rel="stylesheet" href="<?= PATH ?>/public/libs/bulma/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bulma-modal-fx/dist/css/modal-fx.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/public/css/main.css">
</head>
<body>
<nav class="navbar is-link" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
               data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Home
                </a>
                <a class="navbar-item">
                    Documentation
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary modal-button" data-target="loginModal">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-light">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- modal-fadeInScale-fs top -->
<div id="loginModal" class="modal modal-fx-fadeInScale">
    <div class="modal-background"></div>
    <div class="modal-content modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Register Form</p>
            <button class="modal-button-close delete" aria-label="close"></button>
        </header>

        <section class="modal-card-body">
            <form action="">
                <div class="field">
                    <label class="label">Username</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Enter Username">
                        <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Enter Email">
                        <span class="icon is-small is-left"><i class="far fa-envelope"></i></span>
                    </div>
                    <p class="help is-danger">This email is invalid</p>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Enter Password">
                        <span class="icon is-small is-left"><i class="fas fa-key"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Confirm password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Confirm Password">
                        <span class="icon is-small is-left"><i class="fas fa-key"></i></span>
                    </div>
                </div>

                <button class="button is-block is-primary">Register</button>
            </form>
        </section>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://unpkg.com/bulma-modal-fx/dist/js/modal-fx.min.js"></script>
<script src="<?= PATH ?>/public/js/script.js"></script>
</body>
</html>