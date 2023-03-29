<?php

/**
 * Класс очереди
 */
class Queue
{

  protected array $queue_array = [];

  /**
   * Установить очередь
   * @param array $array
   * @return Queue
   */
  public function setQueue(array $array): self
  {
    $this->queue_array = $array;

    return $this;
  }

  /**
   * Получить очередь
   * @return array
   */
  public function getQueue(): array
  {
    return $this->queue_array;
  }

  /**
   * Проверить на пустоту очередь
   * @return bool
   */
  public function isNotEmpty(): bool
  {
    return (bool) count($this->getQueue());
  }

  /**
   * Добавить элементов в конец очереди
   * @param array $array
   * @return Queue
   */
  public function addQueue(array $array): self
  {
    $this->queue_array = array_merge($this->queue_array, $array);

    return $this;
  }

  
  /**
   * Взять первый элемент и удалить его
   * @return mixed
   */
  public function popQueue()
  {
    return array_shift($this->queue_array);
  }

}
