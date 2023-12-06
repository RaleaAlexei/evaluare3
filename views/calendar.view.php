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
</style>
";
include("header.php"); ?>
<h1>Your Database Interface</h1>

<div>
	<button onclick="filterByDay()">Next Day</button>
	<button onclick="filterByWeek()">Next Week</button>
	<button onclick="filterByMonth()">Next Month</button>
	<button onclick="showAll()">Show All</button>
</div>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Location</th>
			<th>Date</th>
			<th>Created At</th>
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