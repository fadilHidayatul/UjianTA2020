<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <!-- Default form login -->
                    <form class="text-center" method="POST" action="aksi/aksi-login.php">
                        
                        <p class="h4 mb-4">Sign in</p>

                        <input id="email" type="text" class="form-control mb-4" name="username" value="" placeholder="username" required autocomplete="email" autofocus>

                        <!-- Password -->
                        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="password" placeholder="Password" required>


                        <!-- Sign in button -->
                        <button type="submit" name="btnLogin" class="btn btn-danger btn-block my-4">
                            Login
                        </button>
                        

                    </form>
                    <!-- Default form login -->
                </div>
            </div>
        </div>
    </div>
</div>
