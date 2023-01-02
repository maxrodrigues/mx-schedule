<?php

if (! function_exists('removeMask')) {
    /**
     * @param string $type
     * @param string $input
     * @return string
     */
    function removeMask(string $type, string $input)
    {
        switch ($type) {
            case 'phone':
                $input = \Illuminate\Support\Str::remove('(', $input);
                $input = \Illuminate\Support\Str::remove(')', $input);
                $input = \Illuminate\Support\Str::remove(' ', $input);
                $input = \Illuminate\Support\Str::remove('-', $input);

                break;

            case 'document':
                $input = \Illuminate\Support\Str::remove('/', $input);
                $input = \Illuminate\Support\Str::remove('.', $input);
                $input = \Illuminate\Support\Str::remove('-', $input);

                break;

            default:
                return 'erro';
        }

        return $input;
    }
}
