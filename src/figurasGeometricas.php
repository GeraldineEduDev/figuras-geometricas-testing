<?php

namespace App;

/**
 * Clase para calcular el área de figuras geométricas básicas.
 */
class figurasGeometricas {

    /**
     * Calcula el área de un cuadrado.
     *
     * @param float $lado Longitud del lado del cuadrado.
     * @return float Área del cuadrado.
     * @throws \Exception Si el valor del lado no es numérico o es nulo.
     */
    public function cuadrado($lado) {
        if (!is_numeric($lado) || is_null($lado)) {
            throw new \Exception("Solo se aceptan números.");
        }
        return $lado * $lado;
    }

    /**
     * Calcula el área de un rectángulo.
     *
     * @param float $base Base del rectángulo.
     * @param float $altura Altura del rectángulo.
     * @return float Área del rectángulo.
     * @throws \Exception Si la base o la altura no son numéricos o son nulos.
     */
    public function rectangulo($base, $altura) {
        if (!is_numeric($base) || !is_numeric($altura) || is_null($base) || is_null($altura)) {
            throw new \Exception("Solo se aceptan números.");
        }
        return $base * $altura;
    }

    /**
     * Calcula el área de un círculo.
     *
     * @param float $radio Radio del círculo.
     * @return float Área del círculo.
     * @throws \Exception Si el valor del radio no es numérico o es nulo.
     */
    public function circulo($radio) {
        if (!is_numeric($radio) || is_null($radio)) {
            throw new \Exception("Solo se aceptan números.");
        }
        return pi() * pow($radio, 2);
    }
}
