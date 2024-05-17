<?php
include 'db.php';


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Retrieve form data
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];

    // Check if passwords match
    if ($password != $conf_password) {
        $register_error = 'Passwords do not match';
    } else {
        // Check if email already exists
        $check_sql = "SELECT * FROM users WHERE email = '$email'";
        $check_result = $conn->query($check_sql);
        if ($check_result && $check_result->num_rows > 0) {
            $register_error = 'Email already in use';
        } else {
            // Insert user into database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                // Registration successful
                header("Location: dashboard.php");
                exit;
            } else {
                // Error inserting user
                $register_error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}



 ////////Login///////////

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    if (!empty($email) && !empty($password)) {
        
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password_from_db = $row['password'];

            // Verify the password
            if (password_verify($password, $hashed_password_from_db)) {
                // Passwords match, login successful
                echo "login successful";
                header("location: dashboard.php");
                exit();
            } else {
                // Passwords don't match
                echo "Login failed. Email or Password is incorrect";
            }
        } else {
            // User not found with the provided email
            echo "Login failed. Email or Password is incorrect";
        }

        $stmt->close();
    } else {
        echo "Input email and password.";
    }
}



/////ADD CATEGORY/////

// Assuming $conn is your database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["add_cat"])) {
    // Sanitize input to prevent SQL injection
    $add_cat = mysqli_real_escape_string($conn, $_POST['add_category']);
    
    // Correct SQL syntax for INSERT INTO statement
    $sql = "INSERT INTO category (category_name) VALUES ('$add_cat')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        // Set success message if insertion is successful
        $register_success = "Category added successfully";
    } else {
        // Display error message if insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


//////////View CAtegory//////////
// Function to retrieve categories from the database
function getCategories() {
    global $conn;
    // Query to select categories from the database
    $sql = "SELECT id, category_name FROM category";

    // Execute query
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Store categories in an array
        $categories = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    } else {
        $categories = array(); // If no categories found, return an empty array
    }

    // Close connection
    mysqli_close($conn);

    return $categories; 
}

if (isset($_GET["delete"])) {
    $categoryId = $_GET["delete"];
    
    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM category WHERE id = ?");
    $stmt->bind_param("i", $categoryId);

    if ($stmt->execute()) {
        echo "Category deleted successfully.";
    } else {
        echo "Error deleting category: " . $stmt->error;
    }

    $stmt->close();
}


?>



