var express = require('express');
var router = express.Router();
var mysql = require('mysql');
var bodyParser = require('body-parser');
var jsonParser = bodyParser.json();

function connection() {
  return mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'momandpop',
    database: 'lab'
  });
}

router.get('/:id', function(req, res, next) {
  var conn = connection();
  conn.connect(function(err) {
    if (err) {
      res.render('error', {error: err});
      return;
    }
    conn.query('delete from store where id=?', [req.params.id],
      function(mysqlErr, mysqlRes, mysqlFields) {
        conn.end();
        if (mysqlErr) {
          res.render('error', {error: mysqlErr});
        } else {
          res.redirect('/');
        }
      }
    );
  });
});

module.exports = router;
//view raw
