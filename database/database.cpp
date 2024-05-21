#include <iostream>
#include <fstream>
#include <string>
#include <vector>

struct User {
    std::string name;
    int age;
};

std:: vector < User > fetchUsers() {
    // Retrieve users from database
    std:: vector < User > users;
    users.push_back({ "John", 30 });
    return users;
}

void createUser(const User& user) {
    // Create user in database
    std:: cout << "User created successfully" << std:: endl;
}

void createDatabase(const std:: string& name) {
    // Create a new database file with the given name
    std::ofstream file(name + ".db");
    if (!file) {
        throw std:: runtime_error("Failed to create database file");
    }
    file.close();
}

extern "C" {
    std:: vector < User > fetch_users() {
        return fetchUsers();
    }

    void create_user(const User& user) {
        createUser(user);
    }

    void create_database(const std:: string& name) {
        createDatabase(name);
    }
}
