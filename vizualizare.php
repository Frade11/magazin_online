<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vizualizare Comenzi - Magazin Online</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/pcWorld-logo.png">

</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Vizualizare Comenzi</h1>
            <p>Toate comenzile înregistrate în sistem</p>
        </div>
        
        <div class="button-container">
            <a href="comanda.php" class="btn">Plasează Comanda</a>
        </div>
        
        <div class="table-container">
            <?php
            $sql = "SELECT * FROM comenzi ORDER BY data_comenzii DESC";
            $result = $conn->query($sql);
            
            if ($result && $result->num_rows > 0) {
                echo '<table class="orders-table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nume</th>';
                echo '<th>Prenume</th>';
                echo '<th>Telefon</th>';
                echo '<th>Email</th>';
                echo '<th>Produs</th>';
                echo '<th>Cantitate</th>';
                echo '<th>Data Comenzii</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                
                while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><strong>' . htmlspecialchars($row['id']) . '</strong></td>';
                    echo '<td>' . htmlspecialchars($row['nume']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['prenume']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['telefon']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                    echo '<td><strong>' . htmlspecialchars($row['produs']) . '</strong></td>';
                    echo '<td><span style="background: #667eea; color: white; padding: 5px 10px; border-radius: 15px; font-weight: bold;">' . htmlspecialchars($row['cantitate']) . '</span></td>';
                    echo '<td>' . date('d.m.Y H:i', strtotime($row['data_comenzii'])) . '</td>';
                    echo '</tr>';
                }
                
                echo '</tbody>';
                echo '</table>';
                
                $count_sql = "SELECT COUNT(*) as total FROM comenzi";
                $count_result = $conn->query($count_sql);
                $total_orders = $count_result->fetch_assoc()['total'];
                
                echo '<div style="margin-top: 20px; padding: 15px;   background-color: rgba(255, 255, 255, 0.05); border-radius: 10px; text-align: center;">';
                echo '<strong>Total comenzi: ' . $total_orders . '</strong>';
                echo '</div>';
                
            } else {
                echo '<div class="empty-state">';
                echo '<h3>📭 Nu există comenzi înregistrate</h3>';
                echo '<p>Momentul nu există nicio comandă în sistem.</p>';
                echo '<p>Fii primul care plasează o comandă!</p>';
                echo '</div>';
            }
            ?>
        </div>
        
        <div class="logo-container">
            <img src="images/pcWorld-logo.png" alt="Logo Magazin" class="logo" >
        </div>
        
        <a href="index.php" class="back-link">← Inapoi la pagina principala</a>
    </div>
</body>
</html>

<?php 
if (isset($conn)) {
    $conn->close(); 
}
?>