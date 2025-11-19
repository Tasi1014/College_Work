<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX CRUD Application</title>
    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #f3f4f6;
    padding: 20px;
}

.container {
    max-width: 900px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #4f46e5;
}

#alertBox {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    border-radius: 5px;
    color: #fff;
    display: none;
}

#alertBox.success { background: #22c55e; }
#alertBox.error { background: #ef4444; }

form {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
}

label {
    margin-bottom: 5px;
    display: block;
}

input[type="text"],
input[type="email"],
#search {
    width: 100%;
    padding: 10px;
    border: 1px solid black;
    border-radius: 5px;
    margin-bottom: 15px;
}

button {
    padding: 10px 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

button[type="submit"] { background: #4f46e5; color: #fff; }
button[type="reset"] { background: #6c757d; color: #fff; }

.table-container {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
}

th {
    background: #4f46e5;
    color: white;
    padding: 12px;
    text-align: left;
}

td {
    padding: 12px;
    border-bottom: 1px solid #eee;
}

tbody tr:hover {
    background: #f2f2f2;
}

td button {
    padding: 6px 12px;
    border-radius: 4px;
    color: #fff;
    font-size: 12px;
}

td button:first-child { background: #28a745; }
td button:last-child { background: #dc3545; }

    </style>
</head>
<body>
    <div class="container">
        <h1>AJAX CRUD Application</h1>
        <div class="hidden" id="alertBox"></div>
    <form action="" id="userForm">
        <input type="hidden" name="" id="userId"> 
        <label for="name">Name: </label>
        <input type="text" name="name" id="name"><br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email"><br><br>
        <button type="submit" id="saveBtn">Save</button>
        <button type="reset">Clear</button>
    </form>
    <input type="text" name="" id="search" placeholder="Search by name or email" style="display:none">
    <div id="userTable"></div>

    </div>

    <script src="script.js"></script>
</body>
</html>