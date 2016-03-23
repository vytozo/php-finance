<?php

/*
 * Copyright (C) 2016 Vytautas Ozolinš <vytautas.ozolins@wiseteam.eu>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Parameters;

use Core\Interfaces\CalculationParametersInterface;
use Core\Interfaces\FutureValueCalculationParametersInterface;

/**
 * Description of FutureValueCalculationParameters
 *
 * @author Vytautas Ozolinš <vytautas.ozolins@wiseteam.eu>
 */
class FutureValueCalculationParameters implements CalculationParametersInterface, FutureValueCalculationParametersInterface{
    
    private $pv;
    private $n;
    private $i;
    
    public function __construct($pv, $i, $n) {
        $this->pv = $pv;
        $this->n = $n;
        $this->i = $i;
    }
    
    /**
     * Validates parameters
     * @return bool
     */
    public function validate() {
        return !empty($this->pv) && !empty($this->n) && !empty($this->i);
    }

    public function getInterestRate() {
        return $this->i;
    }

    public function getPresentValue() {
        return $this->pv;
    }

    public function getPeriodCount() {
        return $this->n;
    }

}
