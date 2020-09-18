<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'url' => 'https://www.hairclippersclub.com/6-best-pubic-hair-trimmers-for-men-women/',
                'position' => 3,
                'scanned_at' => new \DateTime()
            ],
            [
                'url' => 'https://www.nytimes.com/wirecutter/reviews/best-pubic-hair-trimmer/',
                'position' => 1,
                'scanned_at' => new \DateTime()
            ],
            [
                'url' => 'https://care.ladieshaircaring.com/pubic-hair-trimmer/',
                'position' => 4,
                'scanned_at' => new \DateTime()
            ],
            [
                'url' => 'https://www.instash.com/best-pubic-hair-trimmers/',
                'position' => 2,
                'scanned_at' => new \DateTime()
            ],
        ];

        foreach ($data as $item) {
            Result::create($item);
        }
    }
}
