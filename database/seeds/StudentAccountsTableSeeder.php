<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_accounts')->delete();

        DB::table('student_accounts')->insert(array(
            0 =>
            array(
                'id' => 1,
                'date' => '2021-07-10',
                'type' => 'invoice',
                'fee_invoice_id' => 1,
                'receipt_id' => null,
                'processing_id' => null,
                'payment_id' => null,
                'student_id' => 1,
                'Debit' => '10000.00',
                'credit' => '0.00',
                'description' => 'رسوم دراسية',
                'created_at' => '2021-07-10 13:04:01',
                'updated_at' => '2021-07-10 13:04:01',
            ),
            1 =>
            array(
                'id' => 2,
                'date' => '2021-07-10',
                'type' => 'invoice',
                'fee_invoice_id' => 2,
                'receipt_id' => null,
                'processing_id' => null,
                'payment_id' => null,
                'student_id' => 1,
                'Debit' => '2000.00',
                'credit' => '0.00',
                'description' => 'رسوم باص',
                'created_at' => '2021-07-10 13:04:01',
                'updated_at' => '2021-07-10 13:04:01',
            ),
            2 =>
            array(
                'id' => 3,
                'date' => '2021-07-10',
                'type' => 'receipt',
                'fee_invoice_id' => null,
                'receipt_id' => 1,
                'processing_id' => null,
                'payment_id' => null,
                'student_id' => 1,
                'Debit' => '0.00',
                'credit' => '11000.00',
                'description' => 'رسوم دراسية + 1000 باص',
                'created_at' => '2021-07-10 13:05:07',
                'updated_at' => '2021-07-10 13:05:07',
            ),
            3 =>
            array(
                'id' => 4,
                'date' => '2021-07-10',
                'type' => 'payment',
                'fee_invoice_id' => null,
                'receipt_id' => null,
                'processing_id' => null,
                'payment_id' => 2,
                'student_id' => 1,
                'Debit' => '1000.00',
                'credit' => '0.00',
                'description' => 'رجوع رسوم الباص',
                'created_at' => '2021-07-10 13:07:32',
                'updated_at' => '2021-07-10 13:07:32',
            ),
        ));
    }
}
