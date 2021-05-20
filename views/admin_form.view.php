<?php require 'partials/header.php'?>
<div class="row aling-items-center justify-content-center">
    <div class="col-lg-5 mt-2">
        <div class="card">
            <div class="card-body">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <div class="form-group m-2">
                        <label for="usuario">Email address</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group m-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<?php require 'partials/footer.php'?>