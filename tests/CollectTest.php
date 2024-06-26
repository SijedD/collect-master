<?php
require_once "C:\Users\SIJED\PhpstormProjects\collect-master\src\Collect.php";
require_once "C:\Users\SIJED\PhpstormProjects\collect-master\src\helpers.php";
use PHPUnit\Framework\TestCase;
use function Collect\collection;

class CollectTest extends TestCase
{
    public function testCount()
    {
        $collect = new Collect\Collect([23,27]);
        $this->assertSame(2, $collect->count());
    }

    public function testKeys()
    {
        $collect = new Collect\Collect(['key1' => 23, 'key2' => 27]);
        $keys = $collect->keys();
        $this->assertSame(['key1', 'key2'], $keys->toArray());
    }

    public function testValues()
    {
        $collect = new Collect\Collect(['0' => 33, '1' => 66]);
        $keys = $collect->values();
        $this->assertSame([23, 56], $keys->toArray());
    }

    public function testGet()
    {
        $collect = new Collect\Collect(['0' => 7, '1' => 34]);
        $allValues = $collect->get();
        $this->assertSame(['0' => 7, '1' => 34], $allValues);
    }

    public function testExcept()
    {
        $ars = array(0 => ["one" => 1, "five" => 5], 5 => "five");
        $collect = new Collect\Collect($ars);
        $this->assertSame(collection(["one" => 1, "five" => 5]), $collect->except(...$ars));
    }


    public function testOnly()
    {
        $collect = new Collect\Collect(['id' => 1, 'name' => 'John', 'age' => 30]);
        $result = $collect->only('id', 'age');
        $this->assertSame(['id' => 1, 'age' => 30], $result->toArray());
    }


    public function testFirst()
    {
        $collect = new Collect\Collect([13, 17]);
        $first = $collect->first();
        $this->assertSame(13, $first);
    }

    public function testToArray()
    {
        $collect = new Collect\Collect([13, 17]);
        $this -> assertSame([13, 17], $collect->toArray());
    }

    public function testPush()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->push(4);
        $this->assertSame([1, 2, 3, 4], $collect->toArray());

    }

    public function testUnshift()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->unshift(0);
        $this->assertSame([0, 1, 2, 3], $collect->toArray());
    }

    public function testShift(){
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->shift();
        $this->assertSame( [2, 3], $collect->toArray());
    }

    public function testPop(){
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->pop();
        $this->assertSame( [1, 2], $collect->toArray());
    }

    public function testSplice()
    {
        $ars = array(1, 2, 3, 4);
        $collect = new Collect\Collect($ars);
        $this->assertSame(array(1), array($collect->splice($ars)));
    }

}