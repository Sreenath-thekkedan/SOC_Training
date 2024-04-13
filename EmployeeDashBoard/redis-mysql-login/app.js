const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
const port = 3000;

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'loginpage'
});

// Connect to MySQL
db.connect((err) => {
  if (err) throw err;
  console.log('Connected to MySQL');
});

// Body parser middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Set static folder
app.use(express.static('public'));

// EJS middleware
app.set('view engine', 'ejs');

// Routes
app.get('/', (req, res) => {
  res.render('login');
});

app.listen(port, () => console.log(`Server running on port ${port}`));
app.post('/login', (req, res) => {
  const employee_name = req.body.employee_name;
  const password = req.body.password;

  // Check if the employee exists in the database
  const query = `SELECT * FROM employees WHERE name = ?`;
  db.query(query, [employee_name], (err, results) => {
    if (err) throw err;

    if (results.length > 0) {
      // Compare the provided password with the stored hash
      bcrypt.compare(password, results[0].password, (err, result) => {
        if (result) {
          // Passwords match, render the dashboard
          res.render('dashboard', {
            employee_name: results[0].name,
            employee_id: results[0].id,
            employee_details: results[0].details,
            payslip: results[0].payslip
          });
        } else {
          // Passwords do not match, show an error
          res.render('index', { error: 'Invalid password' });
        }
      });
    } else {
      // Employee not found, show an error
      res.render('index', { error: 'Employee not found' });
    }
  });
});
