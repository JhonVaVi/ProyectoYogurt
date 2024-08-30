 <?php

// include_once 'logic/user.php';
// include_once 'logic/user_session.php';
 include_once 'config.php';

// $userSession = new UserSession();
// $user = new User();

// if (isset($_SESSION['user'])) {
//   echo "<h1>Hay sesión</h1>";
//   $user->setUser($userSession->getCurrentUser());
//   header("location:" . dashboard);
  //include_once 'Views/dashboard.php'; 
  // include_once 'Views/Customers/index.php'; 
// } else if (isset($_POST['username']) && isset($_POST['password'])) {
//   // echo "Validación de login";

//   $userForm = $_POST['username'];
//   $passForm = $_POST['password'];
//   $user = new User();
//   if ($user->userExists($userForm, $passForm)) {
//     //  echo "usuario validado";
//     $userSession->setCurrentUser($userForm);
//     $user->setUser($userForm);
//     //header("location:" . dashboard);
//     header("location:" . dashboard);
   
//   } else {
    // //echo "nombre de usuario y/o password incorrecto 123";
    // $errorLogin = "Nombre de usuario y/o password es incorrecto";
    // //header("location:" . dashboard);
    // header("location:" . urlsite);
  // }
//} else {

  // echo "No hay sesión";
  //header("location:" . dashboard);
  header("location:" . urlsite);
  //include_once 'Views/login.php';
//} 
