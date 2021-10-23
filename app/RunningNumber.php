<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RunningNumber extends Model
{
    
    const TYPES = [
        'approval',
        'reject',
    ];

    const TYPE_PREFIX = [
        'approval' => 'APRV', 
        'reject' => 'RJCT',
    ];

    protected $guarded=[];

    // public static function generate(string $type)
    // {
    //     //$type = strtoupper($type);
    //     if (! in_array($type, self::TYPES)) {
    //         throw new \Exception('Undefined running number type.');
    //     }
    //     $number = 0;
    //     $year = date('Y');
    //     if (! RunningNumber::where('type', $type)->where('year', $year)->exists()) {
    //         RunningNumber::create([
    //             'type' => $type,
    //             'number' => $number,
    //             'year' => $year,
    //         ]);
    //     }

    //     $running_number = RunningNumber::where('type', $type)->where('year', $year)->first();
    //     $running_number->number++;
    //     $running_number->save();
    //     $number = $running_number->number;
    //     $number = str_pad($number, 5, '0', STR_PAD_LEFT);

    //     // A-21-00001
    //     return RunningNumber::TYPE_PREFIX[$type].'-'.date('y').'-'.$number;
    // }

    public static function generate(string $M)
    {
        $number = 0;
        $year = date('Y');
        if (! RunningNumber::where('type', $M)->where('year', $year)->exists()) {
            RunningNumber::create([
                'type' => $M,
                'number' => $number,
                'year' => $year,
            ]);
        }

        $running_number = RunningNumber::where('type', $M)->where('year', $year)->first();
        $running_number->number++;
        $running_number->save();
        $number = $running_number->number;
        $number = str_pad($number, 5, '0', STR_PAD_LEFT);

        return $M.'-'.date('y').'-'.$number;
    }

    
}
