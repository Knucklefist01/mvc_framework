@include("header")

<main class="booksMain">
    <?php if (count($books) > 0) {
        foreach ($books as $book) { ?>
            <div class="book">
                <div class="image">
                    <img src="<?=$book->image?>" alt="<?=$book->title?>">
                </div>
                <div class="title"><?=$book->title?></div>
                <div class="author"><?=$book->author?></div>
                <div class="author"><?=$book->isbn?></div>
            </div>
        <?php }
    } else {
        echo "Det finns inga böcker!";
    } ?>
</main>

@include("footer")
