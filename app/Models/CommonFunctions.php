<?php

namespace App\Models;

use Illuminate\Support\Collection;

class CommonFunctions
{

    /**
     * Imports an collection from CSV string
     * @param string $str
     * @return Collection
     */
    static function read_csv(string $str): Collection
    {
        // Separate line to line from file
        $lines = explode(PHP_EOL, $str);

        // remove last line if empty
        if (empty(end($lines))) {
            array_pop($lines);
        }


        // Get only header
        $header = collect(str_getcsv(array_shift($lines)));

        // map rows to php array obj
        $rows = collect($lines);


        return $rows->map(fn($row) => $header->combine(str_getcsv($row)));
    }
}
