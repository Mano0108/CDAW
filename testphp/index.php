<!DOCTYPE html>
<html>

<head>
    <title>Basic Web Page</title>
</head>

<body>
    <h1>YOL0</h1>
    <A HREF="test.php">Test PHP</A>
    <?php
    require 'classes/poker.class.php';

    $round = new Poker(['4S,2H,6S,2D,JH', '2S,4H,6C,4D,JD']);

    $text = implode( $round->getCallme());
    echo "TEST AFFICHAGE";
    echo "$text"

    ?>
    <h2> TEST HTML part 2 </h2>
    <?php
    echo "TEST PHP 2";
    ?>
</body>

</html>