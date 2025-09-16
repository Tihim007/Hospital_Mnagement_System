<?php 
    session_start();
    $patients = $_SESSION['patients'];
?>

<html>
<head>
    <title>Patient List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        #searchInput {
            width: 300px;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: white;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        tr.hide {
            display: none;
        }
    </style>
</head>

<body>
    <h2>Patient List</h2>

    <!-- Search Field -->
    <input type="text" id="searchInput" placeholder="Search by patient name...">

    <table id="patientTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($patients as $patient): ?>
            <tr>
                <td><?php echo $patient['id']; ?></td>
                <td><?php echo $patient['name']; ?></td>
                <td><a href="../controller/getPatientController.php?id=<?php echo $patient['id']; ?>">View Details</a></td>
                <td><a href="../controller/editPatientController.php?id=<?php echo $patient['id']; ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        // Search by Name
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#patientTable tr");

            rows.forEach((row, index) => {
                if (index === 0) return; // skip header row
                let nameCell = row.cells[1]; // second column (Name)
                if (nameCell) {
                    let nameText = nameCell.textContent.toLowerCase();
                    if (nameText.includes(filter)) {
                        row.classList.remove("hide");
                    } else {
                        row.classList.add("hide");
                    }
                }
            });
        });
    </script>

</body>
</html>
