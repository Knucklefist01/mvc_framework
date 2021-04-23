@include("header")

<main class="homeMain">
    <div>
        <div>
            <form action="" method="post">
                <input type="hidden" name="throw" value="single">
                <input type="submit" value="Kasta en tärning">
            </form>
            <?= $singleThrow ?>
        </div>
        <div>
            <form action="" method="post">
                <input type="hidden" name="throw" value="hand">
                <input type="submit" value="Kasta 3 tärningar">
            </form>
            <?php
            foreach ($handThrow as $throw) {
                echo $throw . "<br>";
            }
            ?>
        </div>
    </div>
</main>

@include("footer")
