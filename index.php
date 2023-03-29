<?php

require_once 'Node.php';
require_once 'Graph.php';
require_once 'Queue.php';

function search(array $nodes, $startNode, $endNode)
{
  $graph = new Graph();
  $queue = new Queue();
  
  //Наполняем граф
  foreach ($nodes as $key => $node) {
    $node_obj = new Node($key);
    $node_obj->setConnections($node);
    $graph->addNode($node_obj);
  }

  //Устававливаем очередь
  $queue->setQueue($graph->getNode($startNode)->getConnections());

  //Ищем связи
  while ($queue->isNotEmpty()) {
    $node = $graph->getNode($queue->popQueue());

    if (!$node->isVisited()) {
      if ($node->getId() == $endNode) {
        echo 'Целевая точка найдена';
        die();
      } else {
        $queue->addQueue($node->getConnections());
        $node->markVisited();
      }

    }
  }

  echo 'Целевая точка не найдена';
}

$graph = [
  'A' => ['B', 'C', 'D'],
  'B' => ['G', 'H'],
  'C' => ['G'],
  'D' => ['E', 'F'],
  'E' => [],
  'F' => [],
  'G' => [],
  'H' => [],
];

$startNode = 'A';
$endNode = 'C';

search($graph, $startNode, $endNode);