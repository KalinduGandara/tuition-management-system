<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Center;
use App\Models\ClassDay;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Test;
use App\Models\TestMark;
use App\Models\TuitionClass;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'qwe',
            'email' => 'qwe@qwe.com',
            'password' => 'qwe',
        ]);

        $centers = [];
        $center1 = Center::factory()->create([
            'name' => 'Oxygen',
            'address' => 'Oxygen Address',
        ]);
        $center2 = Center::factory()->create([
            'name' => 'Nitrogen',
            'address' => 'Nitrogen Address',
        ]);
        $centers[] = $center1;
        $centers[] = $center2;

        $grades = ['11', '10', '9', '8', '7', '6'];
        $testTypes = ['Multiple Master', 'Lesson Test Master', 'Term Test Master'];
        $months = ['01', '02', '03', '04', '05'];
        for ($center = 0; $center < 2; $center++) {
            for ($grade = 0; $grade < 6; $grade++) {
                $class = TuitionClass::factory()->create([
                    'center_id' => $centers[$center]->id,
                    'year' => '2024',
                    'grade' => $grades[$grade],
                ]);
                $students = Student::factory(10)->create();

                $tests = [];
                for ($i = 0; $i < 5; $i++) {
                    $LessonTestMasterTest = Test::factory()->create([
                        'tuition_class_id' => $class->id,
                        'date' => '2024-' . $months[$i] . '-15',
                        'type' => 'Lesson Test Master',
                    ]);
                    $tests[] = $LessonTestMasterTest;

                    for ($j = 0; $j < 4; $j++) {
                        $date = '2024-' . $months[$i] . '-' . ($j * 7 + $grade);
                        $MultipleMasterTest = Test::factory()->create([
                            'tuition_class_id' => $class->id,
                            'date' => $date,
                            'type' => 'Multiple Master',
                        ]);
                        $tests[] = $MultipleMasterTest;
                    }
                }
                $TermTestMasterTest = Test::factory()->create([
                    'tuition_class_id' => $class->id,
                    'date' => '2024-' . $months[4] . '-28',
                    'type' => 'Term Test Master',
                ]);
                $tests[] = $TermTestMasterTest;

                $classDays = [];
                for ($i = 0; $i < 5; $i++) {
                    for ($j = 0; $j < 4; $j++) {
                        $classDay = ClassDay::factory()->create([
                            'tuition_class_id' => $class->id,
                            'date' => '2024-' . $months[$i] . '-' . ($j * 7 + $grade),
                        ]);
                        $classDays[] = $classDay;
                    }
                }

                $registrations = [];
                for ($i = 0; $i < 10; $i++) {
                    $registration = Registration::factory()->create([
                        'student_id' => $students[$i]->id,
                        'tuition_class_id' => $class->id,
                    ]);

                    foreach ($tests as $test) {
                        $randomMark = rand(0, 100);
                        $testMark = TestMark::factory()->create([
                            'registration_id' => $registration->id,
                            'test_id' => $test->id,
                            'mark' => $randomMark,
                        ]);
                    }

                    foreach ($classDays as $classDay) {
                        $attendance = Attendance::factory()->create([
                            'registration_id' => $registration->id,
                            'class_day_id' => $classDay->id,
                        ]);
                    }
                    $registrations[] = $registration;
                    for ($j = 0; $j < 4; $j++) {
                        $randomDate = rand(1, 28);
                        $rand = rand(0, 1);
                        Payment::factory()->create([
                            'registration_id' => $registration->id,
                            'amount' => 1000,
                            'month' => $months[$j],
                            'date' => '2024-' . $months[$j + $rand] . '-' . $randomDate,
                            'type' => 'Online',
                        ]);
                        Payment::factory()->create([
                            'registration_id' => $registration->id,
                            'amount' => 2000,
                            'month' => $months[$j],
                            'date' => '2024-' . $months[$j + $rand] . '-' . $randomDate,
                            'type' => 'Physical',
                        ]);
                    }
                }
            }
        }
    }
}
