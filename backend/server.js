const express = require('express');
const sqlite3 = require('sqlite3').verbose();

const app = express();
const port = 3000;

const db = new sqlite3.Database(':memory:');

app.use(express.static('public'));
app.use(express.json());

db.serialize(() => {
    db.run("CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT)");

    app.post('/execute', (req, res) => {
        const sql = req.body.sql;
        db.all(sql, [], (err, rows) => {
            if (err) {
                res.status(500).json({ error: err.message });
                return;
            }
            res.json(rows);
        });
    });
});

app.listen(port, () => {
    console.log(`Server is listening at http://localhost:${port}`);
});
