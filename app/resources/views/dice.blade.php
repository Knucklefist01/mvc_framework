@include("header")

<main class="diceMain">
    <form action="diceProcessor" method="post">
        <p>Antal tärningar: </p>
        <div>
            <input type="radio" name="amount" id="oneDice" value="1" required>
            <label for="oneDice">1</label>
        </div>
        <div>
            <input type="radio" name="amount" id="twoDice" value="2" required>
            <label for="twoDice">2</label>
        </div>
        <input type="submit" name="throwSubmit" value="Kasta">
    </form>

    <form action="diceProcessor" method="post">
        <input type="submit" name="stopSubmit" value="Stanna">
    </form>

    <form action="diceProcessor" method="post">
        <input type="submit" name="resetSubmit" value="Nollställ">
    </form>

    <div class="scoreboard">
        <h1>POÄNG:</h1>
        <div class="scores">
            <div class="scoreColumn" id="playerScore">
                <h2>Spelare</h2>
                
                <?php foreach ($playerHistory as $throw) { ?>
                    <div class="graphicHand">
                    <?php foreach ($throw as $image) { ?>
                        <img src="../resources/img/<?=$image?>" alt="">
                    <?php } ?>
                    </div>
                <?php } ?>

                <div class="columnTotal">Total: <?= $playerSum ?></div>
            </div>
            <div class="scoreColumn" id="compScore">
                <h2>Dator</h2>

                <?php foreach ($compHistory as $throw) { ?>
                    <div class="graphicHand">
                    <?php foreach ($throw as $image) { ?>
                        <img src="img/<?=$image?>" alt="">
                    <?php } ?>
                    </div>
                <?php } ?>

                <div class="columnTotal">Total: <?= $compSum ?></div>
            </div>
        </div>
        <div class="gameResult">
            <h1 class="<?php if ($playerWon) {
                        echo 'playerWon';
                       } else {
                           echo 'compWon';
                       } ?>">
                <?= $endMessage ?>
            </h1>
            <?php if ($endMessage != "") { ?>
            <div class="postRoundOptions">
                <form action="diceProcessor" method="post">
                    <input type="submit" name="againSubmit" value="Spela Igen">
                </form>
            </div>
            <?php } ?>
        </div>
        <div>
            <h1>Tidigare rundor:</h1>
            <div class="previousResults">
                <div class="previousColumn">Spelare:</div>
                <div class="previousColumn">Datorn:</div>
                <div class="previousColumn">Vinnare:</div>
            </div>
            <?php foreach ($roundHistory as $value) { ?>
            <div class="previousResults">
                <div class="previousColumn"><?= $value["player"] ?></div>
                <div class="previousColumn"><?= $value["computer"] ?></div>
                <div class="previousColumn"><?php if ($value["playerWinner"]) {
                                                echo "Spelaren Vann";
                                            } else {
                                                echo "Datorn Vann";
                                            } ?></div>
            </div>
            <?php } ?>
        </div>
    </div>

</main>

@include("footer")
