    <!-- Séparation de section -->
    <div class="hr my-3">
        <hr>
    </div>

    <!-- FOOTER -->
    <footer>
        </div>

    </footer>
    <!-- FOOTER end -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6da33af46d.js" crossorigin="anonymous"></script>
    <?php if ($liveSearch ??false) {?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="/public/assets/js/searchAjax.js"></script>
        <?php } ?> 
            <?php if ($jsToCall ?? false) { ?>
            <script src="/public/assets/js/$jsToCall.js"></script>
            <?php } ?> <!-- Si '$jsToCall' existe et qu'il n'est pas vide, je link le js initialisé dans le controller correspondant à la page en cours -->

    </body>

    </html>