<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h1>Registration</h1>
                </div>
                <a href="/assign1/display.php">Click here to view saved data</a>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input required type="text" class="form-control" id="firstName" name="firstName" />
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input required type="text" class="form-control" id="lastName" name="lastName" />
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div>
                                <label for="male" class="radio-inline"><input
                      type="radio"
                      name="gender"
                      value="m"
                      id="male"
                    />Male</label
                  >
                  &nbsp;&nbsp;
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                    />Female</label
                  >
                  &nbsp;&nbsp;
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                    />Others</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                                <input required type="text" class="form-control" id="email" name="email" />
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input required type="text" class="form-control" id="city" name="city" />
                            </div>
                            <div class="form-group">
                                <label for="number">Phone Number</label>
                                <input required type="number" class="form-control" id="number" name="number" />
                            </div>
                            <input required type="submit" class="btn btn-primary" />
                    </form>
                    </div>
                    <div class="panel-footer text-right">
                        <small>Made by Shivam Tadas</small>
                    </div>
                </div>
            </div>
        </div>
        <?php
$firstname = "";
$lastname = "";
$gender = "";
$email = "";
$city = "";
$number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $number = $_POST['number'];

    // Database connection
    $conn = new mysqli('localhost', 'root', NULL, 'assign1'); 
    if ($conn->connect_error)
        die("Connection Failed: " . $conn->connect_error);

    $stmt = $conn->prepare("INSERT INTO user (firstName, lastName, gender, email, city, number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstname, $lastname, $gender, $email, $city, $number);
    
    if ($stmt->execute())
        echo "<h3>Registered successfully!</h3>";
    else
        echo "<h3>Error: " . $stmt->error . "</h3>";

    $stmt->close();
    $conn->close();
}
?>

        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded mr-2" alt="...">
                <strong class="mr-auto">Bootstrap</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
</body>
</html>
