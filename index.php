<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectTitle = strip_tags($_POST['projectTitle']);
    $description = strip_tags($_POST['description']);
    $installationInstructions = strip_tags($_POST['installationInstructions']);
    $usage = strip_tags($_POST['usage']);
    $contributing = strip_tags($_POST['contributing']);
    $license = strip_tags($_POST['license']);
    $contactInfo = strip_tags($_POST['contactInfo']);

    $readmeContent = "# " . $projectTitle . "\n\n";

    if (!empty($description)) {
        $readmeContent .= "## Description\n" . $description . "\n\n";
    }
    if (!empty($installationInstructions)) {
        $readmeContent .= "## Installation\n```\n" . $installationInstructions . "\n```\n\n";
    }
    if (!empty($usage)) {
        $readmeContent .= "## Utilisation\n" . $usage . "\n\n";
    }
    if (!empty($contributing)) {
        $readmeContent .= "## Contributions\n" . $contributing . "\n\n";
    }
    if (!empty($license)) {
        $readmeContent .= "## licence\n" . $license . "\n\n";
    }
    if (!empty($contactInfo)) {
        $readmeContent .= "## Contact\n" . $contactInfo . "\n";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de README - Beta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        textarea {
            resize: vertical;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <textarea rows="20" cols="70"><?php echo htmlspecialchars($readmeContent); ?></textarea>
    <?php else: ?>
        <form method="post">
            Titre du projet : <input type="text" name="projectTitle"><br>
            Description : <textarea name="description"></textarea><br>
            Instructions d'Installation : <textarea name="installationInstructions"></textarea><br>
            Usage : <textarea name="usage"></textarea><br>
            Contributions : <textarea name="contributing"></textarea><br>
            Licence : <input type="text" name="license"><br>
            Informations de Contact : <textarea name="contactInfo"></textarea><br>
            <input type="submit" value="Générer le README">
        </form>
    <?php endif; ?>
</div>
</body>
</html>
