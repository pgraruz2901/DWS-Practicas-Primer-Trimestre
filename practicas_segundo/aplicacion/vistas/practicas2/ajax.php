<?php
$this->textoHead = CHTML::scriptFichero("/js/main.js", ["defer" => "defer"]);
echo CHTML::iniciarForm(metodo: "GET");
echo CHTML::campoLabel(
    "Introduce el campo Min: ",
    "min"
);
echo CHTML::campoText("min");
echo CHTML::dibujaEtiqueta("br");
echo CHTML::dibujaEtiqueta("br");
echo CHTML::campoLabel("Introduce el campo Max: ", "max");
echo CHTML::campoText("max");
echo CHTML::dibujaEtiqueta("br");
echo CHTML::dibujaEtiqueta("br");
echo CHTML::campoLabel("Introduce el patron: ", "patron");
echo CHTML::campoText("patron");
echo CHTML::dibujaEtiqueta("br");
echo CHTML::dibujaEtiqueta("br");
echo CHTML::botonHtml("Pedir", ["type" => "submit", "id" => "id_bot"]);
echo CHTML::dibujaEtiqueta("br");
echo CHTML::dibujaEtiqueta("div", ["name" => "resultados"]);
echo CHTML::dibujaEtiquetaCierre("div");
echo CHTML::finalizarForm();
