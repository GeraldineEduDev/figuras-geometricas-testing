<?php

use App\figurasGeometricas;
use PHPUnit\Framework\TestCase;

class figurasGeometricasTest extends TestCase {

    private $figuras;

    protected function setUp(): void {
        $this->figuras = new figurasGeometricas();
    }

    protected function tearDown(): void {
        unset($this->figuras);
    }

    /**
     * @test
     * @dataProvider dataCuadrado
     */
    public function testCuadrado($input, $expected) {
        $result = $this->figuras->cuadrado($input);
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     * @dataProvider dataRectangulo
     */
    public function testRectangulo($base, $altura, $expected) {
        $result = $this->figuras->rectangulo($base, $altura);
        $this->assertSame($expected, $result);
    }

    /**
     * @test
     * @dataProvider dataCirculo
     */
    public function testCirculo($radio, $expected) {
        $result = $this->figuras->circulo($radio);
        $this->assertNotEquals(0, $result); // No debe ser cero
        $this->assertEqualsWithDelta($expected, $result, 0.01); // Comparar con delta para precisión de pi
    }

    // Data Providers

    public static function dataCuadrado() {
        return [
            [2, 4],
            [3, 9],
            [4, 16],
            [5, 25],
            [6, 36],
            [7, 49],
            [8, 64],
            [9, 81],
            [10, 100],
            [11, 121]
        ];
    }

    public static function dataRectangulo() {
        return [
            [2, 3, 6],
            [4, 5, 20],
            [6, 7, 42],
            [8, 9, 72],
            [10, 11, 110],
            [12, 13, 156],
            [14, 15, 210],
            [16, 17, 272],
            [18, 19, 342],
            [20, 21, 420]
        ];
    }

    public static function dataCirculo() {
        return [
            [1, 3.14],
            [2, 12.57],
            [3, 28.27],
            [4, 50.27],
            [5, 78.54],
            [6, 113.1],
            [7, 153.94],
            [8, 201.06],
            [9, 254.47],
            [10, 314.16]
        ];
    }

    /**
     * @test
     */
    public function testInputsInvalidos() {
        $this->expectException(Exception::class);
        $this->figuras->cuadrado(null);

        $this->expectException(Exception::class);
        $this->figuras->rectangulo('a', 5);

        $this->expectException(Exception::class);
        $this->figuras->circulo([]);
    }

    /**
     * @test
     */
    public function testAreasNoVacias() {
        $this->assertNotEmpty($this->figuras->cuadrado(5));
        $this->assertNotEmpty($this->figuras->rectangulo(7, 9));
        $this->assertNotEmpty($this->figuras->circulo(10));
    }
}

?>
