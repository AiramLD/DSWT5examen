<?php

include_once("preguntas.php");

function getQuestionsToday() {
  global $dailyQuestions;
  $currentDate = date('d-m-Y');

  // Si no hay preguntas hoy devuelve un array con 0 elementos
  if (!array_key_exists($currentDate, $dailyQuestions)) {
    return [];
  }

  $data = $dailyQuestions[$currentDate];
  $preguntas = $data["preguntas"];

  foreach ($preguntas as &$pregunta) {
    unset($pregunta["respuesta_correcta"]);
  }

  unset($pregunta);

  // Devuelve fecha, tema, preguntas sin la opcion correcta
  return [
    "fecha" => $currentDate, 
    "tema" => $data["tema"], 
    "preguntas" => $preguntas
  ];
}

//comprueba la respuesta
function checkAnswer($preguntaIndex) {
  if($preguntaIndex == 0){
    exit();
  }

}