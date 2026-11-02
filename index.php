<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz kontaktowy</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <main class="container">
        <h1>Formularz kontaktowy</h1>

        <form id="contactForm" action="odbierz.php" method="post">
            <div class="form-group">
                <label for="imie">Imię:</label>
                <input type="text" id="imie" name="imie" required>
                <small class="error" id="imieError"></small>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email"
                       placeholder="np. anna@example.com" required>
                <small class="error" id="emailError"></small>
            </div>

            <div class="form-group">
                <label for="temat">Temat wiadomości:</label>
                <select id="temat" name="temat">
                    <option value="Pytanie">Pytanie</option>
                    <option value="Problem">Problem</option>
                    <option value="Inne">Inne</option>
                </select>
            </div>

            <div class="form-group">
                <label for="wiadomosc">Wiadomość:</label>
                <textarea id="wiadomosc" name="wiadomosc" rows="3"
                          maxlength="200" required></textarea>
                <small id="licznik">Pozostało 200 znaków.</small>
                <small class="error" id="wiadomoscError"></small>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="zgoda" name="zgoda" value="tak" required>
                <label for="zgoda">Akceptuję regulamin</label>
                <small class="error" id="zgodaError"></small>
            </div>

            <div class="buttons">
                <button type="button" id="testName">Sprawdź imię</button>
                <button type="submit">Wyślij</button>
                <button type="reset" class="secondary">Wyczyść formularz</button>
            </div>

            <p id="powitanie" aria-live="polite"></p>
            <div id="formErrors" class="error" aria-live="polite"></div>
        </form>
    </main>
</body>
</html>
