<?php
// tests/Form/ProductsFormTest.php
namespace App\Tests\Form;

use App\Entity\Regions;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RegionsFormTest extends KernelTestCase
{

    public function testNewCategory()
    {
        $products = (new Regions())
            ->setNameRegions('77');

        self::bootKernel();
        $error = self::$container->get('validator')->validate($products);
        $this->assertCount(0, $error);
    }
}
