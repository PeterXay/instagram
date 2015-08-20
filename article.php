<html>
<head>

    <style type='text/css'>

        #years, #months, #posts{
            cursor:pointer;
        }

        .archive_month {
            margin-left: 1em;
            font-size: large;
            font-weight: bold;
            cursor: pointer;
        }
        .archive_posts {
            margin-left: 1em;
            margin-top: 0;
            margin-bottom: 1em;
            list-style: square url('http://www.webbossuk.com/admin/images/reply-arrow.png');
            font-weight: normal;
            cursor: pointer;
        }


    </style>


    <body>

    <?php
    require('db.php');

    $sql = "SELECT id, name, message, date FROM Article WHERE parent = '0' ORDER BY date ASC";

    $result = mysqli_query($connect, $sql);

    echo "<ul class='archive_month'>";

    while ($row = mysqli_fetch_row($result)) {
        $id = $row[0];
        $name = $row[1];
        $message = $row[2];

        echo "<li class='months'>$name";
        echo "<ul class='archive_posts'>";

        $sql2 = "SELECT id, name, message, date FROM Article WHERE parent = '$id' ORDER BY date ASC";
        $result2 = mysqli_query($connect, $sql2);

        while ($row2 = mysqli_fetch_row($result2)) {
            $post = $row2[1];
            $postmessage = $row2[2];
            echo "<li class='post'>$post</li>";
            echo "<div align='center'>$post<br>$postmessage</div>";
        }
        echo "</ul></li>";
    }
    echo "</ul>";
?>

    <select name="ddlTestSelect" id="ddlTestSelect">
        <option selected="selected" value="0">default</option>
        <option>option 2</option>
        <option>option 3</option>
        <option>option 4</option>
    </select>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

    $('.archive_month ul').hide();

    $('.months').click(function() {
        $(this).find('ul').slideToggle();
    });
    
</script>

</head>
</html>