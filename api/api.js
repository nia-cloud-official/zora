const http = require('http');
const url = require('url');

const port = 8081;

http.createServer((req, res) => {
    const pathname = url.parse(req.url).pathname;

    if (pathname === '/users' && req.method === 'GET') {
        const users = fetchUsers();
        res.writeHead(200, { 'Content-Type': 'application/json' });
        res.end(JSON.stringify(users));
    } else if (pathname === '/users' && req.method === 'POST') {
        let userData = '';
        req.on('data', (chunk) => {
            userData += chunk;
        });
        req.on('end', () => {
            const user = JSON.parse(userData);
            createUser(user);
            res.writeHead(201, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify({ message: 'User created successfully' }));
        });
    } else if (pathname === '/databases' && req.method === 'POST') {
        let databaseData = '';
        req.on('data', (chunk) => {
            databaseData += chunk;
        });
        req.on('end', () => {
            const database = JSON.parse(databaseData);
            createDatabase(database.name);
            res.writeHead(201, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify({ message: 'Database created successfully' }));
        });
    } else {
        res.writeHead(404, { 'Content-Type': 'application/json' });
        res.end(JSON.stringify({ message: 'Not found' }));
    }
}).listen(port, () => {
    console.log(`Server listening on port ${port}`);
});

function fetchUsers() {
    // Call C++ database engine API to retrieve users
    const users = new Buffer(0);
    const lib = require('./database');
    const usersPtr = lib.fetch_users();
    const usersArray = new Array(usersPtr.length / sizeof(User));
    for (let i = 0; i < usersPtr.length / sizeof(User); i++) {
        usersArray[i] = {
            name: lib.getString(usersPtr + i * sizeof(User) + 0),
            age: lib.getInt(usersPtr + i * sizeof(User) + 8),
        };
    }
    return usersArray;
}

function createUser(user) {
    // Call C++ database engine API to create user
    const lib = require('./database');
    lib.create_user(user);
}

function createDatabase(name) {
    // Call C++ database engine API to create database
    const lib = require('./database');
    lib.create_database(name);
}
