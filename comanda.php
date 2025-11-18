<?php
include 'db_connect.php';

$message = '';
$message_type = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = trim($_POST['nume']);
    $prenume = trim($_POST['prenume']);
    $telefon = trim($_POST['telefon']);
    $email = trim($_POST['email']);
    $produs = trim($_POST['produs']);
    $cantitate = trim($_POST['cantitate']);
    
    $errors = [];
    
    if (empty($nume)) {
        $errors[] = "Completați câmpul Nume!";
    }
    
    if (empty($prenume)) {
        $errors[] = "Completați câmpul Prenume!";
    }
    
    if (empty($telefon)) {
        $errors[] = "Completați câmpul Număr de contact!";
    } elseif (!preg_match('/^[0-9+\-\s()]{9,}$/', $telefon)) {
        $errors[] = "Introduceți un număr de telefon valid (minim 9 cifre)";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Completați câmpul Email cu o adresă validă!";
    }
    
    if (empty($produs)) {
        $errors[] = "Completați câmpul Produs!";
    }
    
    if (empty($cantitate) || !is_numeric($cantitate) || $cantitate <= 0 || $cantitate > 1000) {
        $errors[] = "Cantitatea trebuie să fie un număr între 1 și 1000!";
    }
    
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO comenzi (nume, prenume, telefon, email, produs, cantitate) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $nume, $prenume, $telefon, $email, $produs, $cantitate);
        
        if ($stmt->execute()) {
            $message = "✅ Comanda a fost înregistrată cu succes!";
            $message_type = "success";
            
            $_POST = array();
        } else {
            $message = "Eroare la înregistrarea comenzii: " . $conn->error;
            $message_type = "error";
        }
        
        $stmt->close();
    } else {
        $message = "❌ " . implode("<br>❌ ", $errors);
        $message_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plaseaza Comanda - Magazin Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Plasează o Comandă Nouă</h1>
            <p>Completează formularul de mai jos pentru a plasa comanda</p>
        </div>
        
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?php echo $message_type === 'success' ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <div class="form-container">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="nume">Nume:</label>
                    <input type="text" id="nume" name="nume" value="<?php echo isset($_POST['nume']) ? htmlspecialchars($_POST['nume']) : ''; ?>" required maxlength="50">
                </div>
                
                <div class="form-group">
                    <label for="prenume">Prenume:</label>
                    <input type="text" id="prenume" name="prenume" value="<?php echo isset($_POST['prenume']) ? htmlspecialchars($_POST['prenume']) : ''; ?>" required maxlength="50">
                </div>
                
                <div class="form-group">
                    <label for="telefon">Număr de contact:</label>
                    <input type="tel" id="telefon" name="telefon" value="<?php echo isset($_POST['telefon']) ? htmlspecialchars($_POST['telefon']) : ''; ?>" required pattern="[0-9]{9,}"  title="Introduceți un număr de telefon valid (minim 9 cifre)">
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required maxlength="100">
                </div>
                
                <div class="form-group">
                    <label for="produs">Produs:</label>
                    <input type="text" id="produs" name="produs" value="<?php echo isset($_POST['produs']) ? htmlspecialchars($_POST['produs']) : ''; ?>" required maxlength="100" placeholder="Ex: Laptop, Mouse, Tastatură...">
                </div>
                
                <div class="form-group">
                    <label for="cantitate">Cantitate:</label>
                    <input type="number" id="cantitate" name="cantitate" min="1" max="1000" value="<?php echo isset($_POST['cantitate']) ? htmlspecialchars($_POST['cantitate']) : ''; ?>" required>
                </div>
                
                <button type="submit" class="btn">Trimite Comanda</button>
            </form>
        </div>
        
        <a href="index.php" class="back-link">← Inapoi la pagina principala</a>
    </div>
</body>
</html>