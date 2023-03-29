<?php

/**
 * Класс графа
 */
class Graph
{
  /**
   * Массив вершин
   * @var array
   */
  protected $nodes = [];

  /**
   * Добавить вершину в массив
   * @param Node $node
   * @throws Exception
   * @return Graph
   */
  public function addNode(Node $node): self
  {
    if (array_key_exists($node->getId(), $this->getNodes())) {
      throw new Exception('Точка с данным id уже существует');
    }
    $this->nodes[$node->getId()] = $node;

    return $this;
  }

  /**
   * Получить вершину по ее id
   * @param mixed $id
   * @return Node
   */
  public function getNode($id): Node
  {
    return $this->nodes[$id];
  }

  /**
   * Получить вершины
   * @return array
   */
  public function getNodes(): array
  {
    return $this->nodes;
  }
}