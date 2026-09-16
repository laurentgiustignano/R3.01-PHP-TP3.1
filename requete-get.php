<?php
header('Content-Type: application/json; charset=UTF-8');

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$nom = filter_input(INPUT_GET, 'nom', FILTER_UNSAFE_RAW, FILTER_NULL_ON_FAILURE);

if ($id !== false && $nom !== false) {
  http_response_code(200);
  echo json_encode([
      'status' => 'success',
      'data' => [
          'id' => $id,
          'nom' => $nom
      ]
  ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} else {
  http_response_code(400);
  echo json_encode([
      'status' => 'error',
      'message' => 'Paramètres "id" (entier) et "nom" (chaîne) sont requis.'
  ]);
}
