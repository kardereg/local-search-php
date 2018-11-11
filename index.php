<!DOCTYPE html>

<html lang="en">
<head>
<title>List of available search databases</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">


var GoogleSearchUrl="http://google.com/search?q=";
var LocalSearchUrl="search.php?queryString=";
var SearchForm;

var searcher = function (event){
    if(load_key_code(event)==13){
        search_starter();
    }
}

function load_key_code(event){
    var IE8andEarlierKeyCode;
    var NewKeyCode;
    if(window.event){
        IE8andEarlierKeyCode = event.keyCode;
        return IE8andEarlierKeyCode;
    }else if(event.which){
        NewKeyCode=event.which;
        return NewKeyCode;
    }
}

function search_starter(){
    var QueryStringElement=document.getElementById("QueryString");
    SearchForm=document.getElementById("search_form");
    if(QueryStringElement.value)
        search_with_parameter(QueryStringElement.value);
    else
        search_without_parameter();
    return false;
}

function search_with_parameter(SearchParameter){
    if(SearchForm.local_search_radio.checked)
        open(LocalSearchUrl + SearchParameter);
    else if(SearchForm.google_search_radio.checked)
        open(GoogleSearchUrl + SearchParameter);
    else
        alert("Search database is not selected.");
}

function search_without_parameter(){
    if(SearchForm.local_search_radio.checked)
        alert("Nothing added in the search field.");
    else if(SearchForm.google_search_radio.checked)
        open(GoogleSearchUrl + SearchParameter);
    else
        alert("Search database is not selected.");
}

function search_with_button(){
    search_starter();
}

function search_with_link(database_name){
    SearchForm=document.getElementById("search_form");
    if(document.getElementById("QueryString").value)
        if(database_name=="google_search")
            open(GoogleSearchUrl + document.getElementById("QueryString").value);
        else if(database_name=="local_search")
            open(LocalSearchUrl + document.getElementById("QueryString").value);
        else
            alert("Search database is not selected.");
    else if(database_name=="google_search")
        open(GoogleSearchUrl);
    else
        alert("Search database is not selected.");
    return false;
}

</script>
</head>
<body>
<div id="content">
<h1>Local search databases</h1>
<h2>Databases currently available</h2>
<form id="search_form" name="my_search_form" onsubmit="return false;">
<input type="text" id="QueryString" size=44  onkeypress="searcher(event);">
<input type="button" value="Search" onclick="search_with_button();">
<table>
<thead>
<tr>
<th>Search in</th>
<th class="desc">Description</th>
<th>Last update</th>
</tr>
</thead>

<!--<tr hidden="hidden">-->
<tr>
    <td>
        <input type="radio" id="local_search_radio" name="search_chooser" value="no">
        <a href="" onclick="search_with_link('local_search');" >Local Search</a>
    </td>
    <td class="desc">Local Search</td>
    <td>
    
    <?php
    
    $read_date_cmd_out = shell_exec("sh scripts/local-search/getLastModifiedDateOfFile.sh ");
    print(" $read_date_cmd_out " );
    
    ?>
    
    </td>
</tr>
<tr>
    <td>
        <input type="radio" id="google_search_radio" name="search_chooser" value="no">
        <a href="" onclick="search_with_link('google_search');">Google Search</a>
    </td>
    <td class="desc">Direct redirection to Google Search.</td>
    <td>(No local cache.)</td>
</tr>

<tbody>
</tbody>
</table>
</form>
<h2>Contact information</h2>
<p>In case you notice a bug or you have improvement requests please turn to
Istvan Lazar.</p>
</div>
</body>
</html>


