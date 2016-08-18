<?php

use Illuminate\Database\Seeder;
use App\CompetitionProblemSet;
use App\Problem;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contest = $this->stubContest();
        $this->stubProblems($contest);
    }

    public function stubContest() {
        // copy the file
        copy(base_path('sample-problem-set.pdf'), storage_path('uploads/seed.pdf'));

        // create the record
        return CompetitionProblemSet::create([
            'name' => '2013 ACM Division 1',
            'filename' => 'seed.pdf'
        ]);
    }

    public function stubProblems($competition) {
        $raw_data = [
            [
                'name' => 'Beautiful Mountains',
                'start_page' => 2,
                'end_page' => 3,
            ],
            [
                'name' => 'Nested Palindromes',
                'start_page' => 4,
                'end_page' => 5,
            ],
            [
                'name' => 'Ping',
                'start_page' => 6,
                'end_page' => 6,
            ],
            [
                'name' => 'Electric Car Rally',
                'start_page' => 7,
                'end_page' => 8
            ],
        ];

        foreach($raw_data as $item) {
            $item['competition_problem_set_id'] = $competition->id;
            $item['sample_input'] = '';
            $item['sample_output'] = '';
            $item['judge_input'] = '';
            $item['judge_output'] = '';

            Problem::create($item);
        }
    }
}
