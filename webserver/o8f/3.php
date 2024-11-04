Skapa en php-fil som skriver ut “Hej och välkommen! Idag är det onsdagen den 6 juni, 2012.”, där den kursiva texten ska vara dagens aktuella värden.

<p> hej och välkommen! Dagens datum är <?php echo date("l");?> den <?php echo date("d :F: Y") ?> </p>