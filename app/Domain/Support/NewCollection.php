<?php
// https://www.youtube.com/watch?v=AFYVNCltmPE
// https://laravel.com/docs/9.x/collections
// https://www.php.net/manual/en/class.arrayaccess.php
// https://www.php.net/manual/en/class.iterator.php
namespace App\Domain\Support;

use ArrayAccess;
use Iterator;

class NewCollection implements ArrayAccess, Iterator
{
    public function __construct(private array $items)
    {

        
    }

    public static function make(array $items)
    {
        return new static($items);
    }

    public function toArray(): array
    {
        return $this->items;
    }

    public function offsetExists(mixed $offset): bool
    {
       return isset($this->items[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
       if($this->offsetExists($offset)) {
           return $this->items[$offset];
       }
       return null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if($offset == null){
            $this->items[] = $value;
        }else {
            $this->items[$offset] = $value;
        } 
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }

    public function current(): mixed
    {
        return current($this->items);
    }

    public function key(): mixed
    {
        return key($this->items);
    }

    public function next(): void
    {
        next($this->items);
    }

    public function rewind(): void
    {
        reset($this->items);
    }

    public function valid(): bool
    {
        return isset($this->items[$this->key()]);
    }

    public function map(callable $callback): self
    {
        $keys = array_keys($this->items);
        $items = array_map($callback, $this->items, $keys);
        return new static(array_combine($keys, $items));
    }

    public function filter(callable $callback = null): self
    {
       return new static(array_filter($this->items, $callback));
    }

    public function reduce(callable $callback, $initial)
    {
       return array_reduce($this->items, $callback, $initial);
    }

    public function sum(?string $key = null)
    {
        return $this->reduce(fn ($sum, $item) => $sum + ($key == null ? $item : $item[$key]) , 0);
       
    }
}