<?php

use Illuminate\Support\Arr;

if (!function_exists('getSkillsOptions')) {
    function getSkillsOptions(): array
    {
        return [
            'it_security' => 'IT Security',
            'chat_support' => 'Chat Support',
            'project_management' => 'Project Management',
            'ithead' => 'IT Head',
        ];
    }
}

if (!function_exists('lastUsedYear')) {
    function lastUsedYear(): array
    {
        return [
            '2025' => '2025',
            '2024' => '2024',
            '2023' => '2023',
            '2021' => '2021',
            '2020' => '2020',
            '2019' => '2019',
            '2018' => '2018',
        ];
    }
}

if (function_exists('softwarExperienceYear')) {
    function softwarExperienceYear(): array
    {
        return [
            '0_year' => '0 Year',
            '1_year' => '1 Year',
            '2_year' => '2 Year',
            '3_year' => '3 Year',
            '4_year' => '4 Year',
            '5_year' => '5 Year',
            '6_year' => '6 Year',
            '7_year' => '7 Year',
        ];
    }
}

if (!function_exists('softwarExperienceYear')) {
    function softwarExperienceYear(): array
    {
        return [
            'zero_month'   => '0 Month',
            'one_month'    => '1 Month',
            'two_month'    => '2 Month',
            'three_month'  => '3 Month',
            'four_month'   => '4 Month',
            'five_month'   => '5 Month',
            'six_month'    => '6 Month',
            'seven_month'  => '7 Month',
            'eight_month'  => '8 Month',
            'nine_month'   => '9 Month',
            'ten_month'    => '10 Month',
            'eleven_month' => '11 Month',
            'twelve_month' => '12 Month',
        ];
    }
}

