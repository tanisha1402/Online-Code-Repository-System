<?php
if (isset($_POST['sqlQuery'])) {
    $sql = $_POST['sqlQuery'];
  $setup = <<<EOD
SET LINESIZE 1000
SET PAGESIZE 1000
SET TRIMSPOOL ON
SET COLSEP '|'
SET WRAP OFF
COLUMN CREATED_AT FORMAT A20
COLUMN USERNAME FORMAT A20
COLUMN EMAIL FORMAT A30
COLUMN PASSWORD FORMAT A20
COLUMN VERSION_NAME FORMAT A20
COLUMN COMMIT_MESSAGE FORMAT A30
COLUMN DOWNLOADED_AT FORMAT A25
COLUMN ADDED_ON FORMAT A20
COLUMN UPLOADED_AT FORMAT A20
EOD;

file_put_contents("query.sql", $setup . "\n" . $sql . "\nEXIT;");


    // Run SQL*Plus
    $command = 'sqlplus -S system/sys@XE @query.sql > output.txt';
    shell_exec($command);

    $lines = file("output.txt");
    $tableHTML = "<table border='1' cellspacing='0' cellpadding='8' style='border-collapse:collapse; font-family:Arial;'>\n";

    $printedHeader = false;
    $hasPipe = false;

    foreach ($lines as $line) {
    $line = trim($line);
    if (
        $line === "" ||
        strpos($line, "SQL>") === 0 ||
        strpos($line, "Connected to:") === 0 ||
        preg_match('/^-+$/', trim(str_replace('|', '', $line))) // removes "--------" lines
    ) continue;

        if (strpos($line, '|') !== false) {
            $hasPipe = true;
            $cols = explode('|', $line);

            $tableHTML .= "<tr>";
            foreach ($cols as $col) {
                $col = trim($col);
                if (!$printedHeader) {
                    $tableHTML .= "<th>" . htmlspecialchars($col) . "</th>";
                } else {
                    $tableHTML .= "<td>" . htmlspecialchars($col) . "</td>";
                }
            }
            $tableHTML .= "</tr>\n";

            if (!$printedHeader) $printedHeader = true;
        }
    }

    // 🔸 If no table rows were parsed, show general output (for INSERT/UPDATE/DELETE)
    if (!$hasPipe) {
        foreach ($lines as $line) {
    $line = trim($line);
    if (
        $line === "" ||
        strpos($line, "SQL>") === 0 ||
        strpos($line, "Connected to:") === 0 ||
        preg_match('/^-+$/', trim(str_replace('|', '', $line))) // removes "--------" lines
    ) continue;

            $tableHTML .= "<tr><td colspan='5' style='font-family:monospace; color:green; text-align:center; background:transparent; border:none;'>" . htmlspecialchars($line) . "</td></tr>\n";
     }
    }

    $tableHTML .= "</table>";

    file_put_contents("table.html", $tableHTML);
    header("Location: result.php");
}
?>