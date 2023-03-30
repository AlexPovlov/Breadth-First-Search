<?php

require_once 'Node.php';
require_once 'Graph.php';
require_once 'Queue.php';

function search(array $nodes, $startNode, $endNode)
{
  $graph = new Graph();
  $queue = new Queue();

  $visited = [$startNode => false];
  //Наполняем граф
  foreach ($nodes as $key => $node) {
    $node_obj = new Node($key);
    $node_obj->setConnections($node);
    $graph->addNode($node_obj);
  }

  //Устававливаем очередь
  $queue->setQueue([$startNode]);

  //Ищем связи
  while ($queue->isNotEmpty()) {
    $node = $graph->getNode($queue->popQueue());

    if ($node->getId() == $endNode) {
      break;
    } else {
      if (!in_array($node->getId(), $visited)) {
        foreach ($node->getConnections() as $key => $next_node) {
          $next_node = $graph->getNode($next_node);
          $queue->addQueue($next_node->getId());
          $visited[$next_node->getId()] = $node->getId();
        }
      }
    }
  }

  return $visited;
}

$graph = [
  'A' => ['B', 'C', 'D'],
  'B' => ['G', 'H', 'D'],
  'C' => ['G'],
  'D' => ['E', 'F'],
  'E' => [],
  'F' => [],
  'G' => [],
  'H' => [],
];

$startNode = 'B';
$endNode = 'E';

$visited = search($graph, $startNode, $endNode);
$cur_node = $endNode;

echo "Путь от {$startNode} до {$endNode}: <br>";

while ($cur_node) {
  if (isset($visited[$cur_node])) {
    echo "{$cur_node} ";
    $cur_node = $visited[$cur_node];
  }else {
    echo "Пути не существует";
    break;
  }
  
}