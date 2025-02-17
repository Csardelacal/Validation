<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Respect\Validation\Test\RuleTestCase;
use stdClass;

/**
 * @group rule
 *
 * @covers \Respect\Validation\Rules\Pis
 *
 * @author Bruno Koga <brunokoga187@gmail.com>
 * @author Danilo Correa <danilosilva87@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class PisTest extends RuleTestCase
{
    /**
     * {@inheritDoc}
     */
    public function providerForValidInput(): array
    {
        $rule = new Pis();

        return [
            [$rule, '120.4454.683-5'],
            [$rule, '120.8995.084-8'],
            [$rule, '120.5146.8577'],
            [$rule, '120.01842459'],
            [$rule, '1.2.0.7.9.8.1.6.7.8.2'],
            [$rule, '12044546835'],
            [$rule, '12089950848'],
            [$rule, '12051468577'],
            [$rule, '12001842459'],
            [$rule, '12079816782'],
            [$rule, 12079816782],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function providerForInvalidInput(): array
    {
        $rule = new Pis();

        return [
            [$rule, ''],
            [$rule, '000.0000.000-0'],
            [$rule, '111.2222.444-5'],
            [$rule, '999999999.99'],
            [$rule, '8.8.8.8.8.8.8.8.8.8.8'],
            [$rule, '693-3129-110-1'],
            [$rule, '698.1131-111.2'],
            [$rule, '11111111111'],
            [$rule, '22222222222'],
            [$rule, '12345678901'],
            [$rule, '99299929384'],
            [$rule, '84434895894'],
            [$rule, '44242340002'],
            [$rule, '1'],
            [$rule, '22'],
            [$rule, '123'],
            [$rule, '992999999999929384'],
            [$rule, false],
            [$rule, []],
            [$rule, new stdClass()],
        ];
    }
}
