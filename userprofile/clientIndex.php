<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - FitFusion</title>
    <link rel="stylesheet" href="clientStyles.css">
</head>
<body>
    <!-- Header and Navigation -->
    <header>
       
    </header>

    <!-- Main Content -->
    <main>
        <!-- Profile Information Form -->
        <section class="profile-section">
            <h1>User Profile</h1>
            <form action="clientCreate.php" method="POST" onsubmit="return validateContact();">
                <div>
                    <label for="clientName">Name:</label>
                    <input type="text" name="clientName" required>
                </div>
                <div>
                    <label for="clientLocation">Location:</label>
                    <input type="text" name="clientLocation" required>
                </div>
                <div>
                    <label for="clientContactNum">Contact Number:</label>
                    <input type="text" name="clientContactNum" id="contact" required>
                </div>
                <div>
                    <label for="clientEmail">Email:</label>
                    <input type="email" name="clientEmail" required>
                </div>
                <div>
                    <label for="fitnessGoals">Fitness Goals:</label>
                    <textarea name="fitnessGoals" required></textarea>
                </div>
                <button type="submit">Create Profile</button>
            </form>
        </section>

        <!-- Display User Profiles -->
        <section class="profiles-section">
            <h2>Existing Profiles</h2>
            <?php
            require 'clientConfig.php';
            $sql = "SELECT * FROM client";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Name</th><th>Location</th><th>Contact</th><th>Email</th><th>Goals</th><th>Actions</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['clientName'] . "</td>";
                    echo "<td>" . $row['clientLocation'] . "</td>";
                    echo "<td>" . $row['clientContactNum'] . "</td>";
                    echo "<td>" . $row['clientEmail'] . "</td>";
                    echo "<td>" . $row['fitnessGoals'] . "</td>";
                    echo "<td>
                            <a href='clientUpdate.php?id=" . $row['clientID'] . "'>Edit</a> |
                            <a href='clientDelete.php?id=" . $row['clientID'] . "'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No profiles found.";
            }
            ?>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <!-- Footer content -->
    </footer>

    <script src="clientScript.js"></script>
</body>
</html>
