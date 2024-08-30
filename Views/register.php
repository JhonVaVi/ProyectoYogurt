<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Register - SB Admin</title>
  <link href="../public/css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
    crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Create User</h3>
                </div>
                <div class="card-body">
                  <form id="form_register">
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" type="text"
                            placeholder="Enter your first name"  id="first_name"/>
                          <label for="inputFirstName">First name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input class="form-control" type="text"
                            placeholder="Enter your last name" id="last_name"/>
                          <label for="inputLastName">Last name</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control"  type="email" placeholder="name@example.com" id="email" />
                      <label for="inputEmail">Email address</label>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" type="password" id="password"
                            placeholder="Create a password" />
                          <label for="inputPassword">Password</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" id="password_confirm" type="password"
                            placeholder="Confirm password" />
                          <label for="inputPasswordConfirm">Confirm Password</label>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4 mb-0">
                      <div class="d-grid">
                        <button class="btn btn-primary btn-block" id="btn_nuevo_user" type="submit"> Create Account </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small">
                    <a href="login.php">Have an account? Go to login</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="../public/js/scripts.js"></script>
  <script src="../Public/js/verificar_Login.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>