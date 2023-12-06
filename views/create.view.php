<?php
$head = "
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

form {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 8px;
}

input, textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 12px;
  box-sizing: border-box;
}

button {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}
</style>
";
include("header.php"); ?>
<form action="/events/create" method="post">
	<h2>Adauaga eveniment</h2>

	<label for="title">Titlu:</label>
	<input type="text" id="title" name="title" required>

	<label for="description">Descriptie:</label>
	<textarea id="description" name="description" required></textarea>

	<label for="location">Locatie:</label>
	<input type="text" id="location" name="location" required>

	<label for="date">Data:</label>
	<input type="datetime-local" id="date" name="date" required>

	<button type="submit">Add Event</button>
</form>
<?php include("footer.php"); ?>