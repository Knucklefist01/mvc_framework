@include("header")

<main class="diceMain">
    <form action="yatzyProcessor" method="post">
        <input type="submit" name="resetSubmit" value="Nollställ">
    </form>
    <div class="yatzyGame">
        <div class="gameArea">
            <div class="area">
            <?php foreach ($hand as $value) { ?>
                <img src="../resources/img/dice<?=$value?>.png" class="" alt="dice">
            <?php } ?>
            </div>
            <div class="buttons">
                <form action="yatzyProcessor" method="post">
                    
                <?php for ($x = 0; $x <= 4; $x++) { ?>
                    <?php if ($throws > 0) { ?>
                    <input type="checkbox" name="cube<?=$x?>" id="cube<?=$x?>" class="diceCheck" <?php if (in_array($x, $lastKept)) {
                        echo "checked";
                                                     } ?>>
                    <?php } else { ?>
                    <input type="checkbox" name="cube<?=$x?>" id="cube<?=$x?>" class="diceCheck" style="display: none">
                    <?php } ?>
                <?php } ?>

                <?php if ($throws < 3) { ?>
                    <input type="submit" value="Kasta" name="throwSubmit" id="throwSubmit">
                <?php } ?>
                    
                </form>

                <?php if ($throws > 0 && $throws < 3) { ?>
                <h2>Välj dem du vill behålla eller fyll i en poäng</h2>
                <?php } else if ($throws >= 3) { ?>
                <h2>Fyll i en poäng i tabellen till höger</h2>
                <?php } ?>
                <h2><?= (3 - $throws) ?> Kast kvar</h2>
            </div>
        </div>
        <div class="scoreTable">
            <table>
            <?php foreach ($scoreCategories as $cat) { ?>
                <tr>
                    <td><?= $cat ?></td>

                    <?php if (isset($scoreLocked[$cat])) { ?>
                    <td><?= $scoreLocked[$cat] ?></td>

                    <?php } else if (isset($scoreOptions[$cat])) { ?>
                    <td class="availableOption">
                        <form action="yatzyProcessor" method="post">
                            <input type="hidden" name="category" value="<?= $cat ?>">
                            <input type="hidden" name="points" value="<?= $scoreOptions[$cat] ?>">
                            <input type="submit" name="pointsSubmit" value="<?= $scoreOptions[$cat] ?>">
                        </form>
                    </td>

                    <?php } else { ?>
                    <td></td>
                    <?php } ?>
                </tr>

            <?php } ?>

                <tr>
                    <td>TOTAL</td>
                    <td><?= $scoreTotal ?></td>
                </tr>
            </table>
        </div>
    </div>
</main>

