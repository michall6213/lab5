<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$imie = trim($_POST["imie"] ?? "");
$email = trim($_POST["email"] ?? "");
$temat = trim($_POST["temat"] ?? "");
$wiadomosc = trim($_POST["wiadomosc"] ?? "");
$zgoda = $_POST["zgoda"] ?? "";

$bledy = [];

if ($imie === "") {
    $bledy[] = "Imię jest wymagane.";
}

if ($wiadomosc === "") {
    $bledy[] = "Wiadomość jest wymagana.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $bledy[] = "Adres e-mail jest niepoprawny.";
}

$dozwoloneTematy = ["Pytanie", "Problem", "Inne"];
if (!in_array($temat, $dozwoloneTematy, true)) {
    $bledy[] = "Wybrano niepoprawny temat.";
}

if ($zgoda !== "tak") {
    $bledy[] = "Musisz zaakceptować regulamin.";
}

function h($tekst) {
    return htmlspecialchars($tekst, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynik formularza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <?php if (count($bledy) > 0): ?>
            <h1>Nie udało się wysłać formularza</h1>
            <p>Popraw poniższe błędy:</p>
            <ul class="error">
                <?php foreach ($bledy as $blad): ?>
                    <li><?= h($blad) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h1>Dziękujemy za wiadomość!</h1>
            <p>Formularz został poprawnie wysłany.</p>

            <table>
                <tr>
                    <th>Imię</th>
                    <td><?= h($imie) ?></td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td><?= h($email) ?></td>
                </tr>
                <tr>
                    <th>Temat</th>
                    <td><?= h($temat) ?></td>
                </tr>
                <tr>
                    <th>Wiadomość</th>
                    <td><?= nl2br(h($wiadomosc)) ?></td>
                </tr>
            </table>
        <?php endif; ?>

        <p><a href="index.php">Wróć do formularza</a></p>
    </main>
</body>
</html>
