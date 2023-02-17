<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

namespace Respect\Validation\Helpers;

use Respect\Validation\Exceptions\ComponentException;

use function file_exists;
use function file_get_contents;
use function json_decode;
use function sprintf;

final class Subdivisions
{
    /**
     * @var mixed[]
     */
    private $data;

    public function __construct(string $countryCode)
    {
        $filename = __DIR__ . '/../../data/iso_3166-2/' . $countryCode . '.json';
        if (!file_exists($filename)) {
            throw new ComponentException(sprintf('"%s" is not a supported country code', $countryCode));
        }

        $this->data = (array) json_decode((string) file_get_contents($filename), true);
    }

    public function getCountry(): string
    {
        return $this->data['country'];
    }

    /**
     * @return string[]
     */
    public function getSubdivisions(): array
    {
        return $this->data['subdivisions'];
    }
}
