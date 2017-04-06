var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});

module.exports = router;
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

router.get('/', function(req, res, next) {
  var conn = connection();
  conn.connect(function(err) {
    if (err) {
      res.render('error', {error: err});
      return;
    }
    conn.query('select * from store', function(mysqlErr, mysqlRes, mysqlFields) {
      conn.end();
      if (mysqlErr) {
        res.render('error', {error: mysqlErr});
      } else {
        res.render('index', {title: 'Express', mysql: mysqlRes});
      }
    });
  });

});

router.post('/', jsonParser, function(req, res) {
  var conn = connection();
  conn.connect(function(err) {
    if (err) {
      res.render('error', {error: err});
      return;
    }

    console.log("params", req);

    conn.query('insert into store (name, qty, price) values (?, ?, ?)',
      [req.body.name, req.body.qty, req.body.price],
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

