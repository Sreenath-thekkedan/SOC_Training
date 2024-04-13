<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
</head>
<body>
    <h1>Welcome to Your Employee Dashboard</h1>
    <h2>Payslip of Current Month:</h2>
    
    <?php
    // Database connection

    @include 'config.php';

    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location:login_form.php');
     }

    // Fetch employee data from database $_SESSION['user_name']
    $sql = "SELECT * FROM user_form WHERE name = '{$_SESSION['user_name']}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>Name: " . $row["name"]. "</p>";
            echo "<p>Employee ID: " . $row["id"]. "</p>";
            echo "<p>Basic Salary: " . $row["basic_salary"]. "</p>";
            echo "<p>Allowances: " . $row["allowances"]. "</p>";
            echo "<p>Deductions: " . $row["deductions"]. "</p>";
            
            // Calculate total salary
            $totalSalary = $row["basic_salary"] + $row["allowances"] - $row["deductions"];
            echo "<p><strong>Total Salary: " . $totalSalary . "</strong></p>";
        }
    } else {
        echo "No employee data found";
    }
    $conn->close();
    ?>

    <!-- Add download link for PDF payslip -->
    <a href="generate_payslip.php" download>Download Payslip for January(PDF)</a>
    <a href="generate_payslip.php" download>Download Payslip for February(PDF)</a>
    <a href="generate_payslip.php" download>Download Payslip for March(PDF)</a>
    <a href="generate_payslip.php" download>Download Payslip for April(PDF)</a>
    <a href="generate_payslip.php" download>Download Payslip for May(PDF)</a>

    <!-- Add additional content or functionality here -->
</body>
</html>
