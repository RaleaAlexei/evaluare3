<?php
$head = "
<style>
body {
  font-family: Arial, sans-serif;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

button {
  margin-right: 10px;
}
.options>button{
	background-color: #007bff;
	color: #fff;
	padding: 10px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}
</style>
";
include("header.php"); ?>
<h1>Evenimente</h1>

<div class="options">
	<button onclick="redirectToForm()" style="background-color:green">Adauga</button>
	<button onclick="filterByDay()">Urmatoarea Zi</button>
	<button onclick="filterByWeek()">Urmatoarea Saptamana</button>
	<button onclick="filterByMonth()">Urmatoarea Luna</button>
	<button onclick="showAll()">Arata-le pe toate</button>
</div>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Titlu</th>
			<th>Descriptie</th>
			<th>Locatie</th>
			<th>Data</th>
			<th>Creat</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($events as $event): ?>
			<tr>
				<td>
					<?= $event['id'] ?>
				</td>
				<td>
					<?= $event['title'] ?>
				</td>
				<td>
					<?= $event['description'] ?>
				</td>
				<td>
					<?= $event['location'] ?>
				</td>
				<td>
					<?= $event['date'] ?>
				</td>
				<td>
					<?= $event['created_at'] ?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script>
	const redirectToForm = () => window.location.href = '/';
	const filterByDay = () => filterEvents(1);
	const filterByWeek = () => filterEvents(7);
	const filterByMonth = () => filterEvents(30);
	const showAll = () => {
		const rows = document.querySelectorAll("tbody tr");
		rows.forEach((row) => {
			row.style.display = "";
		});
	}

	const filterEvents = (days) => {
		const currentDate = new Date();
		currentDate.setDate(currentDate.getDate() + days);

		const rows = document.querySelectorAll("tbody tr");
		rows.forEach((row) => {
			const eventDate = new Date(row.querySelector("td:nth-child(5)").innerText);
			row.style.display = eventDate < currentDate ? "none" : "";
		});
	}
</script>
<?php include("footer.php"); ?>