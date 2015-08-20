<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("p").toggle();
            });
        });
    </script>
</head>
<body>

<button>Toggle</button>

<p>This is a paragraph with little content.</p>
<p>This is another small paragraph.</p>

<ul class="archive_month">
    <li class="months">September
        <ul class="archive_posts">
            <li class="posts">Article 1</li>
            <li class="posts">Article 2</li>
            <li class="posts">Article 3</li>
            <li class="posts">Article 4</li>
        </ul>
    </li>
    <li class="months">August
        <ul class="archive_posts">
            <li class="posts">Article 1</li>
        </ul>
    </li>
</ul>
<ul class="archive_month">
    <li class="months">July
        <ul class="archive_posts">
            <li class="posts">Article 1</li>
        </ul>
    </li>
</ul>

<ul class="archive_month">
    <li class="months">January
        <ul class="archive_posts">
            <li class="posts">Article 1</li>
        </ul>
    </li>
</ul>

<script>
    $('.archive_month ul').hide();

    $('.months').click(function() {
        $(this).find('ul').slideToggle();
    });

</script>

</body>
</html>

