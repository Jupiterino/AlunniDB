<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AlunniController{

  public function index(Request $request, Response $response, $args){

  
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM alunni");
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }

  public function index1(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM alunni");
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }

  function show(Request $request, Response $response, $args) {
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM alunni WHERE id = " .$args["id"]);
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  
 }

 function update(Request $request, Response $response, $args){
  
  $body = $request->getBody()->getContents();
  $parsedBody = json_decode($body, true);
  $nomee = $parsedBody['nome'];
  $cognomee = $parsedBody['cognome'];
  $idd = $parsedBody['id'];

  $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
  $result = $mysqli_connection->query("UPDATE alunni SET nome = $nomee, cognome = $cognomee WHERE id_alunno = $idd; ");

  return $response->withHeader('Content-Type' , 'application/json')->withStatus(201);

}


 function create(Request $request, Response $response, $args){

  $body = $request->getBody()->getContents();
  $parsedBody = json_decode($body, true);
  $nomee = $parsedBody['nome'];
  $cognomee = $parsedBody['cognome'];

  $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
  $query = "INSERT INTO alunni (nome, cognome) VALUES ('$nomee', '$cognomee')";
  //var_dump($query);
  //exit;
  $result = $mysqli_connection->query($query);

  return $response->withHeader('Content-Type' , 'application/json')->withStatus(201);

}
function delete(Request $request, Response $response, $args){
  $body = $request->getBody()->getContents();
  $parsedBody = json_decode($body, true);
  $Classe = new Classe;

  $alunno = $Classe->search($args["nome"]);
  
  $nome = $parsedBody['nome'];
  $cognome = $parsedBody['cognome'];
  $eta = $parsedBody['eta'];

  $response->$getBody()->write($parsedBody('alunno'));
  return $response->withHeader('Content-Type' , 'application/json')->withStatus(201);

}
}
