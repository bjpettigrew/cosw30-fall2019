<?php
  // start a seesion
session_start();
// Check if the user is already logged in
// If they are, redirect to welcome.php
if(isset($_SESSION['Customer_ID'])){
    header('Location: welcome.php');
    exit;
}
include('includes/header.php');
include('includes/database.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Grab values from the form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Validate the form data
    // Check if the user's email and password are in the database
    $query = "SELECT Customer_ID, Customer_First_Name, Customer_Last_Name
                FROM CUSTOMER
                WHERE email = '$email'
                AND password = '$password'";
    $result = mysqli_query($connection, $query);
    // If they are, log them in
    if($result) {
        $user = mysqli_fetch_assoc($result);
        // Add their user id to the $_SESSION
        $_SESSION['Customer_ID']= $user['Customer_ID'];
        $_SESSION['Customer_First_Name']= $user['Customer_First_Name'];
        $_SESSION['Customer_Last_Name']= $user['Customer_Last_Name'];
        print_r($Customer);
        print_r($_SESSION);
        // Redirect to the welcome.php page
        header('Location:welcome.php');
        exit;
    // If they aren't, show the log in form with an error
    } else { 
    }
} // END of $_SERVER['REQUEST_METHOD']
?>

<main class="container">

    <h1>Login Form</h1>
    <p>Please enter your correct email and password to login!</p>
    <p>If you do not have an account please click here to create one: <a href="/register.php">Create Account</a></p>
    <hr>

    <form action="/login.php" method="POST">
        <label for="email">Email Address:</label><br>
        <input type="email" name="email" id="email" value=""><br>

        <label for="password">Password:</label><br>
        <input type= "password" name="password" id="password">

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button name="Cancel">Cancel</button>
            <button name="Login in">Log in!</button>
        </div>
    </form>

</main>

<?php include('includes/footer.php');?>
