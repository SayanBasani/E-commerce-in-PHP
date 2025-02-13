console.log("it is db . js ");

import mysql from 'mysql2';
const db = mysql.createPool({
  host: 'localhost',
  user:'root',
  password: 'admin',
  database: 'ecom'
})
db.getConnection((err, connection) => {
  if (err) {
    console.log(err);
  } else {
    console.log('Database connected');
  }
})
function update_cart(id, quantity) {
  db.query(`UPDATE cart SET quantity = ${quantity} WHERE id = ${id}`, (err, result) => {
    if (err) {
      console.log(err);
    } else {
      console.log('Cart updated');
    }
  })
}