<?php


echo "Mostrar la fecha actual en el formato “d/m/Y”<br>";
echo (new DateTime())->format('d/m/Y') . "<br><br>";
echo "Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”<br>";
echo (new DateTime())->format('d F Y, l') . "<br><br>";
echo "Mostrar la hora actual en el formato “hh:mm:ss<br>";
echo (new DateTime())->format('H:i:s') . "<br><br>";
echo "Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45<br>";
echo (new DateTime('2024-03-29 12:45'))->format('d/m/Y') . "<br>";
echo (new DateTime('2024-03-29 12:45'))->format('H:i:s') . "<br>";
echo (new DateTime('2024-03-29 12:45'))->format('d F Y, l') . "<br>";
echo "<br>";
echo "Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas<br>";
echo (new DateTime())->modify('-12 days -4 hours')->format('d/m/Y') . "<br>";
echo (new DateTime())->modify('-12 days -4 hours')->format('H:i:s') . "<br>";
echo (new DateTime())->modify('-12 days -4 hours')->format('d F Y, l') . "<br>";
