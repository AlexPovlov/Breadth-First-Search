<?php

/**
 * Summary of Node
 */
class Node
{
    /**
     * Уникальное Id
     * @var string
     */
    private string $id;

    /**
     * Связи вершины
     * @var array
     */
    private array $connections = [];

    /**
     * Посещена ли вершина
     * @var bool
     */
    private bool $visited = false;

    public function __construct($node)
    {
        $this->id = $node;
    }

    /**
     * Уставновить связи вершины
     * @param array $connections
     * @return Node
     */
    public function setConnections(array $connections): self
    {
        $this->connections = $connections;

        return $this;
    }

    /**
     * Пометить вершину посещенной
     * @return Node
     */
    public function markVisited(): self
    {
        $this->visited = true;

        return $this;
    }

    /**
     * Получить id вершины
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Получить Все связи вершины
     * @return array
     */
    public function getConnections(): array
    {
        return $this->connections;
    }

    /**
     * Проверка посещалась ли вершина
     * @return bool
     */
    public function isVisited(): bool
    {
        return $this->visited;
    }

}
