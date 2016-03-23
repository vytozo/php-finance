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

namespace Methods;

use Core\Interfaces\CalculationMethodInterface;
use Core\Interfaces\CalculationParametersInterface;
use Core\Interfaces\FutureValueCalculationParametersInterface;
use InvalidArgumentException;

/**
 * Description of FutureValueCalculation
 *
 * @author Vytautas Ozolinš <vytautas.ozolins@wiseteam.eu>
 */
class FutureValueCalculationMethod implements CalculationMethodInterface{
    
    /**
     * Calculates future value.
     * @param CalculationParametersInterface $calculationParameters
     * @return float
     * @throws InvalidArgumentException
     */
    public static function calculate(CalculationParametersInterface $calculationParameters) {
        
        /* @var $calculationParameters FutureValueCalculationParametersInterface */
        if ($calculationParameters instanceof FutureValueCalculationParametersInterface){
            if($calculationParameters->validate()){
                return $calculationParameters->getPresentValue() * pow((1 + $calculationParameters->getInterestRate()), $calculationParameters->getPeriodCount());
            } else {
                throw new InvalidArgumentException('Missing parameters');
            }
        } else {
            throw new InvalidArgumentException('Unexpected parameters');
        }
    }

}
