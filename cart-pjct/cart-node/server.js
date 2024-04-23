// server.js
console.log('i am in server.js')
const express = require('express');
const mysql = require('mysql');
const cors = require('cors');

const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors({
  origin: 'http://localhost:5173'
}));

app.use(express.json());

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'restaurant',
});

db.connect((err) => {
  if (err) {
    console.error('Database connection failed: ' + err.stack);
    return;
  }
  console.log('Connected to database');
});


app.get('/unauthorised', (req, res) => {
  res.status(403).send('Access to this page is forbidden!!!! Go check the main page and order something!! 😋  ');
});


//Route to place an order
app.post('/place-order', (req, res) => {
  const {  cardNumber, expiryDate, cvv } = req.body;
  const order = {  cardNumber, expiryDate, cvv };
  console.log('order', order)

  //const sql = 'INSERT INTO orders SET ?';
  const sql = "INSERT INTO orders VALUES ('cardNumber', 'expiryDate', 'cvv')";


  db.query(sql, order, (err, result) => {
    if (err) {
      console.error('Error placing order: ' + err.message);
      res.status(500).json({ error: 'Failed to place order' });
      return;
    }
    console.log('Order placed successfully');
    res.status(200).json({ message: 'Order placed successfully' });
  });
});

app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});