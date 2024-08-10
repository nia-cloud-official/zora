const express = require('express');
const passport = require('passport');
const router = express.Router();
const connection = require('../config/database');

// Login route
router.get('/login', (req, res) => {
  res.render('login');
});

// Auth0 callback
router.get(
  '/callback',
  passport.authenticate('auth0', { failureRedirect: '/login' }),
  (req, res) => {
    // Save user to database if not exists
    const user = req.user;
    connection.query(
      'SELECT * FROM users WHERE auth0_id = ?',
      [user.id],
      (err, results) => {
        if (err) throw err;
        if (results.length === 0) {
          connection.query(
            'INSERT INTO users (auth0_id, name, email) VALUES (?, ?, ?)',
            [user.id, user.displayName, user.emails[0].value],
            (err) => {
              if (err) throw err;
            }
          );
        }
        res.redirect('/profile');
      }
    );
  }
);

// Profile route
router.get('/profile', (req, res) => {
  if (!req.isAuthenticated()) return res.redirect('/login');
  res.render('profile', { user: req.user });
});

// Logout route
router.get('/logout', (req, res) => {
  req.logout(() => {
    res.redirect('/');
  });
});

module.exports = router;
