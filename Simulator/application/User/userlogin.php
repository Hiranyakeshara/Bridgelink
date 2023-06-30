<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Login Page </title>
        <link rel="stylesheet" href="./login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

<body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>


    <!-- Login form-->
<div class="container square-box d-flex justify-content-center">
    <div class="card vw-100 vh-50 text-center">  
        <div class="card-body">

            <h1>Login to our network </h1>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card h-100">
                    <div class="card-body">
                        <form action ="LOGIN.php" method="post">

                            <h2>VPN Login </h2> 
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Select (VPN)</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        <option value="1">ClientVPN</option>
                                        <option value="2">ManagerVPN</option>
                                        <option value="3">AdminVPN</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Enter Username</span>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                                    <input type="password" id="inputPassword5" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                </div>

                        </form>
                    </div></div></div>
                    <div class="col-sm-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <form action ="LOGIN.php" method="post">

                            <h2>Public Login </h2>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                                    <input type="password" id="inputPassword5" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                </div>

                        </form>          
                    </div></div></div>
                </div>     
        </div>
    </div>

</div>

</body>
</html>

