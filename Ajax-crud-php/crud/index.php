<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP AJAX CRUD</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h2>CRUD with PHP, jQuery, AJAX, MySQLi</h2>

<form id="userForm">
    <input type="hidden" name="id" id="id">
    Name: <input type="text" name="name" id="name" required><br><br>
    Email: <input type="email" name="email" id="email" required><br><br>
    <button type="submit">Save</button>
</form>

<div id="message"></div>
<hr>
<h3>User List</h3>
<table border="1" width="100%">
    <thead>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
    </thead>
    <tbody id="userTable"></tbody>
</table>

<script>
$(document).ready(function(){
    fetchData();

    function fetchData() {
        $.ajax({
            url: '../ajax/fetch.php',
            method: 'GET',
            success: function(data) {
                $('#userTable').html(data);
            }
        });
    }

    $('#userForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $('#id').val() ? '../ajax/update.php' : '../ajax/insert.php',
            method: 'POST',
            data: $('#userForm').serialize(),
            success: function(res) {
                $('#message').html(res);
                $('#userForm')[0].reset();
                $('#id').val('');
                fetchData();
            }
        });
    });

    $(document).on('click', '.edit', function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        $('#id').val(id);
        $('#name').val(name);
        $('#email').val(email);
    });

    $(document).on('click', '.delete', function(){
        var id = $(this).data('id');
        if (confirm("Delete this record?")) {
            $.ajax({
                url: '../ajax/delete.php',
                method: 'POST',
                data: { id: id },
                success: function(res) {
                    $('#message').html(res);
                    fetchData();
                }
            });
        }
    });
});
</script>
</body>
</html>
