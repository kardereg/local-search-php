<!DOCTYPE html>

<html lang="en">
<head>
<title>Search results</title>
<link rel="stylesheet" type="text/css" href="search.css" />
</head>
<body>
<div class="CSSTableGenerator" >
    <table >
        <tr>
            <td>
                Results
            </td>
        </tr>

<?php

$searchParameter = "";
if (isset($_GET['queryString'])) {
    $searchParameter = $_GET['queryString'];
} else {
    // Fallback behaviour goes here
}
if ($searchParameter == "") {
   print("<tr><td>" . "NO QUERY STRING HAS BEEN GIVEN!" . "</td></tr>");
} else {

  $search_cmd_out = shell_exec("sh scripts/local-search/local-search.sh " . $searchParameter);

  $separator = "\r\n";
  $line = strtok($search_cmd_out, $separator);

  while ($line !== false) {
    # do something with $line
    print("<tr><td>" . $line . "</td></tr>" );
    $line = strtok( $separator );
  }
}

?>

    </table>
</div>
</body>
</html>


