@include("header")

<main class="scoresMain">
<h2>Max Poäng: 280</h2>
    <table class="scoresTable">
        <tr>
            <th>Poäng</th><th>% av Max</th>
        </tr>
        <?php foreach ($scores as $score) { ?>
        <tr>
            <td><?= $score->points ?></td><td><?= round(($score->points) * 100 / 280, 2) . "%" ?></td>
        </tr>
        <?php } ?>
    </table>
</main>

@include("footer")
